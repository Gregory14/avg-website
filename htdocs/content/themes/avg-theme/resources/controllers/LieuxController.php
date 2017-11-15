<?php

namespace Theme\Controllers;

use Themosis\Route\BaseController;
use Themosis\Facades\Route;

class LieuxController extends BaseController
{
    public function lieux($post, $query)
    {
    	// var_dump($post);
        $gymnase = get_post_meta(get_the_id(), 'gymnase', true);
        // $channels = Meta::get($post_id, 'channels');
        // var_dump($gymnase);
    	$dataLieux = array(
    		'title' => $post->post_title, 
    		'content' => $post->post_content,
            'gymnase' => $gymnase
    		);

		$lieux = view('lieu', $dataLieux);
		echo $lieux;
    }
}
