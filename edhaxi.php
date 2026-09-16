<?php

declare(strict_types=1);


/* ============================================================
 * Session 安全
 * ============================================================ */

session_start([
    "cookie_httponly" => true,
    "cookie_samesite" => "Strict",
    "cookie_secure" =>
        isset($_SERVER["HTTPS"])
        &&
        $_SERVER["HTTPS"] !== "off"
]);


/* ============================================================
 * 配置
 * ============================================================ */


/*
 * 密码哈希
 *
 * 生成：
 *
 * echo password_hash(
 *   
 *     PASSWORD_DEFAULT
 * );
 *
 */

$passwordHash =
'$2y$10$sIok5STM4X5.2HtKCNXTuOfv39FjELeN.bsN3WeruN2v0H3mLoBAu';


$maxUploadSize =
10 * 1024 * 1024;


/* ============================================================
 * 名字库
 * ============================================================ */

$namePool = [
"user-edits",
"tools",
"edit-link-form",
"authorize-applications",
"options-privacy",
"options-media",
"load-scripts",
"edit-form-comments",
"ms-edits",
"freedoms",
"custom-headers",
"admin-functions",
"options-reading",
"options-permalinks",
"ms-admins",
"customizes",
"terms",
"updates",
"admin-footers",
"options-connectors",
"networks",
"profiles",
"edit-form-blocks",
"post",
"edit",
"site-health",
"options-general",
"credits",
"options-writing",
"admin-post",
"plugin-editor",
"ms-sites",
"theme-editor",
"admin-header",
"ms-upgrade-network",
"export",
"setup-config",
"ms-themes",
"my-sites",
"widgets-form",
"index",
"plugins",
"press-this",
"widgets",
"media",
"ms-delete-site",
"users",
"link-add",
"update-core",
"theme-install",
"about",
"edit-tags",
"install-helper",
"ms-users",
"menu-header",
"load-styles",
"options-discussion",
"comment",
"site-health-info",
"options",
"admin-ajax",
"admin",
"link-parse-opml",
"options-head",
"edit-form-advanced",
"upgrade",
"moderation",
"media-upload",
"site-editor",
"custom-background",
"edit-comments",
"revision",
"export-personal-data",
"post-new",
"ms-options",
"media-new",
"upload",
"import",
"contribute",
"privacy",
"privacy-policy-guide",
"plugin-install",
"themes",
"edit-tag-form",
"erase-personal-data",
"link",
"install",
"font-library",
"async-upload",
"menu",
"user-new",
"nav-menus",
"link-manager",
"widgets-form-blocks",
"upgrade-functions",
"misc",
"edit-tag-messages",
"plugin",
"theme",
"class-language-pack-upgrader",
"dashboard",
"class-file-upload-upgrader",
"class-wp-debug-data",
"class-wp-comments-list-table",
"class-bulk-theme-upgrader-skin",
"class-wp-theme-install-list-table",
"noop",
"class-wp-filesystem-ftpext",
"class-wp-ms-themes-list-table",
"class-wp-plugin-install-list-table",
"class-wp-ms-users-list-table",
"class-language-pack-upgrader-skin",
"continents-cities",
"class-wp-media-list-table",
"file",
"class-automatic-upgrader-skin",
"class-theme-installer-skin",
"update",
"ms-admin-filters",
"class-wp-ms-sites-list-table",
"class-theme-upgrader-skin",
"class-core-upgrader",
"class-ftp-sockets",
"network",
"class-wp-list-table-compat",
"class-wp-privacy-data-removal-requests-list-table",
"class-wp-automatic-updater",
"class-wp-upgrader",
"translation-install",
"ms-deprecated",
"post",
"class-wp-upgrader-skin",
"credits",
"user",
"image",
"class-wp-posts-list-table",
"class-custom-image-header",
"deprecated",
"class-walker-category-checklist",
"class-wp-ajax-upgrader-skin",
"class-wp-screen",
"class-custom-background",
"class-wp-post-comments-list-table",
"class-wp-site-health-auto-updates",
"class-wp-site-health",
"class-plugin-upgrader",
"meta-boxes",
"export",
"class-wp-filesystem-base",
"class-bulk-plugin-upgrader-skin",
"class-wp-plugins-list-table",
"screen",
"class-wp-themes-list-table",
"class-walker-nav-menu-editor",
"ms",
"widgets",
"media",
"update-core",
"bookmark",
"theme-install",
"class-ftp-pure",
"class-wp-filesystem-direct",
"class-theme-upgrader",
"comment",
"class-walker-nav-menu-checklist",
"class-pclzip",
"options",
"taxonomy",
"class-wp-links-list-table",
"class-wp-importer",
"admin",
"upgrade",
"revision",
"class-wp-site-icon",
"class-wp-privacy-requests-table",
"class-wp-terms-list-table",
"class-wp-privacy-data-export-requests-table",
"ajax-actions",
"class-wp-internal-pointers",
"import",
"class-plugin-installer-skin",
"plugin-install",
"schema",
"class-bulk-upgrader-skin",
"class-ftp",
"class-wp-users-list-table",
"class-wp-privacy-policy-content",
"class-wp-filesystem-ssh2",
"admin-filters",
"list-table",
"class-wp-upgrader-skins",
"class-wp-application-passwords-list-table",
"class-wp-community-events",
"menu",
"template",
"class-wp-filesystem-ftpsockets",
"class-plugin-upgrader-skin",
"nav-menu",
"privacy-tools",
"class-wp-list-table",
"image-edit",
"updates.js",
"editor-expand.js",
"gallery.min.js",
"auth-app.min.js",
"editor.min.js",
"common.js",
"accordion.js",
"dashboard.js",
"comment.js",
"widgets.min.js",
"nav-menu.js",
"tags-suggest.js",
"auth-app.js",
"word-count.js",
"user-suggest.min.js",
"accordion.min.js",
"xfn.min.js",
"color-picker.js",
"password-toggle.min.js",
"tags.js",
"site-icon.min.js",
"updates.min.js",
"customize-controls.js",
"inline-edit-tax.js",
"comment.min.js",
"media-upload.js",
"user-profile.js",
"revisions.js",
"privacy-tools.js",
"user-profile.min.js",
"tags-box.min.js",
"customize-nav-menus.min.js",
"tags.min.js",
"application-passwords.min.js",
"color-picker.min.js",
"svg-painter.js",
"inline-edit-post.js",
"set-post-thumbnail.min.js",
"language-chooser.min.js",
"postbox.min.js",
"site-icon.js",
"iris.min.js",
"application-passwords.js",
"revisions.min.js",
"word-count.min.js",
"customize-nav-menus.js",
"edit-comments.min.js",
"user-suggest.js",
"theme.min.js",
"language-chooser.js",
"post.min.js",
"custom-background.min.js",
"nav-menu.min.js",
"theme-plugin-editor.js",
"tags-box.js",
"media.min.js",
"media-upload.min.js",
"media-gallery.min.js",
"custom-header.js",
"inline-edit-tax.min.js",
"editor-expand.min.js",
"site-health.js",
"image-edit.js",
"edit-comments.js",
"set-post-thumbnail.js",
"password-toggle.js",
"dashboard.min.js",
"site-health.min.js",
"common.min.js",
"theme-plugin-editor.min.js",
"svg-painter.min.js",
"customize-widgets.min.js",
"media-gallery.js",
"password-strength-meter.min.js",
"privacy-tools.min.js",
"xfn.js",
"image-edit.min.js",
"postbox.js",
"tags-suggest.min.js",
"post.js",
"customize-widgets.js",
"password-strength-meter.js",
"widgets.js",
"plugin-install.min.js",
"gallery.js",
"theme.js",
"code-editor.min.js",
"code-editor.js",
"custom-background.js",
"link.js",
"inline-edit-post.min.js",
"media.js",
"editor.js",
"plugin-install.js",
"customize-controls.min.js",
"link.min.js",
"farbtastic.js",
"custom-html-widgets.min.js",
"media-video-widget.js",
"text-widgets.js",
"media-widgets.js",
"media-widgets.min.js",
"media-audio-widget.min.js",
"media-video-widget.min.js",
"media-image-widget.min.js",
"text-widgets.min.js",
"media-image-widget.js",
"media-audio-widget.js",
"media-gallery-widget.min.js",
"custom-html-widgets.js",
"media-gallery-widget.js",
"readme.txt",
"page",
"404",
"footer",
"functions",
"home",
"single",
"screenshot.png",
"header",
"index",
"sidebar",
"archive",
"front-page",
"style.css",
"search",
"comments",
"customize-control.min.js",
"custom.min.js",
"custom.js",
"slick.min.js",
"navigation.min.js",
"customizer.js",
"navigation.js",
"slick.js",
"customizer.min.js",
"customize-control.js",
"fa-v4compatibility.woff2",
"fa-brands-400.woff2",
"fa-brands-400.ttf",
"fa-solid-900.woff2",
"fa-regular-400.woff2",
"fa-solid-900.ttf",
"fa-v4compatibility.ttf",
"fa-regular-400.ttf",
"class-wp-error",
"class-wp-block-template",
"class-wp-http-streams",
"class-wp-comment-query",
"class-wp-oembed-controller",
"class-wp-meta-query",
"class-wp-post",
"class-wp-metadata-lazyloader",
"plugin",
"class-wp-block-parser-block",
"class-wp-image-editor-imagick",
"theme",
"class-wp-styles",
"class-wp-site-query",
"class-wp-object-cache",
"meta",
"class-wp-customize-widgets",
"class-wp-filter-sentinel",
"class-wp-recovery-mode-link-service",
"class-wp-icons-registry",
"class-wp-recovery-mode-cookie-service",
"class-wp-simplepie-sanitize-kses",
"block-template-utils",
"category",
"class-wp-block-editor-context",
"class-oembed",
"global-styles-and-settings",
"class-wp-icon-collections-registry",
"locale",
"spl-autoload-compat",
"feed-rss2-comments",
"class-wp-http-proxy",
"default-widgets",
"class-wpdb",
"script-modules",
"rest-api",
"post-thumbnail-template",
"shortcodes",
"class-wp-text-diff-renderer-table",
"class.wp-scripts",
"option",
"cron",
"functions.wp-scripts",
"ms-default-constants",
"speculative-loading",
"class-wp-post-type",
"class-wp-tax-query",
"class-wp-navigation-fallback",
"class-wp-query",
"formatting",
"class-wp-network",
"view-config",
"ms-default-filters",
"class-wp-simplepie-file",
"update",
"compat",
"class-wp-speculation-rules",
"rss",
"blocks",
"class-IXR",
"style-engine",
"class-wp-term",
"view-transitions",
"class-wp-application-passwords",
"class-wp-http-requests-hooks",
"class-wp-locale-switcher",
"feed-atom-comments",
"sitemaps",
"class-pop3",
"class-wp-customize-manager",
"class-wp-url-pattern-prefixer",
"comment-template",
"load",
"class-walker-page-dropdown",
"nav-menu-template",
"class-wp-user",
"class-wp-recovery-mode",
"general-template",
"feed-atom",
"class-walker-category",
"class-walker-category-dropdown",
"class-wp-recovery-mode-key-service",
"date",
"class-wp-role",
"ms-deprecated",
"block-template",
"class-phpass",
"class-wp-dependencies",
"post",
"script-loader",
"class-wp-taxonomy",
"capabilities",
"class-wp-xmlrpc-server",
"class-feed",
"class-wp-theme-json",
"class.wp-styles",
"user",
"class-wp-hook",
"class-walker-nav-menu",
"admin-bar",
"class-wp-theme-json-schema",
"class.wp-dependencies",
"template-canvas",
"deprecated",
"http",
"class-wp-rewrite",
"class-wp-connector-registry",
"cache-compat",
"class-wp-view-config-data",
"class-wp-fatal-error-handler",
"theme.json",
"class-wp-customize-setting",
"class-wp-textdomain-registry",
"class-wp-block-patterns-registry",
"class-wp-widget",
"class-wp-block-bindings-source",
"icons",
"class-wp-image-editor-gd",
"theme-i18n.json",
"class-wp-date-query",
"class-simplepie",
"block-i18n.json",
"ms-files",
"media-template",
"class-wp-network-query",
"class-wp-site",
"pluggable-deprecated",
"kses",
"feed",
"atomlib",
"class-wp-dependency",
"class-wp-session-tokens",
"class-wp-recovery-mode-email-service",
"block-patterns",
"connectors",
"class-wp-phpmailer",
"ms-network",
"class-wp-theme",
"class-wp-script-modules",
"ms-load",
"class-wp-locale",
"abilities-api",
"widgets",
"block-bindings",
"class-wp-editor",
"class-wp-feed-cache-transient",
"class-wp-block-templates-registry",
"theme-templates",
"media",
"ms-functions",
"query",
"registration",
"class-wp-admin-bar",
"class-wp-block-processor",
"bookmark",
"class-wp-text-diff-renderer-inline",
"https-detection",
"utf8",
"session",
"class-walker-comment",
"json-schema",
"class-wp-list-util",
"class-wp-paused-extensions-storage",
"class-wp-feed-cache",
"class-wp-block-parser-frame",
"class-walker-page",
"default-constants",
"class-wp-user-request",
"vars",
"class-smtp",
"class-wp-comment",
"class-wp-block-list",
"class-wp-theme-json-resolver",
"wp-db",
"comment",
"class-wp-user-meta-session-tokens",
"class-wp-embed",
"class-wp-plugin-dependencies",
"class-wp-duotone",
"fonts",
"taxonomy",
"class-wp-block-type-registry",
"version",
"class-wp-customize-section",
"default-filters",
"class-wp-http-requests-response",
"class-wp-http-encoding",
"class-json",
"compat-utf8",
"bookmark-template",
"author-template",
"class-wp-customize-panel",
"revision",
"link-template",
"ms-blogs",
"class-wp-block-bindings-registry",
"embed-template",
"class-wp-walker",
"robots-template",
"class-wp-block",
"class-wp-http-response",
"class-wp-block-parser",
"theme-previews",
"ms-settings",
"class-wp-http",
"ai-client",
"registration-functions",
"l10n",
"class-wp-oembed",
"class-wp-scripts",
"class-wp-http-curl",
"post-formats",
"class-wp-ajax-response",
"class-wp-roles",
"class-wp-block-pattern-categories-registry",
"feed-rdf",
"class-wp-matchesmapregex",
"class-wp-block-styles-registry",
"rewrite",
"class-phpmailer",
"class-wp-term-query",
"class-wp-customize-nav-menus",
"class-requests",
"class-wp-widget-factory",
"class-avif-info",
"class-wp-block-metadata-registry",
"class-wp-customize-control",
"class-wp-block-supports",
"https-migration",
"canonical"

];


/* ============================================================
 * 颜色库
 * ============================================================ */

$colorPool = [

    "#afedb6",
"#97c99d",
"#7e9c81",
"#adedcd",
"#8ee8bb",
"#b8e6c1",
"#91d7a5",
"#76b98f",
"#a5dfb2",
"#c1edc9",
"#86cfa1",
"#9ed8b0",
"#72aa83",
"#b0e8bd",
"#8bcfa0",
"#c5e8d0",
"#7fbf91",
"#a9ddb5",
"#94cfa3",
"#6fa87f",
"#b7e4c2",
"#88c99a",
"#a0d9aa",
"#c0e8c8",
"#79b98b",
"#9bd3a5",
"#aedfba",
"#82c394",
"#bce7c5",
"#91cfa0",
"#74ad84",
"#a6dbb0",
"#c7ead0",
"#86c998",
"#9fdaa9",
"#b3e3bb",
"#7eb68d",
"#acd9b5",
"#95d0a0",
"#c2e9ca",
"#89c69a",
"#a8ddb2",
"#71aa80",
"#b5e2be",
"#98d2a2",
"#c9ebd0",
"#80bc8d",
"#a1d6aa",
"#8ec89a",
"#b9e5c2",
"#76b488",
"#a9dcb3",
"#c4e8cb",
"#83c092",
"#97d1a1",
"#b0dfb8",
"#6da77d",
"#bee6c6",
"#8bc397",
"#a4d9ad",
"#c8ebcf",
"#7ab587",
"#9dd5a5",
"#b6e1bd",
"#85c394",
"#abdcb4",
"#92cd9e",
"#c0e5c7",
"#73ae82",
"#a7d8af",
"#bde4c4",
"#8fc89a",
"#9fd4a8",
"#c6e9cc",
"#7cb98a",
"#addbb5",
"#87c294",
"#b4dfba",
"#96d0a0",
"#c3e7c9",
"#70aa7f",
"#a2d7aa",
"#bae2c1",
"#84bd91",
"#a8d9b0",
"#c9ecd0",
"#7fb88c",
"#93cea0",
"#b1dfb8",
"#8ac496",
"#c1e6c7",
"#75b082",
"#a5d6ad",
"#b8e3bf",
"#81bd8e",
"#9ad1a3",
"#c5e9cc"

];


/* ============================================================
 * Title 库
 * ============================================================ */

$titlePool = [

    'Να επιστρέψεις το άψογο κόσμημα στον Ζάο',
'ፍጹም የሆነውን ጌጥ ወደ ዣኦ መመለስ',
'Бүрэн эрдэнийг Жаод буцаан өгөх',
'Бүтүн асыл ташты Чжаого кайтаруу',
'အပြည့်အစုံသော ရတနာကို ကျောက်ပြည်သို့ ပြန်ပို့သည်',
'పూర్తి రత్నాన్ని జావోకు తిరిగి ఇవ్వడం',
'അക്ഷതമായ രത്നം ഷാവോയിലേക്ക് തിരികെ നൽകുക',
'ប្រគល់ត្បូងដ៏ល្អឥតខ្ចោះត្រឡប់ទៅចាវ',
'Цзяолӧн медсюрӧссӧ паськӧдны',
'Бүтэн эрдэниие Жаодонь бусааха',
'სრულყოფილი ძვირფასეულობის ჟაოსთვის დაბრუნება',
'ସମ୍ପୂର୍ଣ୍ଣ ରତ୍ନ ଝାଓଙ୍କୁ ଫେରାଇଦେବା',
'گوهر بی‌نقص را به ژائو بازگرداندن',
'સંપૂર્ણ રત્ન ઝાઓને પાછું આપવું',
'คืนหยกสมบูรณ์ให้จ้าว',
'Πολιορκημένος από τραγούδια του Τσου από όλες τις πλευρές',
'ከአራቱም አቅጣጫዎች የቹ ዜማ መስማት',
'Дөрвөн зүгээс Чүгийн дуу сонсогдох',
'Төрт тараптан Чу ырларын угуу',
'လေးဘက်လုံးမှ ချူသီချင်းများ ကြားရသည်',
'నాలుగు వైపులా చూ పాటలు వినిపించడం',
'നാലുഭാഗത്തുനിന്നും ചു പാട്ടുകൾ കേൾക്കുക',
'ឮបទចម្រៀងជូពីគ្រប់ទិស',
'Тӧвсьӧн Чуйӧн сьыланкывсӧ кывны',
'Дүрбэн зүгһөө Чу-гай дуун дуулдаха',
'ოთხივე მხრიდან ჩუს სიმღერის მოსმენა',
'ଚାରିଆଡ଼ୁ ଚୁର ଗୀତ ଶୁଣିବା',
'از چهار طرف آواز چو شنیدن',
'ચારેય બાજુથી ચૂના ગીતો સાંભળવા',
'ได้ยินเพลงฉู่จากทั้งสี่ด้าน',
'چاروں طرف سے چُو کے گیت سنائی دینا',
'له څلورو خواوو د چو سندرې اورېدل',
'ހަތަރު ފަރާތުން ޗޫގެ ގަނޑު ކަމެއް ކިޔުން',
'Να σπάσεις τα καζάνια και να βυθίσεις τις βάρκες',
'ድስቶችን ሰብሮ ጀልባዎችን ማስመጥ',
'Тогоо хагалж, завиа живүүлэх',
'Казандарды талкалап, кайыктарды чөктүрүү',
'အိုးများကိုဖျက်ပြီး လှေများကို နစ်မြုပ်စေသည်',
'పాత్రలను పగలగొట్టి పడవలను ముంచడం',
'കലങ്ങൾ തകർത്തു വഞ്ചികൾ മുക്കുക',
'បំបែកឆ្នាំង និងលិចទូក',
'Кӧмӧсьяссӧ вӧччыны да лодкаяссӧ чукӧрны',
'Тогоонуудаа эбдэлжэ, онгосонуудаа шэнгээн хаяха',
'ქვაბების დამტვრევა და ნავების ჩაძირვა',
'ହାଣ୍ଡି ଭାଙ୍ଗି ନୌକା ବୁଡ଼ାଇଦେବା',
'دیگ‌ها را شکستن و کشتی‌ها را غرق کردن',
'કડાઈઓ તોડી નાવડીઓ ડૂબાડવી',
'ทุบหม้อและจมเรือ',
'ہانڈیاں توڑ کر کشتیاں ڈبو دینا',
'دیګونه ماتول او کښتۍ ډوبول',
'ބޭނުންކުރާ ކެތިތައް ބަދަލުކޮށް ދޯނި ކޮށްލުން',
'退避三舍',
'Να υποχωρήσεις τρεις σταθμούς',
'ሦስት ርቀት መሸሽ',
'Гурван буудлын зай ухрах',
'Үч жайга чегинүү',
'သုံးအကွာအဝေး နောက်ဆုတ်သည်',
'మూడు దూరాల వెనక్కి తగ్గడం',
'മൂന്ന് അകലങ്ങൾ പിന്നോട്ടുപോകുക',
'ថយក្រោយបីចម្ងាយ',
'Коймӧд паськыд мӧдны',
'Гурбан буудал ухарха',
'სამი სადგურის მანძილზე უკან დახევა',
'ତିନି ଦୂରତା ପଛକୁ ହଟିବା',
'سه فاصله عقب‌نشینی کردن',
'ત્રણ પડાવ પાછળ હટી જવું',
'ถอยหลังสามระยะ',
'تین فاصلے پیچھے ہٹنا',
'درې واټنه شاته تلل',
'ތިން މިލް ފަހަތުން ދިޔުން',
'بے عیب جواہر ژاؤ کو واپس کرنا',
'بشپړ قیمتي ډبره ژاو ته بېرته سپارل',
'ކުރިން ކުރެވިފައި ހުރި ރަން ޖާއުއަށް ރައްކާލުން',
'Να ξανασηκωθείς από το όρος Ντονγκ',
'ከዶንግሻን እንደገና መነሳት',
'Дуншань уулнаас дахин босох',
'Дуншань тоосунан кайра көтөрүлүү',
'ဒုံရှန်တောင်မှ ပြန်လည်ထလာသည်',
'డోంగ్‌షాన్ నుంచి మళ్లీ లేచివచ్చడం',
'ദോങ്‌ഷാനിൽ നിന്ന് വീണ്ടും ഉയിർത്തെഴുന്നേൽക്കുക',
'ងើបឡើងវិញពីភ្នំដុងសាន',
'Дуншаньсянь мунӧ кутшӧмӧн воӧдчыны',
'Дуншаньһаа дахин бодохо',
'დუნგშანიდან ხელახლა აღზევება',
'ଡୋଙ୍ଗଶାନରୁ ପୁଣି ଉଠିବା',
'دونگ‌شان سے دوبارہ ابھرنا',
'ડોંગશાનમાંથી ફરી ઊભા થવું',
'กลับมายืนหยัดอีกครั้งจากภูเขาตงซาน',
'دونگ شان سے دوبارہ ابھرنا',
'له دونګشان څخه بیا راپاڅېدل',
'ދޮންގްޝާންގެ ފަރާތުން ދެން ބާއްޖެވުން',
'Να σκέφτεσαι δαμάσκηνα για να ξεγελάσεις τη δίψα',
'ጥማትን ለማስታገስ ፕላም ማሰብ',
'Цангис жимсийг төсөөлж цангаагаа дарах',
'Өрүк элестетип суусунун кандыруу',
'ဇီးသီးကို စိတ်ကူးပြီး ရေငတ်ပြေသည်',
'రేగిపండ్లను ఊహించుకుని దాహం తీర్చుకోవడం',
'പ്ലം ഓർത്തു ദാഹം ശമിപ്പിക്കുക',
'គិតពីផ្លែព្រូនដើម្បីបំបាត់ការស្រេកទឹក',
'Прамӧн мӧвпӧн шӧрӧс кутны',
'Чавганы һанаад ундаагаа дараха',
'ქლიავის წარმოდგენით წყურვილის დაკმაყოფილება',
'ବରକୋଳିକୁ ଭାବି ତୃଷ୍ଣା ମେଣ୍ଟାଇବା',
'با آلو فکر کردن و تشنگی را فرو نشاندن',
'જાંબુ વિશે વિચારીને તરસ છીપાવવી',
'นึกถึงบ๊วยเพื่อดับกระหาย',
'آلو کا خیال کرکے پیاس بجھانا',
'د تږي د ماتولو لپاره د الوچې تصور کول',
'ބައްޔަށް ފަލާން ހިތުގައި ހިތްވެރިކުރުން',
'Να λες το ελάφι άλογο',
'አጋዘንን ፈረስ ማለት',
'Бугаыг морь гэж нэрлэх',
'Бугуйду атты деп айтуу',
'သမင်ကို မြင်းဟု ခေါ်သည်',
'జింకను గుర్రం అని పిలవడం',
'മാനിനെ കുതിര എന്നു വിളിക്കുക',
'ហៅសត្វក្តាន់ថាជាសេះ',
'Кӧлӧнӧс йӧрӧсӧн шуны',
'Бугае морин гэж нэрлэх',
'ირმის ცხენად წოდება',
'ହରିଣକୁ ଘୋଡ଼ା ବୋଲି କହିବା',
'آهو را اسب نامیدن',
'હરણને ઘોડો કહેવું',
'เรียกกวางว่าม้า',
'ہرن کو گھوڑا کہنا',
'هوسۍ ته آس ویل',
'މާރުގެ އެއް ތަކެތި ކުރަން މަސްތަކެއް ކަމަށް ބުނުން',
'Ο άρχοντας Γιε αγαπά τους δράκους μόνο στα λόγια',
'የዬ ጌታ ዘንዶችን በቃል ብቻ ይወዳል',
'Е гүн лууг зөвхөн үгээрээ хайрладаг',
'Е төрө ажыдаарды сөз жүзүндө гана жакшы көрөт',
'ယဲ့မင်းသားက နဂါးကို စကားနဲ့ပဲ နှစ်သက်သည်',
'యే ప్రభువు డ్రాగన్‌లను మాటల్లో మాత్రమే ఇష్టపడతాడు',
'യെ പ്രഭു ഡ്രാഗണുകളെ വാക്കുകളിൽ മാത്രം ഇഷ്ടപ്പെടുന്നു',
'លោកយេ ស្រឡាញ់នាគតែដោយពាក្យប៉ុណ្ណោះ',
'Е гӧсподин драконъясӧс йӧзлы паныд сӧмын кывнас радейтіс',
'Е ноён луугай үгөөрөө дурладаг',
'ბატონი იე დრაკონებს მხოლოდ სიტყვებით აღმერთებს',
'ୟେ ମହାଶୟ ଡ୍ରାଗନକୁ କେବଳ କଥାରେ ଭଲ ପାଆନ୍ତି',
'شاهزاده یه اژدها را فقط در حرف دوست دارد',
'યે સાહેબને ડ્રેગન ફક્ત વાતોમાં ગમે છે',
'ท่านเย่รักมังกรเพียงแต่ในคำพูด',
'یِے صاحب ڈریگنوں کو صرف باتوں میں پسند کرتا ہے',
'یې مشر له اژدها سره یوازې په خبرو کې مینه لري',
'ޔެ ސާހިބާ ނާގަތައް ބަސްކޮޅުން ކަމުގައި ލޯބިކުރޭ',
'Να βλέπεις φίδι στη σκιά ενός τόξου μέσα σε ένα κύπελλο',
'በጽዋ ውስጥ ባለ የቀስት ጥላ እባብ ማየት',
'Аяганд туссан нумын сүүдрийг могой гэж харах',
'Чөйчөктөгү жаанын көлөкөсүн жылан деп көрүү',
'ခွက်ထဲက လေး၏အရိပ်ကို မြွေဟု ထင်သည်',
'పాత్రలోని విల్లు నీడను పాముగా చూడటం',
'കപ്പിലെ വില്ലിന്റെ നിഴൽ പാമ്പായി കാണുക',
'មើលឃើញស្រមោលធ្នូនៅក្នុងពែងជាពស់',
'Чашкаас лунын сералӧсӧс йӧра юксьӧн аддзыны',
'Аяганд туссан нумын һүүдэриие могой гэжэ хараха',
'თასში მშვილდის ჩრდილის გველად დანახვა',
'ପାତ୍ରରେ ଥିବା ଧନୁର ଛାୟାକୁ ସାପ ବୋଲି ଦେଖିବା',
'سایه کمان را در جام مار دیدن',
'પ્યાલામાં ધનુષ્યની છાયાને સાપ માનવી',
'เห็นเงาคันธนูในถ้วยเป็นงู',
'پیالے میں کمان کے سائے کو سانپ سمجھنا',
'په جام کې د لیندۍ سیوری مار ګڼل',
'ކޮޅުގައި ބަންދަރުގެ ސިޔާލަ މާރުކަމަށް ބަލާން',
'Να χαράζεις το πλοίο για να βρεις το σπαθί',
'ሰይፉን ለመፈለግ ጀልባን መቅረጽ',
'Сэлмээ олохын тулд завин дээр тэмдэг тавих',
'Кылыч табыш үчүн кайыкты белгилөө',
'ဓားကိုရှာရန် လှေပေါ်တွင် အမှတ်ခြစ်သည်',
'కత్తిని వెతకడానికి పడవపై గుర్తు చెక్కడం',
'വാൾ കണ്ടെത്താൻ വഞ്ചിയിൽ അടയാളം കൊത്തുക',
'ឆ្លាក់សញ្ញាលើទូកដើម្បីរកដាវ',
'Пышсьӧс корсьӧмӧн лодка вылын пас ӧшкӧдны',
'Илдаа олохын түлөө онгосодо тэмдэг табиха',
'ხმლის საპოვნელად ნავზე ნიშნის ამოკაწვრა',
'ଖଣ୍ଡା ଖୋଜିବା ପାଇଁ ନୌକାରେ ଚିହ୍ନ କାଟିବା',
'برای یافتن شمشیر روی قایق علامت زدن',
'તલવાર શોધવા માટે નાવમાં નિશાન કોતરવું',
'ขีดเครื่องหมายบนเรือเพื่อหาดาบ',
'تلوار ڈھونڈنے کے لیے کشتی پر نشان لگانا',
'د تورې د موندلو لپاره پر کښتۍ نښه کول',
'ފުޅައިގެ ދަށުން ކަރުދާސް ކޮށް ކަންކަން ހޯދުން'

];



/* ============================================================
 * 输出过滤
 * ============================================================ */

function e(
    string $value
): string {

    return htmlspecialchars(
        $value,
        ENT_QUOTES | ENT_HTML5,
        "UTF-8"
    );

}



/* ============================================================
 * CSRF
 * ============================================================ */


function getCsrf(): string
{

    if (
        empty($_SESSION["csrf"])
        ||
        !is_string($_SESSION["csrf"])
    ) {

        $_SESSION["csrf"] =
            bin2hex(
                random_bytes(32)
            );

    }


    return $_SESSION["csrf"];

}



function checkCsrf(): bool
{

    return

        isset(
            $_POST["csrf"],
            $_SESSION["csrf"]
        )

        &&

        is_string(
            $_POST["csrf"]
        )

        &&

        hash_equals(
            $_SESSION["csrf"],
            $_POST["csrf"]
        );

}



/* ============================================================
 * Title替换
 * ============================================================ */


function replaceAllTitles(
    string $content,
    string $newTitle
): string {


    $safeTitle =
        htmlspecialchars(
            $newTitle,
            ENT_QUOTES | ENT_HTML5,
            "UTF-8"
        );


    $count = 0;


    $content =
        preg_replace(
            '/<title\b([^>]*)>.*?<\/title>/is',
            '<title$1>'
            .
            $safeTitle
            .
            '</title>',
            $content,
            -1,
            $count
        );



    if (

        $count === 0

        &&

        preg_match(
            '/<head\b[^>]*>/i',
            $content
        )

    ) {


        $content =
            preg_replace(
                '/(<head\b[^>]*>)/i',
                '$1'
                .
                "\n<title>"
                .
                $safeTitle
                .
                "</title>",
                $content,
                1
            );

    }



    return str_replace(

        [

            "{{TITLE}}",

            "__TITLE__",

            "%TITLE%"

        ],

        $safeTitle,

        $content

    );

}



/* ============================================================
 * Color替换
 * ============================================================ */


function replaceAllColors(
    string $content,
    string $newColor
): string {


    $content =
        str_replace(

            [

                "{{COLOR}}",

                "__COLOR__",

                "%COLOR%"

            ],

            $newColor,

            $content

        );



    $parts =
        preg_split(
            '/(<\?(?:php|=).*?\?>)/is',
            $content,
            -1,
            PREG_SPLIT_DELIM_CAPTURE
        );



    foreach (
        $parts as $key => $part
    ) {


        if (

            preg_match(
                '/^<\?(?:php|=).*?\?>$/is',
                $part
            )

        ) {

            continue;

        }



        $part =
            preg_replace(
                '/(\bbackground\s*:\s*)([^;}{]+)(;?)/i',
                '$1'
                .
                $newColor
                .
                '$3',
                $part
            );



        $part =
            preg_replace(
                '/(\bbackground-color\s*:\s*)([^;}{]+)(;?)/i',
                '$1'
                .
                $newColor
                .
                '$3',
                $part
            );



        $part =
            preg_replace(
                '/(\bborder-color\s*:\s*)([^;}{]+)(;?)/i',
                '$1'
                .
                $newColor
                .
                '$3',
                $part
            );



        $part =
            preg_replace_callback(
                '/(\bborder(?:-(?:top|right|bottom|left))?\s*:\s*)([^;}{]+)(;?)/i',

                function($m) use ($newColor){

                    $value =
                        preg_replace(
                            '/#(?:[0-9a-f]{3}|[0-9a-f]{6}|[0-9a-f]{8})\b/i',
                            $newColor,
                            $m[2]
                        );


                    return
                        $m[1]
                        .
                        $value
                        .
                        $m[3];

                },

                $part
            );



        $parts[$key] =
            $part;

    }



    return implode(
        "",
        $parts
    );

}



/* ============================================================
 * 内容处理
 * ============================================================ */


function processContent(
    string $content,
    string $title,
    string $color
): string {


    $content =
        replaceAllTitles(
            $content,
            $title
        );


    return
        replaceAllColors(
            $content,
            $color
        );

}

/* ============================================================
 * 添加部署标记
 * ============================================================ */


function addDeployMarker(
    string $content,
    string $fileName
): string {


    $id =
        bin2hex(
            random_bytes(10)
        );


    $header =
        "<?php\n"
        .
        "/* DEPLOY_TOOL_FILE | "
        .
        $fileName
        .
        " | "
        .
        $id
        .
        " */\n";



    if (
        strpos(
            ltrim($content),
            "<?php"
        ) === 0
    ) {


        $pos =
            strpos(
                $content,
                "<?php"
            );


        if (
            $pos !== false
        ) {


            return

                substr(
                    $content,
                    0,
                    $pos
                )

                .

                $header

                .

                substr(
                    $content,
                    $pos + 5
                );

        }

    }



    return
        $header
        .
        "?>\n"
        .
        $content;

}



/* ============================================================
 * 原子写入
 * ============================================================ */


function atomicWrite(
    string $target,
    string $content
): void {


    $dir =
        dirname(
            $target
        );



    if (
        !is_dir($dir)
    ) {


        if (
            !mkdir(
                $dir,
                0755,
                true
            )
            &&
            !is_dir($dir)
        ) {

            throw new RuntimeException(
                "目录创建失败"
            );

        }

    }



    if (
        !is_writable($dir)
    ) {

        throw new RuntimeException(
            "目录不可写"
        );

    }



    $tmp =
        $dir
        .
        DIRECTORY_SEPARATOR
        .
        ".deploy_"
        .
        bin2hex(
            random_bytes(12)
        )
        .
        ".tmp";



    $length =
        strlen($content);



    $written =
        file_put_contents(
            $tmp,
            $content,
            LOCK_EX
        );



    if (
        $written === false
        ||
        $written !== $length
    ) {


        @unlink($tmp);


        throw new RuntimeException(
            "临时文件写入失败"
        );

    }



    if (
        filesize($tmp)
        !==
        $length
    ) {


        @unlink($tmp);


        throw new RuntimeException(
            "文件校验失败"
        );

    }



    chmod(
        $tmp,
        0644
    );



    if (
        !rename(
            $tmp,
            $target
        )
    ) {


        @unlink($tmp);


        throw new RuntimeException(
            "替换失败"
        );

    }

}



/* ============================================================
 * 获取可用文件名
 * ============================================================ */


function getAvailableName(
    string $dir,
    array $namePool
): ?string {


    $names =
        $namePool;


    shuffle(
        $names
    );



    foreach (
        $names as $name
    ) {


        if (
            !preg_match(
                '/^[a-zA-Z0-9_-]+$/',
                $name
            )
        ) {

            continue;

        }



        $file =
            $name
            .
            ".php";



        if (
            !file_exists(
                rtrim($dir,"/\\")
                .
                DIRECTORY_SEPARATOR
                .
                $file
            )
        ) {

            return $file;

        }

    }



    return null;

}



/* ============================================================
 * 部署
 * ============================================================ */


function deployOne(
    string $dir,
    string $source,
    array $namePool,
    array $colorPool,
    array $titlePool
): string {


    $dir =
        trim($dir);



    if (
        $dir === ""
    ) {

        throw new RuntimeException(
            "路径为空"
        );

    }



    if (
        !is_dir($dir)
    ) {


        mkdir(
            $dir,
            0755,
            true
        );

    }



    if (
        !is_writable($dir)
    ) {

        throw new RuntimeException(
            "目录不可写"
        );

    }



    $fileName =
        getAvailableName(
            $dir,
            $namePool
        );



    if (
        $fileName === null
    ) {

        throw new RuntimeException(
            "名字库全部占用"
        );

    }



    $color =
        $colorPool[
            array_rand(
                $colorPool
            )
        ];



    $title =
        $titlePool[
            array_rand(
                $titlePool
            )
        ];



    $content =
        processContent(
            $source,
            $title,
            $color
        );



    $content =
        addDeployMarker(
            $content,
            $fileName
        );



    $target =
        rtrim(
            $dir,
            "/\\"
        )
        .
        DIRECTORY_SEPARATOR
        .
        $fileName;



    atomicWrite(
        $target,
        $content
    );



    return $target;

}



/* ============================================================
 * 判断部署文件
 * ============================================================ */


function isDeployFile(
    string $file
): bool {


    if (
        !is_file($file)
    ) {

        return false;

    }



    $head =
        file_get_contents(
            $file,
            false,
            null,
            0,
            4096
        );



    return
        is_string($head)
        &&
        strpos(
            $head,
            "DEPLOY_TOOL_FILE"
        )
        !== false;

}



/* ============================================================
 * 删除部署文件
 * ============================================================ */


function deleteFiles(
    string $input
): array {


    $result = [];


    $files =
        preg_split(
            "/\r\n|\n|\r/",
            trim($input)
        );



    foreach (
        $files as $file
    ) {


        $file =
            trim(
                $file,
                " \t\n\r\0\x0B\"'"
            );



        if (
            $file === ""
        ) {

            continue;

        }



        if (
            !is_file($file)
        ) {


            $result[] =
                "○ 不存在："
                .
                $file;


            continue;

        }



        if (
            !isDeployFile($file)
        ) {


            $result[] =
                "✗ 跳过：不是部署文件 "
                .
                $file;


            continue;

        }



        if (
            unlink($file)
        ) {


            $result[] =
                "✓ 已删除："
                .
                $file;


        } else {


            $result[] =
                "✗ 删除失败："
                .
                $file;

        }

    }



    return $result;

}



/* ============================================================
 * 删除自身
 * ============================================================ */


function deleteSelf(): string
{


    $file =
        __FILE__;



    if (
        !is_file($file)
    ) {

        throw new RuntimeException(
            "文件不存在"
        );

    }



    if (
        !is_writable($file)
    ) {

        throw new RuntimeException(
            "文件不可写"
        );

    }



    if (
        !unlink($file)
    ) {

        throw new RuntimeException(
            "删除失败"
        );

    }



    return
        "✓ 工具已删除";

}


/* ============================================================
 * 登录处理
 * ============================================================ */


if (
    isset($_POST["login"])
) {


    if (
        !checkCsrf()
    ) {

        $loginError =
            "请求验证失败";


    } elseif (

        isset($_POST["password"])

        &&

        is_string(
            $_POST["password"]
        )

        &&

        password_verify(
            $_POST["password"],
            $passwordHash
        )

    ) {


        session_regenerate_id(
            true
        );


        $_SESSION["login"] =
            true;


        $_SESSION["csrf"] =
            bin2hex(
                random_bytes(32)
            );



        header(
            "Location: "
            .
            $_SERVER["PHP_SELF"]
        );


        exit;


    } else {


        $loginError =
            "密码错误";

    }

}




/* ============================================================
 * 退出
 * ============================================================ */


if (
    isset($_GET["logout"])
) {


    $_SESSION = [];


    session_destroy();



    header(
        "Location: "
        .
        $_SERVER["PHP_SELF"]
    );


    exit;

}




$csrfToken =
    getCsrf();




/* ============================================================
 * 未登录页面
 * ============================================================ */


if (
    empty($_SESSION["login"])
) {

?>


<!doctype html>

<html lang="zh-CN">

<head>

<meta charset="utf-8">

<meta
name="viewport"
content="width=device-width,initial-scale=1"
>


<title>
登录
</title>


<style>

body{

margin:0;

height:100vh;

display:flex;

align-items:center;

justify-content:center;

background:#f3f4f6;

font-family:Arial;

}


.login{

width:350px;

background:#fff;

padding:25px;

border-radius:10px;

box-shadow:
0 8px 30px
rgba(0,0,0,.1);

}


input{

width:100%;

padding:10px;

box-sizing:border-box;

border:1px solid #ddd;

border-radius:6px;

}


button{

width:100%;

margin-top:12px;

padding:10px;

border:0;

border-radius:6px;

background:#2563eb;

color:white;

}


.error{

color:#dc2626;

margin-top:10px;

}


</style>


</head>


<body>


<div class="login">


<h3>
部署工具
</h3>


<form method="post">


<input
type="hidden"
name="csrf"
value="<?php echo e($csrfToken); ?>"
>


<input

type="password"

name="password"

placeholder="密码"

required

>


<button
name="login"
value="1"
>
登录
</button>


</form>


<?php

if(
isset($loginError)
){

echo
"<div class='error'>"
.
e($loginError)
.
"</div>";

}

?>


</div>


</body>


</html>


<?php

exit;

}





/* ============================================================
 * POST 操作
 * ============================================================ */


$messages = [];



if (

    $_SERVER["REQUEST_METHOD"]
    ===
    "POST"

    &&

    isset($_POST["action"])

) {


    if (
        !checkCsrf()
    ) {


        $messages[] =
            "✗ CSRF验证失败";


    } else {


        $action =
            $_POST["action"];



        /*
         * 部署
         */

        if(
            $action === "deploy"
        ){


            $paths =
                preg_split(
                    "/\r\n|\n|\r/",
                    trim($_POST["paths"] ?? "")
                );



            if(
                !isset($_FILES["file"])
            ){


                $messages[] =
                    "✗ 请上传PHP文件";


            }else{


                $upload =
                    $_FILES["file"];



                if(
                    $upload["error"]
                    !==
                    UPLOAD_ERR_OK
                ){


                    $messages[] =
                        "✗ 上传失败";


                }elseif(

                    $upload["size"]
                    >
                    $maxUploadSize

                ){


                    $messages[] =
                        "✗ 文件过大";


                }else{


                    $source =
                        file_get_contents(
                            $upload["tmp_name"]
                        );



                    foreach(
                        $paths as $dir
                    ){


                        $dir =
                            trim($dir);



                        if(
                            $dir === ""
                        ){

                            continue;

                        }



                        try{


                            $messages[] =
                                "✓ "
                                .
                                deployOne(
                                    $dir,
                                    $source,
                                    $namePool,
                                    $colorPool,
                                    $titlePool
                                );


                        }catch(Throwable $e){


                            $messages[] =
                                "✗ "
                                .
                                $e->getMessage();

                        }

                    }

                }

            }


        }




        /*
         * 删除部署文件
         */

        elseif(
            $action === "delete"
        ){


            $messages =
                deleteFiles(
                    $_POST["delete_files"] ?? ""
                );


        }





        /*
         * 删除自身
         */

        elseif(
            $action === "delete_self"
        ){


            try{


                $messages[] =
                    deleteSelf();



                $_SESSION = [];

                session_destroy();



            }catch(Throwable $e){


                $messages[] =
                    "✗ "
                    .
                    $e->getMessage();

            }


        }



    }

}


?>
<!doctype html>

<html lang="zh-CN">

<head>

<meta charset="utf-8">

<meta
name="viewport"
content="width=device-width,initial-scale=1"
>

<title>
PHP 部署工具
</title>


<style>

*{
box-sizing:border-box;
}


body{

margin:0;

padding:20px;

background:#f3f4f6;

font-family:

Arial,

"Microsoft YaHei",

sans-serif;

color:#222;

}



.box{

width:760px;

max-width:100%;

margin:auto;

background:white;

padding:20px;

border-radius:10px;

box-shadow:

0 5px 20px

rgba(0,0,0,.08);

}



.top{

display:flex;

justify-content:space-between;

align-items:center;

margin-bottom:15px;

}



.top h2{

margin:0;

}



.logout{

color:#dc2626;

text-decoration:none;

}



.info{

background:#f8fafc;

border:1px solid #e5e7eb;

padding:10px;

border-radius:6px;

font-size:13px;

line-height:1.7;

margin-bottom:15px;

}



textarea{

width:100%;

min-height:140px;

padding:10px;

border:1px solid #ddd;

border-radius:6px;

font-family:monospace;

}



input[type=file]{

width:100%;

margin:10px 0;

}



button{

padding:10px 18px;

border:0;

border-radius:6px;

color:white;

cursor:pointer;

}



.deploy{

background:#2563eb;

}



.delete{

background:#dc2626;

}



.self-delete{

background:#111827;

}



.result{

margin-top:15px;

padding:12px;

background:#f8fafc;

border:1px solid #ddd;

border-radius:6px;

white-space:pre-line;

word-break:break-all;

font-family:monospace;

}



hr{

margin:25px 0;

border:0;

border-top:1px solid #eee;

}



small{

color:#666;

}



@media(max-width:600px){

button{

width:100%;

margin-top:10px;

}

}


</style>


</head>


<body>


<div class="box">



<div class="top">


<h2>
PHP 部署工具
</h2>


<a
class="logout"
href="?logout=1"
>
退出
</a>


</div>




<div class="info">

名字库：

<?php echo count($namePool); ?>

个

&nbsp; | &nbsp;


颜色库：

<?php echo count($colorPool); ?>

个


&nbsp; | &nbsp;


Title库：

<?php echo count($titlePool); ?>

个


<br>


每个目录随机生成文件名、颜色、Title。

</div>




<!-- ======================
部署
======================= -->


<form
method="post"
enctype="multipart/form-data"
>


<input
type="hidden"
name="csrf"
value="<?php echo e($csrfToken); ?>"
>



<strong>
选择 PHP 文件
</strong>


<input

type="file"

name="file"

accept=".php"

required

>



<strong>
部署目录
</strong>


<textarea

name="paths"

placeholder="/var/www/site1

/var/www/site2"

required

></textarea>



<small>

每行一个目录。

</small>


<br><br>



<button

class="deploy"

name="action"

value="deploy"

>

开始部署

</button>



</form>






<hr>





<!-- ======================
删除部署文件
======================= -->



<strong>
删除已部署文件
</strong>


<br><br>



<form

method="post"

onsubmit="

return confirm(
'确定删除这些文件吗？'
);

"

>


<input

type="hidden"

name="csrf"

value="<?php echo e($csrfToken); ?>"

>



<textarea

name="delete_files"

placeholder="/var/www/site1/menu.php

/var/www/site2/edit-form-advanced.php"

></textarea>



<br>



<button

class="delete"

name="action"

value="delete"

>

一键删除

</button>



</form>






<hr>






<!-- ======================
删除工具自身
======================= -->



<form

method="post"

onsubmit="

return confirm(

'警告：删除后无法恢复部署工具，确定继续？'

);

"

>



<input

type="hidden"

name="csrf"

value="<?php echo e($csrfToken); ?>"

>



<button

class="self-delete"

name="action"

value="delete_self"

>

删除本部署工具

</button>



</form>







<?php

if(
!empty($messages)
){

?>

<div class="result">


<?php


echo e(

implode(

"\n",

$messages

)

);



?>


</div>


<?php

}

?>



</div>


</body>


</html>
