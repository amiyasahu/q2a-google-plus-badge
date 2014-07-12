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
                    qa_opt('ami_show_gp_badge_header' ,    qa_post_text('ami_show_gp_badge_header'));
                    qa_opt('ami_gp_badge_costum_header' ,  qa_post_text('ami_gp_badge_costum_header'));
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
                 'ami_gp_badge_costum_header'          => 'ami_show_gp_badge_header' ,
            ));
			return array(
				'ok' => $saved ? qa_lang('gp_badge/settings_saved') : null,
				 
				'fields' => array(
                    'ami_show_gp_badge_header' => array(
                        'label' => qa_lang('gp_badge/ami_show_gp_badge_header'),
                        'tags'  => 'name="ami_show_gp_badge_header" id="ami_show_gp_badge_header"',
                        'value' => qa_opt('ami_show_gp_badge_header'),
                        'type'  => 'checkbox',
                    ),
                    'ami_gp_badge_costum_header' => array(
                         'id' => 'ami_gp_badge_costum_header' ,
                        'label' => qa_lang('gp_badge/ami_gp_badge_costum_header'),
                        'type'  => 'text',
                        'tags'  => 'name="ami_gp_badge_costum_header"',
                        'value' => qa_opt('ami_gp_badge_costum_header'),
                    ),
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
            $widget_opt    = qa_get_options(array('ami_show_gp_badge','ami_gp_badge_url','ami_gp_badge_type',
                                                  'ami_gp_badge_layout','ami_gp_badge_theme','ami_gp_badge_showcoverphoto','ami_gp_badge_showphoto',
                                                  'ami_gp_badge_show_owners','ami_gp_badge_showtagline','ami_gp_badge_width' , 'ami_gp_badge_costum_header' , 'ami_show_gp_badge_header'));
            $gp_url        = $widget_opt['ami_gp_badge_url'] ;  
            $show_gp_badge = $widget_opt['ami_show_gp_badge'] ;  
           
            if (empty($gp_url)) {
                  $has_error = true ;
                  $error_message = qa_lang('gp_badge/plz_provide_gp_url') ;
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
        // get the google plus badge settings 
        $href        =  $this->get_gp_settings($widget_opt , 'href') ;
        $class       =  $this->get_gp_settings($widget_opt , 'class') ; 
        $layout      =  $this->get_gp_settings($widget_opt , 'layout') ; 
        $showtagline =  $this->get_gp_settings($widget_opt , 'showtagline') ; 
        $width       =  $this->get_gp_settings($widget_opt , 'width') ; 
        $theme       =  $this->get_gp_settings($widget_opt , 'theme') ; 

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
        if (!!$widget_opt['ami_show_gp_badge_header']) {
          $widget_header = '<div class="gp-widget-header"><h3>'.$this->get_gp_settings($widget_opt , 'widget_header').'</h3></div>' ;
        }else {
              $widget_header = "" ;
        }
        
        $data_str = implode(' ', $data ) ;
        $gp_badge = '<div '.$data_str.'></div>'  ;

        ob_start();
            ?>
              <!--  widget start  -->
                  <?php echo $widget_header ;?>
                  <div class="gp-widget">
                    <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
                    <div class="google-plus clearfix">
                    <?php echo $gp_badge ;?>
                    </div>
                  </div>
                 
              <!--  widget ends  -->
            <?php

        return ob_get_clean();
    }
    function get_gp_settings($widget_opt , $opt )
    {
         $value = "" ;
          switch ($opt) {
               case 'class':
                      $value         = !empty($widget_opt['ami_gp_badge_type']) ? $widget_opt['ami_gp_badge_type'] : "" ;
                      $allowed_value = array('g-person' , 'g-page' , 'g-community'); /*allow only these values*/
                      if (!$value || !in_array($value , $allowed_value )) {
                            $value = "g-person" ;
                      }
                      break;
               case 'href':
                      $value = !empty($widget_opt['ami_gp_badge_url']) ? $widget_opt['ami_gp_badge_url'] : "" ;
                      break;
               case 'layout':
                      $value         = !empty($widget_opt['ami_gp_badge_layout']) ? $widget_opt['ami_gp_badge_layout'] : "" ;
                      $allowed_value = array('landscape' , 'portrait'); /*allow only these values*/
                      if (!$value || !in_array($value , $allowed_value )) {
                            $value = "portrait" ;
                      }
                      break;
               case 'showtagline':
                      $value         = !empty($widget_opt['ami_gp_badge_showtagline']) ? $widget_opt['ami_gp_badge_showtagline'] : "" ;
                      $allowed_value = array('true' , 'false'); /*allow only these values*/
                      if (!$value || !in_array($value , $allowed_value )) {
                            $value = "true" ;
                      }
                      break;
               case 'theme':
                      $value         = !empty($widget_opt['ami_gp_badge_theme']) ? $widget_opt['ami_gp_badge_theme'] : "" ;
                      $allowed_value = array('light' , 'dark'); /*allow only these values*/
                      if (!$value || !in_array($value , $allowed_value )) {
                            $value = "light" ;
                      }
                      break;
               case 'showphoto':
                      $value         = !empty($widget_opt['ami_gp_badge_showphoto']) ? $widget_opt['ami_gp_badge_showphoto'] : "" ;
                      $allowed_value = array('true' , 'false'); /*allow only these values*/
                      if (!$value || !in_array($value , $allowed_value )) {
                            $value = "true" ;
                      }
                      break;
               case 'showowners':
                      $value         = !empty($widget_opt['ami_gp_badge_show_owners']) ? $widget_opt['ami_gp_badge_show_owners'] : "" ;
                      $allowed_value = array('true' , 'false'); /*allow only these values*/
                      if (!$value || !in_array($value , $allowed_value )) {
                            $value = "false" ;
                      }
                      break;
               case 'show_coverphoto':
                      $value         = !empty($widget_opt['ami_gp_badge_showcoverphoto']) ? $widget_opt['ami_gp_badge_showcoverphoto'] : "" ;
                      $allowed_value = array('true' , 'false'); /*allow only these values*/
                      if (!$value || !in_array($value , $allowed_value )) {
                            $value = "true" ;
                      }
                      break;
               case 'width':
                      $value     = !empty($widget_opt['ami_gp_badge_width']) ? $widget_opt['ami_gp_badge_width'] : "" ;
                      $min_width = 180 ; /*allow only these values*/
                      if (!$value || $value < $min_width) {
                            $value = $min_width ;
                      }
                      break;
                 case 'widget_header':
                      $value     = !empty($widget_opt['ami_gp_badge_costum_header']) ? $widget_opt['ami_gp_badge_costum_header'] : qa_lang('gp_badge/ami_gp_badge_default_header') ;
                      break;

                default:
                      break;
          }
          return $value ;
    }

}
	

/*
	Omit PHP closing tag to help avoid accidental output
*/
