<?php

    namespace Bedrock\Laa\CptSpinner;

    if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    class CustomPost {

        protected $textdomain;
        protected $posts;

        public function __construct( $textdomain ) {

            // Initialize text domain
            $this->textdomain = $textdomain;
            
            // Initialize the posts array
            $this->posts = array();

            add_action('init', array(&$this, 'register_custom_post'));

        }

        public function make($type, $args = array()) {

            // Define the default settings
            $defaults = array(
                'labels' => array(
                    'name' => __($args['plural_label'], $this->textdomain),
                    'singular_name' => __($args['singular_label'], $this->textdomain),
                    'add_new_item' => __('Add New '.$args['singular_label'], $this->textdomain),
                    'edit_item' => __('Edit '.$args['singular_label'], $this->textdomain),
                    'new_item' => __('New '.$args['singular_label'], $this->textdomain),
                    'view_item' => __('View '.$args['singular_label'], $this->textdomain),
                    'search_items' => __('Search '.$args['plural_label'], $this->textdomain),
                    'not_found' => __('No '.$args['plural_label'].' found', $this->textdomain),
                    'not_found_in_trash' => __('No '.$args['plural_label'].' found in trash', $this->textdomain),
                    'parent_item_colon' => __('Parent '.$args['singular_label'], $this->textdomain),
                    ),
                'public' => true,
                'has_archive' => ['has_archive'],
                'hierarchical' => ['hierarchical'],
                'menu_position'=> ['menu_position'],
                'menu_icon' => ['menu_icon'],
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail'
                    ),
                'rewrite' => array(
                    'slug' => sanitize_title_with_dashes($args['plural_label'])
                    )
                );
                
            // Override any settings provided by user and store the settings with the posts array
            $this->posts[$type] = array_merge($defaults, $args);
        }

        public function register_custom_post() {
            // Loop through the registered posts nd register all posts stored in the array
            foreach($this->posts as $key=>$value) {
                register_post_type($key, $value);
            }
        }

    };