<?php

/**
* Plugin Name: Rename Post Labels
* Plugin URI: http://wowdevshop.com
* Description: This plugin let's you change the default labels of the post type and customize the icon.
* Author: XicoOfficial
* Version: 1.0.0
* License: GPLv2
* Author URI: http://wowdevshop.com
* Text Domain: rename-post-labels-by-wowdevshop
*
* @package WordPress
* @subpackage WowDevShop_Rename_Post_Labels
* @author XicoOfficial
* @since 1.0.0
*/

// Register Subpage menu on settings
add_action( 'admin_menu', 'wds_register_subpage' );

function wds_register_subpage() {
	add_options_page( __('Rename Post Labels', 'RenamePostLabels'), __('Rename Post Labels', 'RenamePostLabels'), 'administrator', 'rename-post-labels', 'wds_RenamePostLabels');
}


function wds_RenamePostLabels() {
	if(isset($_POST['name']) && ($_POST['name']) ) {
		$data['name'] = sanitize_text_field( $_POST['name'] );
		$data['singular_name'] = sanitize_text_field( $_POST['singular_name'] );
		$data['add_new'] = sanitize_text_field( $_POST['add_new'] );
		$data['add_new_item'] = sanitize_text_field( $_POST['add_new_item'] );
		$data['edit_item'] = sanitize_text_field( $_POST['edit_item'] );
		$data['new_item'] = sanitize_text_field( $_POST['new_item'] );
		$data['view_item'] = sanitize_text_field( $_POST['view_item'] );
		$data['search_items'] = sanitize_text_field( $_POST['search_items'] );
		$data['not_found'] = sanitize_text_field( $_POST['not_found'] );
		$data['not_found_in_trash'] = sanitize_text_field( $_POST['not_found_in_trash'] );
		update_option('RenamePostLabels', $data);
	}
	else {
		$data =  get_option('RenamePostLabels');
	}

	$name = (isset($data['name']))? esc_html($data['name']) : __('Posts', 'RenamePostLabels');
	$singular_name = (isset($data['singular_name']))? esc_html($data['singular_name']) : __('Post', 'RenamePostLabels') ;
	$add_new = (isset($data['add_new']))? esc_html($data['add_new']) : __('Add New', 'RenamePostLabels');
	$add_new_item = (isset($data['add_new_item']))? esc_html($data['add_new_item']) : __('Add New Post', 'RenamePostLabels');
	$edit_item = (isset($data['edit_item']))? esc_html($data['edit_item']) : __('Edit Post', 'RenamePostLabels');
	$new_item = (isset($data['new_item']))? esc_html($data['new_item']) : __('New Post', 'RenamePostLabels');
	$view_item = (isset($data['view_item']))? esc_html($data['view_item']) : __('View Post', 'RenamePostLabels');
	$search_items = (isset($data['search_items']))? esc_html($data['search_items']) : __('Search Posts', 'RenamePostLabels');
	$not_found = (isset($data['not_found']))? esc_html($data['not_found']) : __('No posts found', 'RenamePostLabels');
	$not_found_in_trash = (isset($data['not_found_in_trash']))? esc_html($data['not_found_in_trash']) : __('No posts found in Trash', 'RenamePostLabels');

	// Call the menu settings template
	include( 'includes/menu-settings.php' );

}

?>
