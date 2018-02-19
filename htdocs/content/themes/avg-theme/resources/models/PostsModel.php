<?php

namespace Theme\Models;
use Themosis\Route\HomeController;
// use  wp-includes\class-wp-query.php
use \WP_Query;

/**
 * Class Articles.
 * Help you retrieve data from your $prefix_posts table.
 *
 * @package Theme\Models
 */
 class PostsModel
 {
     /**
      * Return a list of all published posts.
      *
      * @return array
      */
      public $dataArticles;
     public static function all($PageId)
     {
       $PostPerPage = get_option( 'posts_per_page' );
       // $PageId = ( isset($PageId) ) ? $PageId : 1 ;
       $PageId = (get_query_var('paged')) ? get_query_var('paged') : 1;
       // var_dump('Ma page est : '.$PageId);
         $dataArticles = new WP_query([
             'post_type'         => 'post',
             'posts_per_page'    => $PostPerPage,
             'post_status'       => 'publish',
             'order'             => 'DESC',
             'paged'             => $PageId
         ]);

         return $dataArticles->get_posts();
     }

     public static function getNbrPage(){
       $PostPerPage = get_option( 'posts_per_page' );
       return wp_count_posts('post')->publish/$PostPerPage;
     }

 }
