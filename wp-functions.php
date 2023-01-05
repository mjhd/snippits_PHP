<?php
/*ADD:*/ add_filter('use_block_editor_for_post', '__return_false', 10);
//TO: wp-config.php
//INSTALL: SiteOrigin Page Builder and WIdgets Bundle
?>




<?php

function remove_hatom($buffer) {
$buffer = preg_replace('/<script type=("|\')application\/ld+json("|\')[\S\s]*?<\/script>/', '', $buffer);
$buffer = '<aside style="display: none;">loorrp</aside>' . $buffer;
return $buffer;
}
ob_start("remove_hatom");

?>





<?php

ob_start();

add_action('shutdown', function() {
    $final = '';

    // We'll need to get the number of ob levels we're in, so that we can iterate over each, collecting
    // that buffer's output into the final output.
    $levels = ob_get_level();

    for ($i = 0; $i < $levels; $i++) {
        $final .= ob_get_clean();
    }

    // Apply any filters to the final output
    echo apply_filters('final_output', $final);
}, 0);

add_filter('final_output', function($output) {
    $buffer = $output;
    $remove_attributes = array('itemprop', 'itemscope', 'itemtype');
    foreach($remove_attributes as $attribute){
        $buffer = preg_replace('/' . $attribute . '=(\'|").*?(\'|")/', '', $buffer);
        $buffer = preg_replace('/(<(div|p|span|aside|a|li|ul|ol|table|tr|tc|td|h1|h2|h3|h4|h5|h6))\s*([^>]*)\s*(' . $attribute . ')/', '$1$3', $buffer);
    }
    return $buffer;
});

?>





<?php
// search through a string to contain all words in a search string - bonus - regex in search terms! (requires search query to be posted to script)



$final_result;

function process_search_results($search_results, $current_results){
    global $final_result;
    if (empty($final_result))
    	$final_result = $search_results;
    $current_result = array_shift($search_results);
    if(count($current_results)){
        $new_results = array();
        $new_result = array();
        foreach($current_result as $result){
            foreach($current_results as $next_result_array){
                $result_array = array();
                foreach($next_result_array as $next_result){
                    array_push($result_array, $next_result);
                }
                array_push($result_array, $result);
                array_push($new_result, $result_array);
            }
            $final_result = $new_result;
        }
    }
    if(count($search_results)){
        $new_results = array();
        foreach($current_result as $result){
            array_push($new_results, array($result));
        }
        process_search_results($search_results, ((!empty($new_result)) ? $new_result : $new_results ));
    }
    return $final_result;
}


function filter_forms($var){

    $search_terms = preg_split('/\s/', $_POST['search_query']);
    $entry_terms = preg_split('/\s/', $var);
    $match = 1;
    $search_results = array();

    foreach($search_terms as $search_term){

    	if($match){
    		$search_matches = array();
	        $match = 0;

	        foreach ($entry_terms as $index => $entry_term) {
	        	preg_match('/.*' . $search_term . '.*/i', $entry_term, $matches);

	        	if (!empty($matches[0])) {
	        		$match = 1;
	        		array_push($search_matches, $index);
	        	}
		    }
		    array_push($search_results, $search_matches);
		}
    }
    if($match){
    	$final_matches = array();
    	foreach($search_results as $index => $search_result)
    		array_push($final_matches, $search_result);

    	$valid_match = 0;
    	foreach (process_search_results($final_matches, array()) as $final_match) {
    		if(!(count($final_match) - count(array_unique($final_match))))
    			$valid_match = 1;
    	}

		if($valid_match)
			return $var;
    }
}

$hipaa_forms_list_all = array('James Imaginary', 'Linda Madeup', 'Dave Notaguy');

$hipaa_forms_list_all = array_filter($hipaa_forms_list_all, 'filter_forms');

?>





<?php
//GRAVITY FORMS FILTER OBSCENITIES PHP SCRIPT:

function disable_notification( $is_disabled, $notification, $form, $entry ) {
$ban_words = array("analsex", "arsehole", "ass", "assbagger", "assblaster", "assclown", "asscowboy", "assfuck", "assfucker", "asshole", "assjockey", "assclown", "asslick", "asslicker", "assmonkey", "assmunch", "assmuncher", "asspacker", "asspirate", "asspuppies", "assranger", "asswhore", "asswipe", "badfuck", "balllicker", "barelylegal", "beaner", "beastality", "beastiality", "beatoff", "beat-off", "beatyourmeat", "bestiality", "biatch", "bicurious", "bigbutt", "bisexual", "bi-sexual", "bondage", "boner", "bootycall", "breastjob", "breastlover", "breastman", "brothel", "bulldike", "bulldyke", "bullshit", "bumblefuck", "bumfuck", "bunghole", "butchdike", "butchdyke", "buttbang", "butt-bang", "buttface", "buttfuck", "butt-fuck", "buttfucker", "butt-fucker", "buttfuckers", "butt-fuckers", "buttmunch", "buttmuncher", "buttpirate", "buttplug", "buttstain", "cameljockey", "cameltoe", "carpetmuncher", "cherrypopper", "chickslick", "chinaman", "chinamen", "chink", "chinky", "choad", "chode", "clamdigger", "clit", "cockblock", "cockblocker", "cockcowboy", "cockhead", "cockknob", "cocklicker", "cocklover", "cocknob", "cockqueen", "cockrider", "cocksmoker", "cocksucer", "cocksuck", "cocksucked", "cocksucker", "cocksucking", "cocktease", "commie", "crackpipe", "crackwhore", "crack-whore", "crotchjockey", "crotchmonkey", "crotchrot", "cum", "cumbubble", "cumfest",
 "cumjockey", "cumm", "cummer", "cumming", "cumqueen", "cumshot", "cunilingus", "cunillingus", "cunnilingus", "cunntt", "cunt", "cunteyed", "cuntfuck", "cuntfucker", "cuntlick", "cuntlicker", "cuntlicking", "cuntsucker", "cybersex", "cyberslimer", "dago", "datnigga", "deapthroat", "deepthroat", "devilworshipper", "dickbrain", "dickforbrains", "dickhead", "dickless", "dicklick", "dicklicker", "dickwad", "dike", "dildo", "dingleberry", "dipshit", "dixiedike", "dixiedyke", "doggiestyle", "doggystyle", "doodoo", "doo-doo", "dragqueen", "dragqween", "dripdick", "dumbass", "dumbbitch", "dumbfuck", "dyke", "easyslut", "eatballs", "eatme", "eatpussy", "ejaculate", "ejaculated", "ejaculating", "ejaculation", "facefucker", "fag", "faggot", "fagot", "fannyfucker", "fastfuck", "fatass", "fatfuck", "fatfucker", "fckcum", "fetish", "fingerfuck", "fingerfucked", "fingerfucker", "fingerfuckers", "fingerfucking", "fister", "fistfuck", "fistfucked", "fistfucker", "fistfucking", "fisting", "footaction", "footfuck", "footfucker", "footlicker", "foursome", "freakfuck", "freakyfucker", "freefuck", "fucck", "fuck", "fucka", "fuckable", "fuckbag", "fuckbuddy", "fucked", "fuckedup", "fucker", "fuckers", "fuckface", "fuckfest", "fuckfreak", "fuckfriend", "fuckhead", "fuckher", "fuckin", "fuckina", "fucking", "fuckingbitch", "fuckinnuts",
 "fuckinright", "fuckit", "fuckknob", "fuckme", "fuckmehard", "fuckmonkey", "fuckoff", "fuckpig", "fucks", "fucktard", "fuckwhore", "fuckyou", "fudgepacker", "fugly", "fuk", "fuks", "funfuck", "fuuck", "gangbang", "gangbanged", "gangbanger", "gaymuthafuckinwhore", "gaysex", "givehead", "goddamnmuthafucker", "goldenshower", "gonorrehea", "gook", "gotohell", "goyim", "greaseball", "gringo", "gun", "gypo", "gyppie", "gyppo", "gyppy", "hamas", "handjob", "harem", "headfuck", "hillbillies", "hiscock", "hitler", "hitlerism", "hitlerist", "holestuffer", "homobangers", "horniest", "horseshit",
 "hotpussy", "hottotrot", "hussy", "hustler", "incest", "insest", "interracial", "intheass", "inthebuff", "jackass", "jackoff", "jackshit", "jap", "jerkoff", "jigga", "jihad", "jism", "jiz", "jizim", "jizjuice", "jizm", "jizz", "jizzim", "jizzum", "juggalo", "junglebunny", "kaffer", "kaffir", "kaffre", "kafir", "kike", "kink", "kinky", "kkk", "knockers", "koon", "kumbubble", "kumbullbe", "kummer", "kumming", "kums", "kunt", "kyke", "lapdance", "lesbo", "lezbo",
 "lezz", "lezzo", "lickme", "limpdick", "livesex", "loadedgun", "lolita", "lovebone", "lovegoo", "lovegun", "lovejuice", "lovemuscle", "lovepistol", "loverocket", "lubejob", "lucifer", "luckycammeltoe", "manhater", "manpaste", "mastabate", "mastabater", "masterbate", "masterblaster", "mastrabator", "masturbate", "masturbating", "mattressprincess", "meatbeatter", "milf", "mofo", "molest", "molestation", "molester", "molestor", "moneyshot", "mothafuck", "mothafucka", "mothafuckaz", "mothafucked", "mothafucker", "mothafuckin", "mothafucking", "mothafuckings", "motherfuck", "motherfucked", "motherfucker", "motherfuckin", "motherfucking", "motherfuckings", "motherlovebone", "muff", "muffdive", "muffdiver", "muffindiver", "mufflikcer", "nastybitch", "nastyho", "nastyslut", "nastywhore", "nazi", "negroes", "negroid", "negro's", "nig", "nigg", "nigga", "niggah", "niggaracci", "niggaz", "nigger", "niggerhead", "niggerhole", "niggers", "nigger's", "niggle", "niggled", "niggles", "niggling", "nigglings", "niggor", "niggur", "niglet", "nignog", "nigr", "nigra",
 "nigre", "nlgger", "nlggor", "nofuckingway", "nude", "nutfucker", "nymph", "peckerwood", "peehole", "peepshow", "peepshpw", "peni5", "perv", "phonesex", "pimp", "pimped", "pimpjuic", "pimpjuice", "pisshead", "pissoff", "poon", "poontang", "poorwhitetrash", "porchmonkey", "porn", "pornflick", "pornking", "porno", "pornography", "pornprincess", "prick", "prickhead", "prostitute", "pu55i", "pu55y", "pussie", "pussies", "pussy", "pussyeater", "pussyfucker", "pussylicker", "pussylips", "pussylover", "pussypounder", "pusy", "queef", "raghead", "rape", "raped", "raper", "rapist", "redneck", "rentafuck", "rimjob", "sandnigger", "schlong", "sexfarm", "sexhound", "sexhouse", "sexing", "sexkitten", "sexpot", "sexslave", "sextogo", "sextoy", "sextoys", "sexual", "sexually", "sexwhore", "sexy", "sexymoma", "sexy-slim", "shag", "shaggin", "shagging",
 "shit", "shitcan", "shitdick", "shite", "shiteater", "shited", "shitface", "shitfaced", "shitfit", "shitforbrains", "shitfuck", "shitfucker", "shitfull", "shithapens", "shithappens", "shithead", "shithouse", "shiting", "shitlist", "shitola", "shitoutofluck", "shits", "shitstain", "shitted", "shitter", "shitting", "shitty", "shortfuck", "sissy", "sixsixsix", "skank", "skankbitch", "skankfuck", "skankwhore", "skanky", "skankybitch", "skankywhore", "skinflute", "slanteye", "slave", "slavedriver", "sleezebag", "sleezeball", "slideitin", "slopehead", "slut", "sluts", "slutt", "slutting", "slutty", "slutwear", "slutwhore", "smackthemonkey", "smut", "snownigger", "sodomise", "sodomite", "sodomize", "sodomy", "sonofabitch", "sonofbitch", "spaghettinigger", "spank", "spankthemonkey", "spermbag", "spermhearder", "spermherder", "spic", "spick", "spig", "spigotty", "spik", "spooge", "spreadeagle", "stiffy", "strapon", "stripclub", "stupidfuck", "stupidfucker", "suckdick", "suckme", "suckmyass", "suckmydick", "suckmytit", "suckoff", "swastika", "tarbaby", "tard", "terrorist", "thirdleg", "threesome", "threeway", "timbernigger", "titbitnipply", "titfuck", "titfucker", "titfuckin", "titjob", "titlicker", "titlover", "tits", "tittie", "titties", "titty", "tonguethrust", "tonguetramp", "towelhead", "trailertrash", "tramp", "tuckahoe", "tunneloflove", "twat", "twink", "unfuckable", "upskirt", "upthebutt", "vibrater", "vibrator", "wank", "wanker", "wanking", "wetback", "whigger", "whiskeydick", "whiskydick", "whitenigger", "whitetrash", "whore", "whorefucker", "whorehouse", "wigger", "williewanker", "yellowman", "zipperhead");

   return (empty(array_uintersect(explode(' ', $entry[1]), $ban_words, 'strcasecmp'))) ? false : true;
}
add_filter( 'gform_disable_notification', 'disable_notification', 10, 4 );
/*Remove:
 "sexual", "sexually", 
from above list - as these terms would eliminate the phrases "sexually transmitted disease", and other similar phrases...*/
?>






<?php

function site_navigation_schema() {

	$nav_menu_items = wp_get_nav_menu_items('MainMenu');
	$nav_menu_item_count = count($nav_menu_items);
	$nav_items_processed = 0;
	
	$nav_menu_schema = '<script type="application/ld+json">' . "\n{\n";
	$nav_menu_schema .= "\t" . '"@context": "https://schema.org",' . "\n\t" . '"@graph": [' . "\n";
	foreach($nav_menu_items as $nav_menu_item){
		$nav_menu_schema .=  "\t\t\t{\n";
		$nav_menu_schema .=  "\t\t\t\t" . '"@context": "https://schema.org",' . "\n";
		$nav_menu_schema .=  "\t\t\t\t" . '"@type": "SiteNavigationElement",' . "\n";
		$nav_menu_schema .=  "\t\t\t\t" . '"@id": "#table-of-contents",' . "\n";
		$nav_menu_schema .=  "\t\t\t\t" . '"name": "' . $nav_menu_item->title . '",' . "\n";
		$nav_menu_schema .=  "\t\t\t\t" . '"url": "' . $nav_menu_item->url . '"' . "\n";
		$nav_menu_schema .=  "\n\t\t\t}";
		$nav_menu_schema .=  (($nav_menu_item_count == (++$nav_items_processed)) ? '' : ',') . "\n" ;
	}
	$nav_menu_schema .=  "\t]\n}\n" . '</script>';
	echo $nav_menu_schema;
}

function page_breadcrumb_schema() {
	global $wp;
	$page_breadcrumb_home = get_site_url();
	$page_breadcrumb_current = $page_breadcrumb_home;
	$page_breadcrumb_uri = get_page_uri();
	$page_breadcrumb_list = array();
	$page_breadcrumb_parts = explode('/', $page_breadcrumb_uri);
	$page_breadcrumb_amp = ($page_breadcrumb_parts[count($page_breadcrumb_parts) - 1]);

	$page_breadcrumb_schema = '<script type="text/javascript">console.log("';// . "\n{\n";

	foreach($page_breadcrumb_parts as $breadcrumb) {
		array_push($page_breadcrumb_list, $page_breadcrumb_current);
		$page_breadcrumb_current .= '/' . $breadcrumb;
	}

	if($page_breadcrumb_amp !== '?amp')
		array_push($page_breadcrumb_list, $page_breadcrumb_current);
	else
		$page_breadcrumb_list[count($page_breadcrumb_list) - 1] .= $page_breadcrumb_amp;



	$page_breacrumb_items_count = count($page_breadcrumb_list);
	$page_breacrumb_items_processed = 0;
	$page_breadcrumb_schema = '<script type="application/ld+json">' . "\n{\n";
	$page_breadcrumb_schema .= "\t" . '"@context": "https://schema.org",' . "\n";
	$page_breadcrumb_schema .= "\t" . '"@type": "BreadcrumbList",' . "\n";
	$page_breadcrumb_schema .= "\t" . '"itemListElement": [' . "\n";
		
	foreach($page_breadcrumb_list as $breadcrumb_output){
		$page_breadcrumb_schema .=  "\t\t\t{\n";
		$page_breadcrumb_schema .=  "\t\t\t\t" . '"@type": "ListItem",' . "\n";
		$page_breadcrumb_schema .=  "\t\t\t\t" . '"position": ' . ++$page_breacrumb_output_count . ',' . "\n";
		$page_breadcrumb_schema .=  "\t\t\t\t" . '"item": "' . $breadcrumb_output . '"' . "\n";
		$page_breadcrumb_schema .=  "\n\t\t\t}";
		$page_breadcrumb_schema .=  (($page_breacrumb_item_count == ($page_breacrumb_processed)) ? '' : ',') . "\n" ;
	}
	$page_breadcrumb_schema .=  "\t]\n}\n" . '</script>';
	echo $page_breadcrumb_schema;
}

if(!is_admin()){

    global $wp;
    if (preg_match('/(\?|\/\?|\/+)amp\/?$/', home_url( $wp->request ) . $_SERVER['REQUEST_URI']) && !(preg_match('/^(.*google.*|.*bing.*|.*yahoo.*|.*facebook.*|.*duckduckgo.*|.*semrush.*|.*sogou.*|.*baidu.*|.*proximic.*)$/', $_SERVER['HTTP_USER_AGENT']))) {
        wp_redirect(preg_replace('/(\?|\/\?|\/+)amp\/?$/', '', home_url( $wp->request ) . $_SERVER['REQUEST_URI']));
        exit;
    }

	add_action('wp_head', 'site_navigation_schema');
	add_action('amp_post_template_head', 'site_navigation_schema'); //amp_post_template_head
	add_action('wp_head', 'page_breadcrumb_schema');
	add_action('amp_post_template_head', 'page_breadcrumb_schema'); //amp_post_template_head
}

/* Custom functions code goes here. */
function custom_screenlock() {
echo '<style type="text/css">
.us-hb-screenlock {display:none;}
</style>';}
add_action('admin_head', 'custom_screenlock');

/* Add ability to hide form labels */
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

/*fix all tab index on forms */
add_filter("gform_tabindex", create_function("", "return false;"));



function add_categories_to_pages() {
	register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_categories_to_pages' );

function uncategorized_removal_styles(){
	printf("<style>body.wp-admin.post-type-page.post-php #categorydiv #category-all li#category-1 { display: none; } body.wp-admin.post-type-page.edit-php #the-list > .quick-edit-row li#category-1 { display: none; }</style>");
}

add_action('admin_notices', 'uncategorized_removal_styles');

?>