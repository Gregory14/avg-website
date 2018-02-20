<?php

namespace Theme\Controllers;

// use Theme\Models\Articles;
use Theme\Models\PostsModel;
use Themosis\Route\BaseController;
use Themosis\Facades\Route;
use \WP_Query;

class HomeController extends BaseController
{
    public function index()
    {
      $id = (isset($id)) ? $id : 1 ;
      $ListPosts = PostsModel::all($id);
      $nbrPosts = PostsModel::getNbrPage();

          for ($i=0; $i < sizeof($ListPosts); $i++) {
            # code...
            $articleData[$i] = [
              'ID' => $ListPosts[$i]->ID,
      				'date' => $ListPosts[$i]->post_date,
              'img' => get_the_post_thumbnail($ListPosts[$i]->ID, 'medium'),
      				'title' => $ListPosts[$i]->post_title,
      				'resume' => $ListPosts[$i]->post_excerpt,
      				'link' => $ListPosts[$i]->guid
              // 'auteur' => get_post_meta($ListPosts[$i]->ID, 'author', true),
            ];
          }

      return view('home', [
        'listArticle' => $articleData,
        // 'nbrpost' => $nbrPosts,
        // 'path' => WP_HOME,
        // 'currentPage' => $id,
      ]);
    }

  // public function pages()
  // {
  //   $ListPosts = PostsModel::all();
  //   $nbrPosts = PostsModel::countPostPublish();
  //
  //       for ($i=0; $i < sizeof($ListPosts); $i++) {
  //         # code...
  //         $articleData[$i] = [
  //           'ID' => $ListPosts[$i]->ID,
  //           'date' => $ListPosts[$i]->post_date,
  //           'title' => $ListPosts[$i]->post_title,
  //           'resume' => $ListPosts[$i]->post_content,
  //           'link' => $ListPosts[$i]->guid
  //         ];
  //       }
  //
  //   return view('home', [
  //     'listArticle' => $articleData,
  //     'nbrpost' => $nbrPosts,
  //     'nextPage' => 'next_posts_link()',
  //     'previousPage' => 'previous_posts_link()'
  //   ]);
  // }
}
