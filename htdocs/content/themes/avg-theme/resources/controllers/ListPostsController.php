<?php

namespace Theme\Controllers;

// use Theme\Models\Articles;
use Themosis\Facades\Asset;
use Theme\Models\PostsModel;
use Themosis\Route\BaseController;
use Themosis\Facades\Route;
use \WP_Query;

class ListPostsController extends BaseController
{

    public function index()
    {
      $id = (isset($id)) ? $id : 1 ;
      $ListPosts = PostsModel::all($id);
      $nbrPosts = PostsModel::getNbrPage();
      $paged = get_query_var('paged');
      // var_dump('Calcule nbr post LISTE : '.$nbrPosts);

          for ($i=0; $i < sizeof($ListPosts); $i++) {
            # code...
            $articleData[$i] = [
              'ID' => $ListPosts[$i]->ID,
      				'date' => $ListPosts[$i]->post_date,
              'img' => get_the_post_thumbnail_url($ListPosts[$i]->ID, 'themosis'),
      				'title' => $ListPosts[$i]->post_title,
      				'resume' => $ListPosts[$i]->post_excerpt,
      				'link' => $ListPosts[$i]->guid
              // 'auteur' => get_post_meta(74, 'author')
            ];
          }
Asset::add('home', 'css/page_articles.min.css', false, '1.0', 'all');
      return view('home', [
        'listArticle' => $articleData,
        'nbrpost' => $nbrPosts,
        'path' => WP_HOME,
        'currentPage' => $paged
      ]);
    }
}
