<?php

namespace Theme\Controllers;

use Theme\Models\PostsModel;
use Themosis\Route\BaseController;
use Themosis\Facades\Route;
use Theme\Models;

class ArticleController extends BaseController
{

    public function index($post)
    {
        $gallery = get_post_meta($post->ID, 'photos', true);
        $article = PostsModel::otherPosts();
        for ($i=0; $i < sizeof($article); $i++) {
          # code...
          $article[$i] = [
            'ID' => $article[$i]->ID,
            'date' => $article[$i]->post_date,
            'img' => get_the_post_thumbnail($article[$i]->ID, 'medium'),
            'title' => $article[$i]->post_title,
            'resume' => $article[$i]->post_excerpt,
            'link' => $article[$i]->guid
          ];
        }
        if (!empty($gallery)) {
            # code...
            foreach ($gallery as $key) {
                # code...
                $img[$key] = [
                    'imgPath' => wp_get_attachment_image( $key, $size = 'thumbnail' )
                    ];
            }

            $dataArticle = array(
                'thumbnail' => get_the_post_thumbnail($post, 'medium'),
                'title' => $post->post_title,
                'content' => $post->post_content,
                'gallery' => $img,
                'actualities' => $article
                );
            return view('article', $dataArticle);
        }

        else {
            $dataArticle = array(
                'thumbnail' => get_the_post_thumbnail($post, 'medium'),
                'title' => $post->post_title,
                'content' => $post->post_content,
                'actualities' => $article
                );
            return view('article', $dataArticle);
        }
    }
}
