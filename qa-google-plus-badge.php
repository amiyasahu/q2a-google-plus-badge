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

		function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
		{
          require_once AMI_GOOGLE_PLUS_DIR.'/qa-google-plus-badge-admin.php';
          $has_error     = false ; 
          $error_message = "" ;
          $widget_opt    = qa_get_options(array(q2a_google_plus_badge_admin::SHOW_BADGE,q2a_google_plus_badge_admin::GPLUS_URL,q2a_google_plus_badge_admin::BADGE_TYPE,q2a_google_plus_badge_admin::BADGE_LAYOUT,q2a_google_plus_badge_admin::BADGE_THEME,q2a_google_plus_badge_admin::BADGE_SHOW_COVER,q2a_google_plus_badge_admin::SHOW_PHOTO,q2a_google_plus_badge_admin::SHOW_OWNERS,q2a_google_plus_badge_admin::SHOW_TAGLINE,q2a_google_plus_badge_admin::BADGE_WIDTH));
          $gp_url        = $widget_opt[q2a_google_plus_badge_admin::GPLUS_URL] ;  
          $show_gp_badge = $widget_opt[q2a_google_plus_badge_admin::SHOW_BADGE] ;  
         
          if (empty($gp_url)) {
                $has_error = true ;
                $error_message = qa_lang('gp_badge/plz_provide_gp_url') ;
          }

          if (!$has_error) {
              if (!!$show_gp_badge) {
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
               $showphoto          =  $widget_opt[q2a_google_plus_badge_admin::SHOW_PHOTO] ; 
               $data['showphoto']  = 'data-showphoto="'.$showphoto.'"' ;
               $showowners         =  $widget_opt[q2a_google_plus_badge_admin::SHOW_OWNERS] ; 
               $data['showowners'] = 'data-showowners="'.$showowners.'"' ;
        }else { 

               $show_coverphoto         =  $widget_opt[q2a_google_plus_badge_admin::BADGE_SHOW_COVER] ; 
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

    function get_gp_settings($widget_opt , $opt )
    {
        $value = "" ;
        switch ($opt) {
             case 'class':
                    $value         = !empty($widget_opt[q2a_google_plus_badge_admin::BADGE_TYPE]) ? $widget_opt[q2a_google_plus_badge_admin::BADGE_TYPE] : "" ;
                    $allowed_value = array('g-person' , 'g-page' , 'g-community'); /*allow only these values*/
                    if (!$value || !in_array($value , $allowed_value )) {
                          $value = "g-person" ;
                    }
                    break;
             case 'href':
                    $value = !empty($widget_opt[q2a_google_plus_badge_admin::GPLUS_URL]) ? $widget_opt[q2a_google_plus_badge_admin::GPLUS_URL] : "" ;
                    break;
             case 'layout':
                    $value         = !empty($widget_opt[q2a_google_plus_badge_admin::BADGE_LAYOUT]) ? $widget_opt[q2a_google_plus_badge_admin::BADGE_LAYOUT] : "" ;
                    $allowed_value = array('landscape' , 'portrait'); /*allow only these values*/
                    if (!$value || !in_array($value , $allowed_value )) {
                          $value = "portrait" ;
                    }
                    break;
             case 'showtagline':
                    $value         = !empty($widget_opt[q2a_google_plus_badge_admin::SHOW_TAGLINE]) ? $widget_opt[q2a_google_plus_badge_admin::SHOW_TAGLINE] : "" ;
                    $allowed_value = array('true' , 'false'); /*allow only these values*/
                    if (!$value || !in_array($value , $allowed_value )) {
                          $value = "true" ;
                    }
                    break;
             case 'theme':
                    $value         = !empty($widget_opt[q2a_google_plus_badge_admin::BADGE_THEME]) ? $widget_opt[q2a_google_plus_badge_admin::BADGE_THEME] : "" ;
                    $allowed_value = array('light' , 'dark'); /*allow only these values*/
                    if (!$value || !in_array($value , $allowed_value )) {
                          $value = "light" ;
                    }
                    break;
             case 'showphoto':
                    $value         = !empty($widget_opt[q2a_google_plus_badge_admin::SHOW_PHOTO]) ? $widget_opt[q2a_google_plus_badge_admin::SHOW_PHOTO] : "" ;
                    $allowed_value = array('true' , 'false'); /*allow only these values*/
                    if (!$value || !in_array($value , $allowed_value )) {
                          $value = "true" ;
                    }
                    break;
             case 'showowners':
                    $value         = !empty($widget_opt[q2a_google_plus_badge_admin::SHOW_OWNERS]) ? $widget_opt[q2a_google_plus_badge_admin::SHOW_OWNERS] : "" ;
                    $allowed_value = array('true' , 'false'); /*allow only these values*/
                    if (!$value || !in_array($value , $allowed_value )) {
                          $value = "false" ;
                    }
                    break;
             case 'show_coverphoto':
                    $value         = !empty($widget_opt[q2a_google_plus_badge_admin::BADGE_SHOW_COVER]) ? $widget_opt[q2a_google_plus_badge_admin::BADGE_SHOW_COVER] : "" ;
                    $allowed_value = array('true' , 'false'); /*allow only these values*/
                    if (!$value || !in_array($value , $allowed_value )) {
                          $value = "true" ;
                    }
                    break;
             case 'width':
                    $value     = !empty($widget_opt[q2a_google_plus_badge_admin::BADGE_WIDTH]) ? $widget_opt[q2a_google_plus_badge_admin::BADGE_WIDTH] : "" ;
                    $min_width = 180 ; /*allow only these values*/
                    if (!$value || $value < $min_width) {
                          $value = $min_width ;
                    }
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
