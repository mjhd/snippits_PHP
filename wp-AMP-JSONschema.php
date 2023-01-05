---- IN: functions.php ----

function site_navigation_schema() {

  $nav_menu_items = wp_get_nav_menu_items('MainMenu');
  $nav_items_processed = 0;
  
  $nav_menu_schema = '<script type="application/ld+json">' . "\n{\n";
  $nav_menu_schema .= "\t" . '"@context": "https://schema.org",' . "\n\t" . '"@graph": [' . "\n";
  foreach($nav_menu_items as $nav_menu_item){
    $nav_menu_schema .=  (($nav_items_processed++) ? ",\n" : '');
    $nav_menu_schema .=  "\t\t\t{\n";
    $nav_menu_schema .=  "\t\t\t\t" . '"@context": "https://schema.org",' . "\n";
    $nav_menu_schema .=  "\t\t\t\t" . '"@type": "SiteNavigationElement",' . "\n";
    $nav_menu_schema .=  "\t\t\t\t" . '"@id": "#table-of-contents",' . "\n";
    $nav_menu_schema .=  "\t\t\t\t" . '"name": "' . $nav_menu_item->title . '",' . "\n";
    $nav_menu_schema .=  "\t\t\t\t" . '"url": "' . $nav_menu_item->url . '"' . "\n";
    $nav_menu_schema .=  "\n\t\t\t}";
  }
  $nav_menu_schema .=  "\n\t]\n}\n" . '</script>';
  echo $nav_menu_schema;
}

if(!is_admin()){
    global $wp;
    if (preg_match('/(\?|\/\?|\/+)amp\/?$/', home_url( $wp->request ) . $_SERVER['REQUEST_URI']) && !(preg_match('/^(.*google.*|.*bing.*|.*yahoo.*|.*facebook.*|.*duckduckgo.*|.*sogou.*|.*baidu.*|.*proximic.*)$/', $_SERVER['HTTP_USER_AGENT']))) {
        wp_redirect(preg_replace('/(\?|\/\?|\/+)amp\/?$/', '', home_url( $wp->request ) . $_SERVER['REQUEST_URI']));
        exit;
    }

  add_action('wp_head', 'site_navigation_schema');
  add_action('amp_post_template_head', 'site_navigation_schema');
}



---- DON'T FORGET TO TURN ON "Change End Point to ?amp" IN: (Menu) AMP > Settings > Advanced Settings && change the value in $nav_menu_items to correct menu name ----



---- IN: (Menu) AMP > Settings > SEO > "Head Section" ----

<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
<amp-analytics type="gtag" data-credentials="include">
<script type="application/json">
{
    "vars" : {
        "gtag_id": "UA-143459654-6",
        "config" : {
                "UA-143459654-6": { "groups": "default" }
        }
    }
}
</script>
</amp-analytics>





---- TO view AMP pages in chrome, GOTO: (Chrome dev tools) > Settings (gear top right of panel) > Devices (UNDER Emulated Devices) "Add custom device" ----

NAME: GoogleBot1
RESOLUTION: 1280 x 1200 (Make anything that works for res)
USER AGENT STRING: Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)
TYPE: Desktop

SAVE (Make sure to select by clicking check box next to GoogleBot1) (WHEN USING: Works well scaled to 50%)
PULL Devtools down until smaller, and select GoogleBot1 from the user agent dropdown in the top menu, just above the site content