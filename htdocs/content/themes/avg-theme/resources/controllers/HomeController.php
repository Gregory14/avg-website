<?php

namespace Theme\Controllers;

use Theme\Models\Articles;
use Themosis\Route\BaseController;
use Themosis\Facades\Route;

class HomeController extends BaseController
{
    public function index (Articles $listArticle)
    {
      $listArticle = $listArticle->getPosts();
      for ($i=0; $i < sizeof($listArticle); $i++) {
        # code...
        $articleData[$i] = [
          'ID' => $listArticle[$i]->ID,
  				'date' => $listArticle[$i]->post_date,
  				'title' => $listArticle[$i]->post_title,
  				'resume' => $listArticle[$i]->post_content,
  				'link' => $listArticle[$i]->guid
        ];
      }
      $listArticle = [ 'listArticle' => $articleData];
      return view('home', $listArticle);
    }
}
