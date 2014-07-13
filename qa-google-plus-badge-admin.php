<?php

/*
  Question2Answer (c) Gideon Greenspan
  Google Plus Badge (c) Amiya Sahu (developer.amiya@outlook.com)

	http://www.question2answer.org/

	
	File: qa-plugin/basic-adsense/qa-basic-adsense.php
	Version: See define()s at top of qa-include/qa-base.php
	Description: Widget module class for AdSense widget plugin


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

	class q2a_google_plus_badge_admin {
    /*added the options as constants to avoid multiple occurances */
    const SHOW_BADGE       = 'ami_show_gp_badge' ;
    const GPLUS_URL        = 'ami_gp_badge_url' ;
    const BADGE_TYPE       = 'ami_gp_badge_type' ;
    const BADGE_LAYOUT     = 'ami_gp_badge_layout' ;
    const BADGE_THEME      = 'ami_gp_badge_theme';
    const BADGE_SHOW_COVER = 'ami_gp_badge_showcoverphoto';
    const SHOW_PHOTO       = 'ami_gp_badge_showphoto';
    const SHOW_OWNERS      = 'ami_gp_badge_show_owners';
    const SHOW_TAGLINE     = 'ami_gp_badge_showtagline';
    const BADGE_WIDTH      = 'ami_gp_badge_width';
    const SAVE_BUTTON      = 'gp_badge_save_btn';

		function allow_template($template)
		{
			return ($template!='admin');
		}
		
		function allow_region($region)
		{
			$allow=false;
			
			switch ($region)
			{
				case 'main':
				case 'side':
				case 'full':
					$allow=true;
					break;
			}
			
			return $allow;
		}

		
		function admin_form(&$qa_content)
		{
			$saved=false;
			
			if (qa_clicked(self::SAVE_BUTTON)) {	
              qa_opt(self::SHOW_BADGE ,       !!qa_post_text(self::SHOW_BADGE));
              qa_opt(self::GPLUS_URL ,        qa_post_text(self::GPLUS_URL));
              qa_opt(self::BADGE_TYPE ,       qa_post_text(self::BADGE_TYPE));
              qa_opt(self::BADGE_LAYOUT ,     qa_post_text(self::BADGE_LAYOUT));
              qa_opt(self::BADGE_THEME ,      qa_post_text(self::BADGE_THEME));
              qa_opt(self::BADGE_SHOW_COVER , qa_post_text(self::BADGE_SHOW_COVER));
              qa_opt(self::SHOW_PHOTO ,       qa_post_text(self::SHOW_PHOTO));
              qa_opt(self::SHOW_OWNERS ,      qa_post_text(self::SHOW_OWNERS));
              qa_opt(self::SHOW_TAGLINE ,     qa_post_text(self::SHOW_TAGLINE));
              qa_opt(self::BADGE_WIDTH ,      qa_post_text(self::BADGE_WIDTH));
        			$saved=true;
			}
			qa_set_display_rules($qa_content, array(
                 self::BADGE_TYPE       => self::SHOW_BADGE ,
                 self::BADGE_LAYOUT     => self::SHOW_BADGE ,
                 self::BADGE_THEME      => self::SHOW_BADGE ,
                 self::BADGE_SHOW_COVER => self::SHOW_BADGE ,
                 self::SHOW_PHOTO       => self::SHOW_BADGE ,
                 self::SHOW_OWNERS      => self::SHOW_BADGE ,
                 self::SHOW_TAGLINE     => self::SHOW_BADGE ,
                 self::BADGE_WIDTH      => self::SHOW_BADGE ,
            ));
			return array(
				'ok' => $saved ? qa_lang('gp_badge/settings_saved') : null,
				
				'fields' => array(
                    self::GPLUS_URL => array(
                        'label' => qa_lang('gp_badge/ami_gp_badge_url_lable'),
                        'type'  => 'text',
                        'tags'  => 'name="ami_gp_badge_url"',
                        'value' => qa_opt(self::GPLUS_URL),
                    ),
                    self::SHOW_BADGE => array(
                        'label' => qa_lang('gp_badge/show_gp_badge'),
                        'tags'  => 'name="ami_show_gp_badge" id="ami_show_gp_badge"',
                        'value' => qa_opt(self::SHOW_BADGE),
                        'type'  => 'checkbox',
                    ),
                    self::BADGE_TYPE => array(
                        'id' => self::BADGE_TYPE ,
                        'label' => qa_lang('gp_badge/ami_gp_badge_type_lable'),
                        'type'  => 'select',
                        'tags'  => 'name="ami_gp_badge_type"',
                        'value' => qa_opt(self::BADGE_TYPE),
                        'options' => array(
                              'g-person'    => 'g-person' ,
                              'g-page'      => 'g-page' ,
                              'g-community' => 'g-community' ,
                        ),
                    ),

                    self::BADGE_LAYOUT => array(
                        'id' => self::BADGE_LAYOUT ,
                        'label' => qa_lang('gp_badge/layout_label'),
                        'type'  => 'select',
                        'tags'  => 'name="ami_gp_badge_layout"',
                        'value' => qa_opt(self::BADGE_LAYOUT),
                        'options' => array(
                              'portrait'  =>'portrait' ,
                              'landscape' =>'landscape' ,
                        ),
                    ),

                    self::BADGE_THEME => array(
                        'id' => self::BADGE_THEME ,
                        'label' => qa_lang('gp_badge/theme_label'),
                        'type'  => 'select',
                        'tags'  => 'name="ami_gp_badge_theme"',
                        'value' => qa_opt(self::BADGE_THEME),
                        'options' => array(
                              'light' =>'light' ,
                              'dark'  =>'dark' ,
                        ),
                    ),

                   self::BADGE_SHOW_COVER => array(
                        'id' => self::BADGE_SHOW_COVER ,
                        'label' => qa_lang('gp_badge/ami_gp_showcoverphoto_label'),
                        'type'  => 'select',
                        'tags'  => 'name="ami_gp_badge_showcoverphoto"',
                        'value' => qa_opt(self::BADGE_SHOW_COVER),
                        'options' => array(
                              'true'  => 'true' ,
                              'false' => 'false' ,
                        ),
                    ),

                   self::SHOW_PHOTO => array(
                        'id' => self::SHOW_PHOTO ,
                        'label' => qa_lang('gp_badge/ami_gp_showphoto_label'),
                        'type'  => 'select',
                        'tags'  => 'name="ami_gp_badge_showphoto"',
                        'value' => qa_opt(self::SHOW_PHOTO),
                        'options' => array(
                              'true'  => 'true' ,
                              'false' => 'false' ,
                        ),
                    ),

                  self::SHOW_OWNERS => array(
                        'id' => self::SHOW_OWNERS ,
                        'label' => qa_lang('gp_badge/ami_gp_show_owners_label'),
                        'type'  => 'select',
                        'tags'  => 'name="ami_gp_badge_show_owners"',
                        'value' => qa_opt(self::SHOW_OWNERS),
                        'options' => array(
                              'true'  => 'true' ,
                              'false' => 'false' ,
                        ),
                    ),

                   self::SHOW_TAGLINE => array(
                        'id' => self::SHOW_TAGLINE ,
                        'label' => qa_lang('gp_badge/showtagline_label'),
                        'type'  => 'select',
                        'tags'  => 'name="ami_gp_badge_showtagline"',
                        'value' => qa_opt(self::SHOW_TAGLINE),
                        'options' => array(
                               'true'  => 'true' ,
                               'false' => 'false' ,
                        ),
                    ),
                    
                   self::BADGE_WIDTH => array(
                        'id' => self::BADGE_WIDTH ,
                        'label' => qa_lang('gp_badge/ami_gp_badge_width_label'),
                        'type'  => 'text',
                        'tags'  => 'name="ami_gp_badge_width"',
                        'value' => qa_opt(self::BADGE_WIDTH),
                    ),

                ),
				
				'buttons' => array(
      					array(
      						'label' => qa_lang('gp_badge/save_changes'),
      						'tags' => 'name="'.self::SAVE_BUTTON.'"',
      					),
				 ),
			);
		}
    function option_default($option) {

      switch($option) {
          case self::SHOW_BADGE:
            return 1;
          case self::GPLUS_URL:
            return 'https://plus.google.com/u/0/+AmiyaSahu-WebDeveloper';
          case self::BADGE_TYPE:
            return 'g-person' ;
          case self::BADGE_LAYOUT:
            return 'portrait';
          case self::BADGE_THEME:
            return 'light';
          case self::BADGE_SHOW_COVER:
            return 'true';
          case self::SHOW_PHOTO:
            return 'true';
          case self::SHOW_OWNERS:
            return 'false';
          case self::SHOW_TAGLINE:
            return 'true';
          case self::BADGE_WIDTH:
            return 200 ;
          default : 
            return null;  
            
      }
    }

}
	

/*
	Omit PHP closing tag to help avoid accidental output
*/
