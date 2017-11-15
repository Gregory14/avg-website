<?php

namespace Theme\Controllers;

use Themosis\Route\BaseController;
use Themosis\Facades\Route;


class TarifsController extends BaseController
{
    public function tarifs($post, $query)
    {
        // GET renouvellement data 
        $renouvellement = get_post_meta($post->ID, 'renouvellement', true);

        // GET new Prices data
        $newPrices = get_post_meta($post->ID, 'newPrices'); // Fonctionne -> Retourne un array
        $newPrices = $newPrices[0];

        // GET Prices data
        $prices = get_post_meta($post->ID, 'prices'); // Fonctionne -> Retourne un array
        $prices = $prices[0];


        $dataTarifs = array(
            'title' => $post->post_title, 
            'content' => $post->post_content,
            'newPrices' => $newPrices,
            'renouvellement' => $renouvellement,
            'prices' => $prices
            );

        $tarifs = view('tarifs', $dataTarifs);
        echo $tarifs;


        // récupérr l'object
        // print_r($post);

        // recuperer ID du post
        // print_r($post->ID);

        // Création objet 
        // $obj = Meta::get($post->ID, 'newPrices'); // Chercher dans le namespace Theme\Controller

        // $obj = themosis_get_the_query($post->ID, 'newPrices'); // Equivalent à -> $query

        // $obj = with($post)->get(); // Ne fonctionne pas 

        // $obj = get_post_meta($post->ID, 'newPrices'); // Fonctionne -> Retourne un array
        
        // print_r($post);

        // $obj = Meta::get($post->ID, 'newPrices'); // Chercher dans le namespace Theme\Controller
        // print_r($obj);

    }
}
