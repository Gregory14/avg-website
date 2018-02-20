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
      // var_dump($ListPosts);
      // Find Sticky Post sinc PostsModel
      $sticky = PostsModel::getStkickyPost();
      var_dump($sticky);
      // Use only 1 sticky post on all
      $stickyData =
      [
        "ID" =>  $sticky[0]->ID,
        "date" => $sticky[0]->post_date,
        "imgHome" => get_the_post_thumbnail($sticky[0]->ID, 'themosis'),
        "title" => $sticky[0]->post_title,
        "resume" => $sticky[0]->post_excerpt,
        "link" =>  $sticky[0]->guid
      ];
          for ($i=0; $i < sizeof($ListPosts); $i++) {
            # code...
            $articleData[$i] = [
              'ID' => $ListPosts[$i]->ID,
      				'date' => $ListPosts[$i]->post_date,
              'img' => get_the_post_thumbnail($ListPosts[$i]->ID, 'themosis'),
      				'title' => $ListPosts[$i]->post_title,
      				'resume' => $ListPosts[$i]->post_excerpt,
      				'link' => $ListPosts[$i]->guid
              // 'auteur' => get_post_meta($ListPosts[$i]->ID, 'author', true),
            ];
          }

      return view('home', [
        'listArticle' => $articleData,
        'sticky' => $stickyData
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
