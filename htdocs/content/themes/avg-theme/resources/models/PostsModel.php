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
       $sticky = get_option( 'sticky_posts' );
         $dataArticles = new WP_query([
             'post_type'         => 'post',
             'posts_per_page'    => $PostPerPage,
             'post_status'       => 'publish',
             'order'             => 'DESC',
             'paged'             => $PageId,
             'post__not_in'      => $sticky,
             // 'meta_query'        => ['Infos' => ['key' => 'author']]
         ]);

         return $dataArticles->get_posts();
     }

     public static function getNbrPage(){
       $PostPerPage = get_option( 'posts_per_page' );
       return wp_count_posts('post')->publish/$PostPerPage;
     }

     public static function otherPosts()
     {
       //find ID current post
       $currentPost=get_the_ID();
       // Find all sticky post
       $sticky = get_option( 'sticky_posts' );
       // Mergd array for exclude Current post and Sticky post
       $exclude = array_merge([$sticky[0]],[$currentPost]);
       // Create object
       $otherPosts = new WP_query([
           'post_type'         => 'post',
           'posts_per_page'    => 3,
           'post_status'       => 'publish',
           'order'             => 'DESC',
           'post__not_in'      => $exclude,
       ]);

       return $otherPosts->get_posts();
     }

     public static function getStkickyPost()
     {
       $sticky = get_option( 'sticky_posts' );
       var_dump($sticky[0]);
         $dataArticles = new WP_query([
             'post_type'         => 'post',
             'posts_per_page'    => 1,
             'post_status'       => 'publish',
             'orderby'             => 'modified',
             'post__in'      => $sticky,
             'meta_query'        => ['Infos' => ['key' => 'author']]
         ]);

         return $dataArticles->get_posts();
     }

 }
