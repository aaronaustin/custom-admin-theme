<?php
/*Plugin Name: Awesome Custom Admin Theme by Aaron Austin
Description: This makes things look badass.
Version: 1.2
License: GPLv2
GitHub Plugin URI: https://github.com/aaronaustin/custom-admin-theme
*/

//ADD SCRIPTS AND STYLES
add_action( 'admin_init','awesome_custom_admin_assets');
function awesome_custom_admin_assets() {
    wp_register_style('awesome_custom_admin_style', plugins_url('style.css',__FILE__ ));
    wp_enqueue_style('awesome_custom_admin_style');
    wp_register_script('awesome_custom_admin_script', plugins_url('script.js',__FILE__ ));
    wp_enqueue_script('awesome_custom_admin_script');
    wp_register_script('google_font', 'https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i');
    wp_enqueue_script('google_font');
}

// remove links/menus from the admin bar
function awesome_admin_bar_render() {
    global $wp_admin_bar;
    
    $wp_admin_bar->add_menu( array(
		'parent' => false, // use 'false' for a root menu, or pass the ID of the parent menu
		'id' => 'custom_logo', // link ID, defaults to a sanitized title value
		'title' => __('<img src="'.plugins_url( 'central-baptist-logo-swirl.png',__FILE__ ).'" style="max-height:26px; margin: 4px;">'), // link title
		'href' => false, // name of file
		'meta' => false // array of any of the following options: array( 'html' => '', 'class' => '', 'onclick' => '', target => '', title => '' );
    ));
    
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('wp-logo');
	$wp_admin_bar->remove_menu('updates');
    $wp_admin_bar->remove_menu('site-name');
    
    $my_account = $wp_admin_bar->get_node('my-account');
    $newtitle = str_replace('Howdy,', '', $my_account->title );
    $wp_admin_bar->add_node(array(
		'id' => 'my-account',
		'title' => $newtitle,
		)
    );
    


}
add_action( 'wp_before_admin_bar_render', 'awesome_admin_bar_render' );


?>
