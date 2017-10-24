<?php

/**
 * Create Custom Post object
 */

use Bedrock\Laa\CptSpinner\CustomPost;

/**
 * Create Event
 */
$custom_post = new CustomPost('laa');
$args = array(
    'type' => 'event',
    'singular_label' => 'Event',
    'plural_label' => 'Events',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position'=> 20,
    'menu_icon' => 'dashicons-megaphone',
    'rewrite' => array(
        'slug' => NULL,
        'with_front' => false
      ),
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'revisions'
      ),
        'taxonomies' => array(
        NULL
      )
);
$custom_post->make($args['type'], $args);

/**
 * Create News
 */
$custom_post = new CustomPost('laa');
$args = array(
    'type' => 'news',
    'singular_label' => 'News',
    'plural_label' => 'News',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position'=> 20,
    'menu_icon' =>  'dashicons-images-alt2',
    'rewrite' => array(
        'slug' => NULL,
        'with_front' => false
      ),
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'revisions'
      ),
        'taxonomies' => array(
        NULL
      )
);
$custom_post->make($args['type'], $args);