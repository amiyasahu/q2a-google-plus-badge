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

    class q2a_google_plus_badge_admin
    {
        /*added the options as constants to avoid multiple occurances */
        const SHOW_BADGE = 'ami_show_gp_badge';
        const GPLUS_URL = 'ami_gp_badge_url';
        const BADGE_TYPE = 'ami_gp_badge_type';
        const BADGE_LAYOUT = 'ami_gp_badge_layout';
        const BADGE_THEME = 'ami_gp_badge_theme';
        const BADGE_SHOW_COVER = 'ami_gp_badge_showcoverphoto';
        const SHOW_PHOTO = 'ami_gp_badge_showphoto';
        const SHOW_OWNERS = 'ami_gp_badge_show_owners';
        const SHOW_TAGLINE = 'ami_gp_badge_showtagline';
        const BADGE_WIDTH = 'ami_gp_badge_width';
        const SAVE_BUTTON = 'gp_badge_save_btn';

        function allow_template( $template )
        {
            return ( $template != 'admin' );
        }

        function allow_region( $region )
        {
            $allow = false;

            switch ( $region ) {
                case 'main':
                case 'side':
                case 'full':
                    $allow = true;
                    break;
            }

            return $allow;
        }


        function admin_form( &$qa_content )
        {
            $saved = false;

            if ( qa_clicked( self::SAVE_BUTTON ) ) {
                qa_opt( self::SHOW_BADGE, ! !qa_post_text( self::SHOW_BADGE ) );
                qa_opt( self::GPLUS_URL, qa_post_text( self::GPLUS_URL ) );
                qa_opt( self::BADGE_TYPE, qa_post_text( self::BADGE_TYPE ) );
                qa_opt( self::BADGE_LAYOUT, qa_post_text( self::BADGE_LAYOUT ) );
                qa_opt( self::BADGE_THEME, qa_post_text( self::BADGE_THEME ) );
                qa_opt( self::BADGE_SHOW_COVER, qa_post_text( self::BADGE_SHOW_COVER ) );
                qa_opt( self::SHOW_PHOTO, qa_post_text( self::SHOW_PHOTO ) );
                qa_opt( self::SHOW_OWNERS, qa_post_text( self::SHOW_OWNERS ) );
                qa_opt( self::SHOW_TAGLINE, qa_post_text( self::SHOW_TAGLINE ) );
                qa_opt( self::BADGE_WIDTH, qa_post_text( self::BADGE_WIDTH ) );
                $saved = true;
            }
            qa_set_display_rules( $qa_content, array(
                self::BADGE_TYPE       => self::SHOW_BADGE,
                self::BADGE_LAYOUT     => self::SHOW_BADGE,
                self::BADGE_THEME      => self::SHOW_BADGE,
                self::BADGE_SHOW_COVER => self::SHOW_BADGE,
                self::SHOW_PHOTO       => self::SHOW_BADGE,
                self::SHOW_OWNERS      => self::SHOW_BADGE,
                self::SHOW_TAGLINE     => self::SHOW_BADGE,
                self::BADGE_WIDTH      => self::SHOW_BADGE,
            ) );

            return array(
                'ok'      => $saved ? qa_lang( 'gp_badge/settings_saved' ) : null,

                'fields'  => array(
                    self::GPLUS_URL        => $this->get_gp_url_field(),
                    self::SHOW_BADGE       => $this->get_gp_show_field(),
                    self::BADGE_TYPE       => $this->get_gp_badge_type_field(),
                    self::BADGE_LAYOUT     => $this->get_gp_badge_layout_field(),
                    self::BADGE_THEME      => $this->get_gp_badge_theme_field(),
                    self::BADGE_SHOW_COVER => $this->get_gp_show_cover_field(),
                    self::SHOW_PHOTO       => $this->get_gp_show_photo_field(),
                    self::SHOW_OWNERS      => $this->get_gp_show_owner_field(),
                    self::SHOW_TAGLINE     => $this->get_gp_show_tag_line_field(),
                    self::BADGE_WIDTH      => $this->get_gp_badge_width_field(),
                ),
                'buttons' => $this->get_admin_buttons(),
            );
        }

        function option_default( $option )
        {

            switch ( $option ) {
                case self::SHOW_BADGE:
                    return 1;
                case self::GPLUS_URL:
                    return 'https://plus.google.com/u/0/+AmiyaSahu-WebDeveloper';
                case self::BADGE_TYPE:
                    return 'g-person';
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
                    return 200;
                default :
                    return null;

            }
        }

        /**
         * @return array
         */
        private function get_gp_url_field()
        {
            return array(
                'label' => qa_lang( 'gp_badge/ami_gp_badge_url_lable' ),
                'type'  => 'text',
                'tags'  => 'name="' . self::GPLUS_URL . '"',
                'value' => qa_opt( self::GPLUS_URL ),
            );
        }

        /**
         * @return array
         */
        private function get_gp_show_field()
        {
            return array(
                'label' => qa_lang( 'gp_badge/show_gp_badge' ),
                'tags'  => 'name="' . self::SHOW_BADGE . '" id="' . self::SHOW_BADGE . '"',
                'value' => qa_opt( self::SHOW_BADGE ),
                'type'  => 'checkbox',
            );
        }

        /**
         * @return array
         */
        private function get_gp_badge_type_field()
        {
            return array(
                'id'      => self::BADGE_TYPE,
                'label'   => qa_lang( 'gp_badge/ami_gp_badge_type_lable' ),
                'type'    => 'select',
                'tags'    => 'name="' . self::BADGE_TYPE . '"',
                'value'   => qa_opt( self::BADGE_TYPE ),
                'options' => array(
                    'g-person'    => 'g-person',
                    'g-page'      => 'g-page',
                    'g-community' => 'g-community',
                ),
            );
        }

        /**
         * @return array
         */
        private function get_gp_badge_layout_field()
        {
            return array(
                'id'      => self::BADGE_LAYOUT,
                'label'   => qa_lang( 'gp_badge/layout_label' ),
                'type'    => 'select',
                'tags'    => 'name="' . self::BADGE_LAYOUT . '"',
                'value'   => qa_opt( self::BADGE_LAYOUT ),
                'options' => array(
                    'portrait'  => 'portrait',
                    'landscape' => 'landscape',
                ),
            );
        }

        /**
         * @return array
         */
        private function get_gp_badge_theme_field()
        {
            return array(
                'id'      => self::BADGE_THEME,
                'label'   => qa_lang( 'gp_badge/theme_label' ),
                'type'    => 'select',
                'tags'    => 'name="' . self::BADGE_THEME . '"',
                'value'   => qa_opt( self::BADGE_THEME ),
                'options' => array(
                    'light' => 'light',
                    'dark'  => 'dark',
                ),
            );
        }

        /**
         * @return array
         */
        private function get_gp_show_cover_field()
        {
            return array(
                'id'      => self::BADGE_SHOW_COVER,
                'label'   => qa_lang( 'gp_badge/ami_gp_showcoverphoto_label' ),
                'type'    => 'select',
                'tags'    => 'name="' . self::BADGE_SHOW_COVER . '"',
                'value'   => qa_opt( self::BADGE_SHOW_COVER ),
                'options' => array(
                    'true'  => 'true',
                    'false' => 'false',
                ),
            );
        }

        /**
         * @return array
         */
        private function get_gp_show_photo_field()
        {
            return array(
                'id'      => self::SHOW_PHOTO,
                'label'   => qa_lang( 'gp_badge/ami_gp_showphoto_label' ),
                'type'    => 'select',
                'tags'    => 'name="' . self::SHOW_PHOTO . '"',
                'value'   => qa_opt( self::SHOW_PHOTO ),
                'options' => array(
                    'true'  => 'true',
                    'false' => 'false',
                ),
            );
        }

        /**
         * @return array
         */
        private function get_gp_show_owner_field()
        {
            return array(
                'id'      => self::SHOW_OWNERS,
                'label'   => qa_lang( 'gp_badge/ami_gp_show_owners_label' ),
                'type'    => 'select',
                'tags'    => 'name="' . self::SHOW_OWNERS . '"',
                'value'   => qa_opt( self::SHOW_OWNERS ),
                'options' => array(
                    'true'  => 'true',
                    'false' => 'false',
                ),
            );
        }

        /**
         * @return array
         */
        private function get_gp_show_tag_line_field()
        {
            return array(
                'id'      => self::SHOW_TAGLINE,
                'label'   => qa_lang( 'gp_badge/showtagline_label' ),
                'type'    => 'select',
                'tags'    => 'name="' . self::SHOW_TAGLINE . '"',
                'value'   => qa_opt( self::SHOW_TAGLINE ),
                'options' => array(
                    'true'  => 'true',
                    'false' => 'false',
                ),
            );
        }

        /**
         * @return array
         */
        private function get_gp_badge_width_field()
        {
            return array(
                'id'    => self::BADGE_WIDTH,
                'label' => qa_lang( 'gp_badge/ami_gp_badge_width_label' ),
                'type'  => 'text',
                'tags'  => 'name="' . self::BADGE_WIDTH . '"',
                'value' => qa_opt( self::BADGE_WIDTH ),
            );
        }

        /**
         * @return array
         */
        private function get_admin_buttons()
        {
            return array(
                array(
                    'label' => qa_lang( 'gp_badge/save_changes' ),
                    'tags'  => 'name="' . self::SAVE_BUTTON . '"',
                ),
            );
        }

    }


    /*
        Omit PHP closing tag to help avoid accidental output
    */
