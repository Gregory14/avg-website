<?php

namespace Theme\Controllers;

use Theme\Models\Articles;
use Themosis\Route\BaseController;
use Themosis\Facades\Route;

class HomeController extends BaseController
{
    public function index($post, $query, Articles $data)
    {
    	// $model = $model->query()->get();
        print_r($data);
    	// $listArticle = $query->posts;
    	// print_r($listArticle);

    	/*foreach ($listArticle as $key) {
    		# code...
    		$articleData = array(
    				'ID' => $key->ID,
    				'date' => $key->post_date,
    				'title' => $key->post_title,
    				'resume' => $key->post_excerpt,
    				'link' => $key->guid
    			);
            
    		print_r($articleData);
    		// return view('home', $listArticle);
    	}*/
        // return view('welcome');
    }
}
