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
	"show_gp_badge"      => "Show Google+ Badge " ,
	"ami_gp_badge_url_lable"      => "URL to the Google+ page" ,
	"layout_label"               => "Orientation of the badge" ,
	"portrait"                   => "Portrait" ,
	"landscape"                  => "Landscape" ,
	"ami_gp_showcoverphoto_label" => "Displays the cover photo in the badge if set to true and the photo exists." ,
	"showtagline_label"          => "Displays the user's tag line if set to true." ,
	"theme_label"                => "The color theme of the badge. Use dark when placing the badge on a page with a dark background." ,
	"ami_gp_badge_width_label"    => "The pixel width of the badge to render.(Recomended 360px )" ,
	"ami_gp_badge_type_lable"     => "Versions of the badges" ,
	"ami_gp_show_owners_label"    => "Displays a list of community owners if set to true. (only applicable for communities )" ,
	"ami_gp_showphoto_label"      => "Displays a list of community owners if set to true. (only applicable for communities )" ,
	"gp_badge"                   => "Google Plus Badge" ,
	"ami_show_gp_badge_header"                   => "Show widget header" ,
	"ami_gp_badge_costum_header"                   => "Costum Header" ,
	"ami_gp_badge_default_header"                   => "Follow us on Goole+" ,

);