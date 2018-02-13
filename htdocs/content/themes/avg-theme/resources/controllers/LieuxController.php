<?php

namespace Theme\Controllers;

use Themosis\Route\BaseController;
use Themosis\Facades\Route;

class LieuxController extends BaseController
{
    public function lieux($post, $query)
    {
      $gymnase = get_post_meta(get_the_id(), 'gymnase', true);
    	$dataLieux = array(
    		'title' => $post->post_title,
    		'content' => $post->post_content,
            'gymnase' => $gymnase
    		);

		return view('lieu', $dataLieux);
    }
}
