<?php

namespace Theme\Controllers;

use Themosis\Route\BaseController;
use Themosis\Facades\Route;
use Themosis\Facades\Asset;

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
            Asset::add('page', 'css/screen.min.css', false, '1.0', 'all');
            return view('pages', $dataPage);
        }

        else {
            $dataPage = array(
                'thumbnail' => $banner,
                'title' => $post->post_title,
                'content' => $post->post_content
                );
            Asset::add('page', 'css/screen.min.css', false, '1.0', 'all');
            return view('pages', $dataPage);
        }
    }
}
