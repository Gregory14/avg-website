<?php

namespace Theme\Controllers;

use Themosis\Route\BaseController;
use Themosis\Facades\Route;

class LieuxController extends BaseController
{
    public function lieux($post, $query)
    {
      $gymnase = get_post_meta($post->ID, 'gymnase', true);
      // GET Thumbnail for Banner
      $banner = get_the_post_thumbnail($post->ID, 'banner');

    	$dataLieux = array(
        'thumbnail' => $banner,
    		'title' => $post->post_title,
    		'content' => $post->post_content,
        'gymnase' => $gymnase
    		);

		return view('lieu', $dataLieux);
    }
}
