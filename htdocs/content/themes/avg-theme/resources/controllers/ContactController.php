<?php

namespace Theme\Controllers;

use Themosis\Route\BaseController;
use Themosis\Facades\Route;

class ContactController extends BaseController
{
    public function contact($post)
    {
      // GET Thumbnail for Banner
      $banner = get_the_post_thumbnail($post->ID, 'banner');

    	$dataContact = array(
        'thumbnail' => $banner,
    		'title' => $post->post_title,
    		'content' => $post->post_content
    		);

		$contact = view('contact', $dataContact);
		return $contact;
    }
}
