<?php

namespace Theme\Controllers;

use Themosis\Route\BaseController;
use Themosis\Facades\Route;
use Theme\Models;

class ArticleController extends BaseController
{

    public function index($post)
    {
        $gallery = get_post_meta($post->ID, 'photos', true);
        $article = [['actuTitle' => 'Mon titre 1', 'actuImg' => 'Mon image de l\'article 1'], ['actuTitle' => 'Mon titre 2', 'actuImg' => 'Mon image de l\'article 2']];

        if (!empty($gallery)) {
            # code...
            foreach ($gallery as $key) {
                # code...
                $img[$key] = [
                    'imgPath' => wp_get_attachment_image( $key, $size = 'thumbnail' )
                    ];
            }

            $dataArticle = array(
                'title' => $post->post_title, 
                'content' => $post->post_content,
                'gallery' => $img,
                'actualities' => $article
                );
            return view('article', $dataArticle);
            // echo $article;
        }

        else {
            $dataArticle = array(
                'title' => $post->post_title, 
                'content' => $post->post_content
                );
            return view('article', $dataArticle);
            // echo $article;
        }
    }
}
