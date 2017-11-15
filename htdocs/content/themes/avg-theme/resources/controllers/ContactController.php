<?php

namespace Theme\Controllers;

use Themosis\Route\BaseController;
use Themosis\Facades\Route;

class ContactController extends BaseController
{
    public function contact($post)
    {
    	//var_dump($post);
    	$dataContact = array(
    		'title' => $post->post_title, 
    		'content' => $post->post_content
    		);

		$contact = view('contact', $dataContact);
		echo $contact;
    }
}
