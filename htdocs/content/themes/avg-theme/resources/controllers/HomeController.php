<?php

namespace Theme\Controllers;

// use Theme\Models\Articles;
use Themosis\Facades\Asset;
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
      $paged = get_query_var('paged');
      // var_dump($ListPosts);
      // Find Sticky Post sinc PostsModel
      $sticky = PostsModel::getStkickyPost();
      // Use only 1 sticky post on all
      $stickyData =
      [
        "ID" =>  $sticky[0]->ID,
        "date" => $sticky[0]->post_date,
        "imgHome" => get_the_post_thumbnail_url($sticky[0]->ID, 'banner'),
        "title" => $sticky[0]->post_title,
        "resume" => $sticky[0]->post_excerpt,
        "link" =>  $sticky[0]->guid
      ];
          for ($i=0; $i < sizeof($ListPosts); $i++) {
            # code...
            $articleData[$i] = [
              'ID' => $ListPosts[$i]->ID,
      				'date' => $ListPosts[$i]->post_date,
              'img' => get_the_post_thumbnail_url($ListPosts[$i]->ID, 'themosis'),
      				'title' => $ListPosts[$i]->post_title,
      				'resume' => $ListPosts[$i]->post_excerpt,
      				'link' => $ListPosts[$i]->guid
              // 'auteur' => get_post_meta($ListPosts[$i]->ID, 'author', true),
            ];
          }

Asset::add('home', 'css/screen.min.css', false, '1.0', 'all');
// Asset::add('home', 'js/theme.min.js', ['jquery'], '1.0', true);
      return view('home', [
        'listArticle' => $articleData,
        'sticky' => $stickyData,
        'nbrpost' => $nbrPosts,
        'path' => WP_HOME,
        'currentPage' => $paged
      ]);
    }
}
