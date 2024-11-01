<?
/*
Plugin Name: Sidebar-Content from Shortcode
Plugin URI: http://dev.offensichtlich.net
Description: This Plugin enables passing content to any sidebar from the page without using userdefined fields. Therefore it is possible to use the WYSIWIG-editor of your choice.
Author: pflonk
Version: 2.0
Author URI: http://dev.offensichtlich.net
*/

//add shortcodes
add_shortcode("sidebar_content", "my_sidebar_content");
add_shortcode("insert_sidebar_content", "insert_my_sidebar_content");
add_filter('widget_text', 'do_shortcode');		//needed for shortcodes in widgets

//register widget
wp_register_sidebar_widget( 
    'sidebarcontent',							// widget id
    'Sidebar-Content from Shortcode',          	// widget name 
    'scfs_widget',  							// callback function 
    array(                  					// options 
        'description' => 'Displays the per page defined content for the sidebar, that is within the [sidebar_content] - Shortcodes' 
    ) 
);
//register widget options
wp_register_widget_control(
	'sidebarcontent',
	'sidebarcontent',
	'scfs_widget_control'
);

//callback functions for shortcodes
function my_sidebar_content($atts, $content = null){
    global $sidebar_content;
    if( !empty($content) ){
        $sidebar_content = do_shortcode($content);
    }
    return "";
}

function insert_my_sidebar_content($atts){
	global $sidebar_content;
	$divclass 	= "<div class=\"".$atts['class']."\">";
	$divid	 	= "<div id=\"".$atts['id']."\">";
	$divboth	= "<div id=\"".$atts['id']."\" class=\"".$atts['class']."\">";
	$divdef		= "<div id=\"insert_scfs\" class=\"insert_scfs\">";
	$div 		= "</div>";
	if(isset($atts['class']) && !isset($atts['id'])){
		return $divclass.$sidebar_content.$div;
	}
	elseif(isset($atts['id']) && !isset($atts['class'])){
		return $divid.$sidebar_content.$div;
	}
	elseif(isset($atts['id']) && isset($atts['class'])){
		return $divboth.$sidear_content.$div;
	}
	else{
		return $divdef.$sidebar_content.$div;
	}
}

//setting callback function for widget display
function scfs_widget() {
  global $sidebar_content;
	$widgettag	 			= get_option('scfs_widget_tag');
	$widgettitle 			= get_option('scfs_widget_title');
	$widgettitletag			= get_option('scfs_widget_title_tag');
	$widgettitletagclass	= get_option('scfs_widget_title_tag_class');
	$widgetclass 			= get_option('scfs_widget_class');
	$widgetid 				= get_option('scfs_widget_id');
  if( isset($sidebar_content) && !empty($sidebar_content) ){
	if($widgettag == ''){
		$widgettag = "div";
	}
	if($widgettitletag == ''){
		$widgettitletag = "h3";
	}
	if($widgettitletagclass == ''){
		$widgettitletagclass = "scfs_titletagclass";
	}
	
	$divclass 	= "<".$widgettag." class=\"".$widgetclass."\">";
	$divid	 	= "<".$widgettag." id=\"".$widgetid."\">";
	$divboth	= "<".$widgettag." id=\"".$widgetid."\" class=\"".$widgetclass."\">";
	$divdef		= "<".$widgettag." id=\"scfs\" class=\"scfs\">";
	$div 		= "</".$widgettag.">";
	$tit		= "";
	
	if($widgettitle != ''){
		$tit = "<".$widgettitletag." class=\"".$widgettitletagclass."\">".$widgettitle."</".$widgettitletag.">";
	}
	
	if($widgetclass != '' && $widgetid == ''){
		echo $divclass.$tit.$sidebar_content.$div;
	}
	elseif($widgetid != '' && $widgetclass == ''){
		echo $divid.$tit.$sidebar_content.$div;
	}
	elseif($widgetclass != '' && $widgetid != ''){
		echo $divboth.$tit.$sidear_content.$div;
	}
	else{
		echo $divdef.$tit.$sidebar_content.$div;
	}
  }
}

//setting callback function for widget options
function scfs_widget_control($args=array(), $params=array()){
if (isset($_POST['submitted'])) {
		update_option('scfs_widget_tag', $_POST['widgettag']);
		update_option('scfs_widget_title', $_POST['widgettitle']);
		update_option('scfs_widget_title_tag', $_POST['widgettitletag']);
		update_option('scfs_widget_title_tag_class', $_POST['widgettitletagclass']);
		update_option('scfs_widget_class', $_POST['widgetclass']);
		update_option('scfs_widget_id', $_POST['widgetid']);
	}
	
		$widgettag	 			= get_option('scfs_widget_tag');
		$widgettitle 			= get_option('scfs_widget_title');
		$widgettitletag			= get_option('scfs_widget_title_tag');
		$widgettitletagclass	= get_option('scfs_widget_title_tag_class');
		$widgetclass 			= get_option('scfs_widget_class');
		$widgetid 				= get_option('scfs_widget_id');

?>
	<h3>Title Options</h3>
		Widget Title <i>(optional)</i><br />
		<input type="text" class="widefat" name="widgettitle" value="<?php echo stripslashes($widgettitle); ?>" />
		<br /><i>The title that is displayed above the content</i><br /><br/>
		
		Widget Title Tag <i>(default: h3)</i><br />
		<input type="text" class="widefat" name="widgettitletag" value="<?php echo stripslashes($widgettitletag); ?>" />
		<br /><i>The HTML-Tag that encloses the title</i><br /><br/>

		Widget Title Tag classes <i>(optional)</i><br />
		<input type="text" class="widefat" name="widgettitletagclass" value="<?php echo stripslashes($widgettitletagclass); ?>" />
		<br /><i>The CSS-class that is applied to the title tag</i><br /><br/>
	
	<h3>Content Options</h3>
		content-wrapper Tag <i>(default: div)</i><br />
		<input type="text" class="widefat" name="widgettag" value="<?php echo stripslashes($widgettag); ?>" />
		<br /><i>The HTML-Tag that encloses the content</i><br /><br/>

		CSS classes <i>(optional)</i><br />
		<input type="text" class="widefat" name="widgetclass" value="<?php echo stripslashes($widgetclass); ?>" />
		<br /><i>The CSS-class that is applied to the content-container</i><br /><br/>
		
		CSS id <i>(optional)</i><br />
		<input type="text" class="widefat" name="widgetid" value="<?php echo stripslashes($widgetid); ?>" />
		<br /><i>The CSS-id that is applied to the content-container</i><br /><br/>

		<input type="hidden" name="submitted" value="1" />
<?php 
}