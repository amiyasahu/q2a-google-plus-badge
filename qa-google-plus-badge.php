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

	class q2a_google_plus_badge {
		
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
			
			if (qa_clicked('gp_badge_save_btn')) {	
                    qa_opt('ami_show_gp_badge' ,           qa_post_text('ami_show_gp_badge'));
                    qa_opt('ami_gp_badge_url' ,            qa_post_text('ami_gp_badge_url'));
                    qa_opt('ami_gp_badge_type' ,           qa_post_text('ami_gp_badge_type'));
                    qa_opt('ami_gp_badge_layout' ,         qa_post_text('ami_gp_badge_layout'));
                    qa_opt('ami_gp_badge_theme' ,          qa_post_text('ami_gp_badge_theme'));
                    qa_opt('ami_gp_badge_showcoverphoto' , qa_post_text('ami_gp_badge_showcoverphoto'));
                    qa_opt('ami_gp_badge_showphoto' ,      qa_post_text('ami_gp_badge_showphoto'));
                    qa_opt('ami_gp_badge_show_owners' ,    qa_post_text('ami_gp_badge_show_owners'));
                    qa_opt('ami_gp_badge_showtagline' ,    qa_post_text('ami_gp_badge_showtagline'));
                    qa_opt('ami_gp_badge_width' ,          qa_post_text('ami_gp_badge_width'));
        			$saved=true;
			}
			qa_set_display_rules($qa_content, array(
                 'ami_gp_badge_type'           => 'ami_show_gp_badge' ,
                 'ami_gp_badge_layout'         => 'ami_show_gp_badge' ,
                 'ami_gp_badge_theme'          => 'ami_show_gp_badge' ,
                 'ami_gp_badge_showcoverphoto' => 'ami_show_gp_badge' ,
                 'ami_gp_badge_showphoto'      => 'ami_show_gp_badge' ,
                 'ami_gp_badge_show_owners'    => 'ami_show_gp_badge' ,
                 'ami_gp_badge_showtagline'    => 'ami_show_gp_badge' ,
                 'ami_gp_badge_width'          => 'ami_show_gp_badge' ,
            ));
			return array(
				'ok' => $saved ? qa_lang('gp_badge/settings_saved') : null,
				
				'fields' => array(
                    'ami_gp_badge_url' => array(
                                    'label' => qa_lang('gp_badge/ami_gp_badge_url_lable'),
                                    'type'  => 'text',
                                    'tags'  => 'name="ami_gp_badge_url"',
                                    'value' => qa_opt('ami_gp_badge_url'),
                    ),
                    'ami_show_gp_badge' => array(
                                    'label' => qa_lang('gp_badge/show_gp_badge'),
                                    'tags'  => 'name="ami_show_gp_badge" id="ami_show_gp_badge"',
                                    'value' => qa_opt('ami_show_gp_badge'),
                                    'type'  => 'checkbox',
                    ),
                    'ami_gp_badge_type' => array(
                                    'id' => 'ami_gp_badge_type' ,
                                    'label' => qa_lang('gp_badge/ami_gp_badge_type_lable'),
                                    'type'  => 'select',
                                    'tags'  => 'name="ami_gp_badge_type"',
                                    'value' => qa_opt('ami_gp_badge_type'),
                                    'options' => array(
                                          'g-person'    => 'g-person' ,
                                          'g-page'      => 'g-page' ,
                                          'g-community' => 'g-community' ,
                                    ),
                    ),

                    'ami_gp_badge_layout' => array(
                                    'id' => 'ami_gp_badge_layout' ,
                                    'label' => qa_lang('gp_badge/layout_label'),
                                    'type'  => 'select',
                                    'tags'  => 'name="ami_gp_badge_layout"',
                                    'value' => qa_opt('ami_gp_badge_layout'),
                                    'options' => array(
                                          'portrait'  =>'portrait' ,
                                          'landscape' =>'landscape' ,
                                    ),
                    ),
                    'ami_gp_badge_theme' => array(
                                    'id' => 'ami_gp_badge_theme' ,
                                    'label' => qa_lang('gp_badge/theme_label'),
                                    'type'  => 'select',
                                    'tags'  => 'name="ami_gp_badge_theme"',
                                    'value' => qa_opt('ami_gp_badge_theme'),
                                    'options' => array(
                                          'light' =>'light' ,
                                          'dark'  =>'dark' ,
                                    ),
                    ),

                   'ami_gp_badge_showcoverphoto' => array(
                                'id' => 'ami_gp_badge_showcoverphoto' ,
                                    'label' => qa_lang('gp_badge/ami_gp_showcoverphoto_label'),
                                    'type'  => 'select',
                                    'tags'  => 'name="ami_gp_badge_showcoverphoto"',
                                    'value' => qa_opt('ami_gp_badge_showcoverphoto'),
                                    'options' => array(
                                          'true'  => 'true' ,
                                          'false' => 'false' ,
                                    ),
                    ),
                   'ami_gp_badge_showphoto' => array(
                                'id' => 'ami_gp_badge_showphoto' ,
                                    'label' => qa_lang('gp_badge/ami_gp_showphoto_label'),
                                    'type'  => 'select',
                                    'tags'  => 'name="ami_gp_badge_showphoto"',
                                    'value' => qa_opt('ami_gp_badge_showphoto'),
                                    'options' => array(
                                          'true'  => 'true' ,
                                          'false' => 'false' ,
                                    ),
                    ),

                  'ami_gp_badge_show_owners' => array(
                                'id' => 'ami_gp_badge_show_owners' ,
                                    'label' => qa_lang('gp_badge/ami_gp_show_owners_label'),
                                    'type'  => 'select',
                                    'tags'  => 'name="ami_gp_badge_show_owners"',
                                    'value' => qa_opt('ami_gp_badge_show_owners'),
                                    'options' => array(
                                          'true'  => 'true' ,
                                          'false' => 'false' ,
                                    ),
                    ),

                   'ami_gp_badge_showtagline' => array(
                                'id' => 'ami_gp_badge_showtagline' ,
                                    'label' => qa_lang('gp_badge/showtagline_label'),
                                    'type'  => 'select',
                                    'tags'  => 'name="ami_gp_badge_showtagline"',
                                    'value' => qa_opt('ami_gp_badge_showtagline'),
                                    'options' => array(
                                           'true'  => 'true' ,
                                           'false' => 'false' ,
                                    ),
                    ),
                    
                   'ami_gp_badge_width' => array(
                                'id' => 'ami_gp_badge_width' ,
                        'label' => qa_lang('gp_badge/ami_gp_badge_width_label'),
                        'type'  => 'text',
                        'tags'  => 'name="ami_gp_badge_width"',
                        'value' => qa_opt('ami_gp_badge_width'),
                    ),

                ),
				
				'buttons' => array(
      					array(
      						'label' => 'Save Changes',
      						'tags' => 'name="gp_badge_save_btn"',
      					),
				 ),
			);
		}


		function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
		{
            $has_error     = false ; 
            $error_message = "" ;
            $widget_opt    = qa_get_options(array('ami_show_gp_badge','ami_gp_badge_url','ami_gp_badge_type','ami_gp_badge_layout','ami_gp_badge_theme','ami_gp_badge_showcoverphoto','ami_gp_badge_showphoto','ami_gp_badge_show_owners','ami_gp_badge_showtagline','ami_gp_badge_width'));
            
            $gp_url            = $widget_opt['ami_gp_badge_url'] ;  
            $show_gp_badge       = $widget_opt['ami_show_gp_badge'] ;  
           
            if (empty($gp_url)) {
                  $has_error = true ;
                  $error_message = qa_lang('gp_badge/plz_provide_fb_url') ;
            }

            if (!$has_error) {
                if ($show_gp_badge) {
                   $themeobject->output($this->get_google_plus_badge($widget_opt));
                }
                
            } else {
               $themeobject->output('<div class="qa-sidebar error" style="color:red;">'.$error_message.'</div>');
            }
            
		}
    function get_google_plus_badge($widget_opt)
    {
        // get the facebook like box settings 
        $href            = $widget_opt['ami_gp_badge_url'] ;  
        $class       =  $widget_opt['ami_gp_badge_type'] ; 
        $layout      =  $widget_opt['ami_gp_badge_layout'] ; 
        $showtagline =  $widget_opt['ami_gp_badge_showtagline'] ; 
        $width       =  $widget_opt['ami_gp_badge_width'] ; 
        $theme       =  $widget_opt['ami_gp_badge_theme'] ; 

        $data['class']       = 'class="'.$class.'"' ;
        $data['href']        = 'data-href="'.$href.'"' ;
        $data['layout']      = 'data-layout="'.$layout.'"' ;
        $data['showtagline'] = 'data-showtagline="'.$showtagline.'"' ;
        $data['width']       = 'data-width="'.$width.'"' ;
        $data['theme']       = 'data-theme="'.$theme.'"' ;
        if ($class=="g-community") {
               $showphoto          =  $widget_opt['ami_gp_badge_showphoto'] ; 
               $data['showphoto']  = 'data-showphoto="'.$showphoto.'"' ;
               $showowners         =  $widget_opt['ami_gp_badge_show_owners'] ; 
               $data['showowners'] = 'data-showowners="'.$showowners.'"' ;
        }else { 

               $show_coverphoto         =  $widget_opt['ami_gp_badge_showcoverphoto'] ; 
               $data['show_coverphoto'] = 'data-showcoverphoto="'.$show_coverphoto.'"' ;
        }

        if ($class = 'g-person') {
              $data['rel'] = 'data-rel="author"' ;
        }

        $data_str = implode(' ', $data ) ;
        $gp_badge = '<div '.$data_str.'></div>'  ;

        ob_start();
            ?>
              <!--  widget start  -->
                 <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
                    <div class="google-plus clearfix">
                    <?php echo $gp_badge ;?>
                    </div>
              <!--  widget ends  -->
            <?php

        return ob_get_clean();
    }

}
	

/*
	Omit PHP closing tag to help avoid accidental output
*/
