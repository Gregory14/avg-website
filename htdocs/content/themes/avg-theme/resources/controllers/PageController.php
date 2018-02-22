<?php

namespace Theme\Controllers;

use Themosis\Route\BaseController;
use Themosis\Facades\Route;

class PageController extends BaseController
{
    public function index($post)
    {
        $gallery = get_post_meta($post->ID, 'photos', true);

        // GET Thumbnail for Banner
        $banner = get_the_post_thumbnail($post->ID, 'banner');

        if (!empty($gallery)) {
            # code...
            foreach ($gallery as $key) {
                # code...
                $img[$key] = [
                    'imgPath' => wp_get_attachment_image( $key, $size = 'thumbnail' )
                    ];
            }

            $dataPage = array(
                'thumbnail' => $banner,
                'title' => $post->post_title,
                'content' => $post->post_content,
                'gallery' => $img
                );
            return view('pages', $dataPage);
        }

        else {
            $dataPage = array(
                'thumbnail' => $banner,
                'title' => $post->post_title,
                'content' => $post->post_content
                );
            return view('pages', $dataPage);
        }
    }
}
