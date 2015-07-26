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
    if ( !defined( 'QA_VERSION' ) ) {
        header( 'Location: /' );
        exit;
    }

    return array(
        "ur_google_page_url"          => "Page Url : The absolute URL of the Google Plus Page/Profile/Community that will be displayed . This is a required setting.",
        "settings_saved"              => "Google+ Badge settings has been saved ",
        "settings_restored"           => "Google+ Badge settings has been restored ",
        "plz_provide_gp_url"          => "Please provide your Google+ Page/Profile/Community url to display on website ",
        "show_gp_badge"               => "Show Google+ Badge ",
        "ami_gp_badge_url_lable"      => "URL to the Google+ page",
        "layout_label"                => "Orientation of the badge",
        "ami_gp_showcoverphoto_label" => "Display the cover photo in the badge (the photo should exists) ",
        "showtagline_label"           => "Display the user's tag line ",
        "theme_label"                 => "The color scheme of the badge widget ",
        "ami_gp_badge_width_label"    => "Width of the badge to render in pixels",
        "ami_gp_badge_type_lable"     => "Versions of the badges",
        "ami_gp_show_owners_label"    => "Display a list of community owners (only applicable for communities )",
        "ami_gp_showphoto_label"      => "Display the community profile photo if the photo exists (only applicable for communities )",
        "gp_badge"                    => "Google+ Badge",
        "save_changes"                => "Save Changes",
        "restore_defaults"            => "Restore Defaults",
    );