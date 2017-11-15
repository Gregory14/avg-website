<?php

namespace Theme\Controllers;

use Themosis\Route\BaseController;
use Themosis\Facades\Route;

class PageController extends BaseController
{
    public function index($post)
    {
        $gallery = get_post_meta($post->ID, 'photos', true);

        if (!empty($gallery)) {
            # code...
            foreach ($gallery as $key) {
                # code...
                $img[$key] = [
                    'imgPath' => wp_get_attachment_image( $key, $size = 'thumbnail' )
                    ];
            }

            $dataPage = array(
                'title' => $post->post_title, 
                'content' => $post->post_content,
                'gallery' => $img
                );
            $page = view('pages', $dataPage);
            echo $page;
        }

        else {
            $dataPage = array(
                'title' => $post->post_title, 
                'content' => $post->post_content
                );
            $page = view('pages', $dataPage);
            echo $page;
        }
    }
}
