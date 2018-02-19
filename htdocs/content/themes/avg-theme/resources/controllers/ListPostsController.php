<?php

namespace Theme\Controllers;

// use Theme\Models\Articles;
use Theme\Models\PostsModel;
use Themosis\Route\BaseController;
use Themosis\Facades\Route;
use \WP_Query;

class ListPostsController extends BaseController
{
    // public function pages($PageNumber)
    // {
    //
    // }

    public function index()
    {
      $id = (isset($id)) ? $id : 1 ;
      $ListPosts = PostsModel::all($id);
      $nbrPosts = PostsModel::getNbrPage();
      // var_dump('Calcule nbr post LISTE : '.$nbrPosts);

          for ($i=0; $i < sizeof($ListPosts); $i++) {
            # code...
            $articleData[$i] = [
              'ID' => $ListPosts[$i]->ID,
      				'date' => $ListPosts[$i]->post_date,
      				'title' => $ListPosts[$i]->post_title,
      				'resume' => $ListPosts[$i]->post_content,
      				'link' => $ListPosts[$i]->guid
            ];
          }

      return view('home', [
        'listArticle' => $articleData,
        // 'nbrpost' => $nbrPosts,
        // 'path' => WP_HOME,
        // 'currentPage' => $id,
      ]);
    }
}
