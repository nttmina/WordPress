<?php
/*
Plugin Name: 247AppsStudio Show All Shortcodes
Plugin URI: http://www.247apps.mobi
Description: Display all available shortcodes of this Wordpress. This page displays all shortcodes currently registered so you can use these in the text editor of Wordpress.
Version: 1.0.0
Author: 247AppsStudio
Author URI: http://www.247apps.mobi
*/

/**
 * Copyright (c) 2021 247AppsStudio. All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

if(is_admin()){
	$shortcodes = new ShowAllShortcodes();
}

/**
 * View all available shrotcodes on an admin Settings page
 **/
class ShowAllShortcodes
{
	public function __construct()
	{
		$this->Admin();
	}
	/**
	 * Create the admin settings menu
	 */
	public function Admin(){
		add_action( 'admin_menu', array(&$this,'addToAdminMenu') );
	}

	/**
	 * Function for the admin menu to create a menu item in the settings tree
	 */
	public function addToAdminMenu(){
		add_submenu_page(
			'options-general.php',
			'View All Shortcodes',
			'View All Shortcodes',
			'manage_options',
			'show-all-shortcodes',
			array(&$this,'displayAdminSettingsPage'));
	}

	/**
	 * Display on settings page
	 */
	public function displayAdminSettingsPage(){
		global $shortcode_tags;

        ?>
        <div class="wrap">
        	<div id="icon-options-general" class="icon32"><br></div>
			<h2>View All Available Shortcodes</h2>
			<div class="section panel">
				<p>This page will display all of the available shortcodes that you can use on your Wordpress blog.</p>
        	<table class="widefat importers">
        		<tr><td><h3>Available Shortcodes that you can copy/paste to WP page/post/widget</h3></td></tr>
        <?php

	        foreach($shortcode_tags as $code => $function)
	        {
	        	?>
	        		<tr><td>[<?php echo $code; ?>]</td></tr>
	        	<?php
	        }
	    ?>

			</table>
			</div>
		</div>
		<?php
	}
} // END class