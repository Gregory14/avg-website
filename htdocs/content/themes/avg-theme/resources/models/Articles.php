<?php

namespace Theme\Models;
use Themosis\Route\HomeController;

/**
 * Class Articles.
 * Help you retrieve data from your $prefix_posts table.
 *
 * @package Theme\Models
 */
class Articles

{
    public function getPosts()
    {
      $listArticle = get_posts([
        'posts_per_page' => 3,
        'order' => 'DESC',
        'post_status' => 'publish'
      ]);
        return $listArticle;
    }

    // public function numberPostsPublish()
    // {
    //   // Count all post in all status
    //   $count_posts = wp_count_posts();
    //
    //   // Count only posts published
    //   $listAllArticlePupblished =  $count_posts->publish;
    //
    //   return $listAllArticlePupblished;
    // }
}
