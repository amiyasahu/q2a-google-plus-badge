<?php

/*
	Question2Answer (c) Gideon Greenspan
	Google Plus Badge (c) Amiya Sahu (developer.amiya@outlook.com)
	
	http://www.question2answer.org/

	
	File: qa-plugin/basic-adsense/qa-plugin.php
	Version: See define()s at top of qa-include/qa-base.php
	Description: Initiates Adsense widget plugin


	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	More about this license: http://www.question2answer.org/license.php
*/

/* don't allow this page to be requested directly from browser */	
if (!defined('QA_VERSION')) {
		header('Location: /');
		exit;
}

return array(
	// languages for the facebook like modal 
	"ur_google_page_url"        => "Page Url : The absolute URL of the Google Plus Page/Profile/Community that will be displayed . This is a required setting." ,
	"settings_saved"        => "Google Plus Badge settings has been saved " ,
	"plz_provide_gp_url"    => "Please provide your Google+ Page/Profile/Community url to display on website " ,
	// languages for the facebook like box 
	"b_colorscheme_label"     => "Color Scheme : The color scheme used by the Like Box " ,
	"b_box_header_label"      => "Display the Facebook header at the top of the box " ,
	"b_show_border_label"     => "Show a border around the box " ,
	"b_show_faces_label"      => "Display profile photos of people who like the page " ,
	"b_show_stream_label"     => "Display a stream of the latest posts by the Page " ,
	"b_like_box_height_label" => "Height of the box in pixels " ,
	"b_like_box_width_label"  => "Width of the box in pixels " ,
	"b_show_fb_like_box"      => "Show Facebook Like Box " ,
	);