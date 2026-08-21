<?php
/**
 * WordPress 恶意文件修复工具
 *
 * 功能：
 * 1. 解锁恶意锁定文件
 * 2. 备份原文件
 * 3. 恢复 .htaccess
 * 4. 恢复 index.php
 * 5. 清理子目录 .htaccess
 * 6. 自动删除自身
 */


declare(strict_types=1);


define('SITE_ROOT', __DIR__);

$scriptPath = __FILE__;

define(
    'BACKUP_DIR',
    SITE_ROOT . '/security_backup'
);



/**
 * 输出日志
 */
function addLog(string $msg):void
{
    global $logs;

    $logs[]=$msg;
}




/**
 * 解锁文件
 */
function unlockFile(string $file):void
{

    if(!file_exists($file)){
        return;
    }


    // 恢复权限
    @chmod(
        $file,
        0644
    );


    // 清除 immutable 属性
    if(function_exists('exec')){

        @exec(
            "chattr -i ".escapeshellarg($file)
        );

    }

}




/**
 * 备份文件
 */
function backupFile(string $file):void
{

    if(!file_exists($file)){
        return;
    }


    if(!is_dir(BACKUP_DIR)){

        mkdir(
            BACKUP_DIR,
            0755,
            true
        );

    }


    $name =
        str_replace(
            [
                SITE_ROOT,
                '/',
                '\\'
            ],
            [
                '',
                '_',
                '_'
            ],
            $file
        );


    copy(
        $file,
        BACKUP_DIR.'/'.$name.'.bak'
    );

}




/**
 * 恢复根目录 htaccess
 */
function restoreHtaccess():bool
{

$file =
SITE_ROOT.'/.htaccess';



unlockFile($file);



if(file_exists($file)){

    backupFile($file);

}



$content=<<<HTACCESS
# BEGIN WordPress

<IfModule mod_rewrite.c>

RewriteEngine On

RewriteBase /

RewriteRule ^index\.php$ - [L]

RewriteCond %{REQUEST_FILENAME} !-f

RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule . /index.php [L]

</IfModule>

# END WordPress

HTACCESS;



$result=file_put_contents(
    $file,
    $content,
    LOCK_EX
);



chmod(
    $file,
    0644
);



return $result!==false;

}




/**
 * 恢复 WordPress index.php
 */
function restoreIndex():bool
{

$file =
SITE_ROOT.'/index.php';



unlockFile($file);



if(file_exists($file)){

    backupFile($file);

}



$content=<<<PHP
<?php
/**
 * Front to the WordPress application.
 */

define(
    'WP_USE_THEMES',
    true
);

require __DIR__ . '/wp-blog-header.php';

PHP;



$result=file_put_contents(
    $file,
    $content,
    LOCK_EX
);



chmod(
    $file,
    0644
);



return $result!==false;

}




/**
 * 清理子目录 htaccess
 */
function cleanSubHtaccess():array
{

$list=[];



$iterator=new RecursiveIteratorIterator(

    new RecursiveDirectoryIterator(
        SITE_ROOT,
        FilesystemIterator::SKIP_DOTS
    )

);



foreach($iterator as $file){


    if(
        $file->isFile()
        &&
        $file->getFilename()==='.htaccess'
    ){


        $path=$file->getPathname();



        // 跳过根目录
        if(
            $path === SITE_ROOT.'/.htaccess'
        ){
            continue;
        }



        unlockFile($path);



        backupFile($path);



        file_put_contents(
            $path,
            "# cleaned by security tool\n",
            LOCK_EX
        );



        chmod(
            $path,
            0644
        );



        $list[]=$path;


    }


}



return $list;

}




/**
 * 删除自身
 */
function selfDestroy(string $file):bool
{

unlockFile($file);


return @unlink($file);

}





/**
 * 自毁请求
 */
if(isset($_GET['destroy'])){


echo selfDestroy($scriptPath)

?
"工具已删除"

:

"删除失败，请手动删除";


exit;

}




$logs=[];



try{


// 恢复 htaccess

if(restoreHtaccess()){

addLog(
"✔ 根目录 .htaccess 已解锁并恢复"
);

}else{

addLog(
"✘ .htaccess 恢复失败"
);

}



// 恢复 index

if(restoreIndex()){

addLog(
"✔ index.php 已解锁并恢复"
);

}else{

addLog(
"✘ index.php 恢复失败"
);

}



// 清理子目录

$list =
cleanSubHtaccess();



addLog(
"✔ 子目录 .htaccess 已处理：".count($list)." 个"
);



if(count($list)){

addLog(
"备份位置：security_backup/"
);

}



}
catch(Throwable $e){

addLog(
"错误：".$e->getMessage()
);

}



?>

<!DOCTYPE html>
<html lang="zh-CN">

<head>

<meta charset="UTF-8">

<title>
WordPress 安全修复工具
</title>


<style>

body{

font-family:Arial;

background:#f5f5f5;

padding:30px;

}


.box{

background:#fff;

max-width:800px;

margin:auto;

padding:25px;

border-radius:8px;

box-shadow:
0 0 10px #ccc;

}


.ok{

color:green;

margin:8px;

}


.warn{

background:#fff3cd;

padding:15px;

margin-top:20px;

}


code{

background:#eee;

padding:3px 6px;

}

</style>


</head>


<body>


<div class="box">


<h2>
WordPress 恶意文件修复工具
</h2>



<?php foreach($logs as $log): ?>

<p class="ok">

<?=htmlspecialchars($log)?>

</p>

<?php endforeach; ?>



<div class="warn">

<p>
工具将在 <b id="time">10</b> 秒后自动删除。
</p>


<p>
如果失败，请手动删除：
</p>


<code>

<?=htmlspecialchars($scriptPath)?>

</code>


</div>


</div>



<script>

let s=10;

let timer=setInterval(()=>{


s--;

document.getElementById('time').innerHTML=s;


if(s<=0){

clearInterval(timer);


fetch(
"<?=$scriptPath?>?destroy=1"
)

.then(()=>{

document.body.innerHTML=
"<h2 style='text-align:center;color:green'>工具已删除，请关闭页面</h2>";

});


}


},1000);


</script>



</body>

</html>