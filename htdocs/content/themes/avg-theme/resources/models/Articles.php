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
        // return "Coucou";
        return $listArticle;
        // $query = new WP_Query([
        //     'post_type' => 'post',
        //     'posts_per_page' => -1,
        //     'post_status' => 'publish'
        // ]);
        //
        // return $query->get_posts();
        //
        // // $data = get_posts("post");
        // // // $data = ["coucou", "c\'est moi", "welcome"];
        // //
        // // return $data;
    }
}
