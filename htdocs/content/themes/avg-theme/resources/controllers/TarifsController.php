<?php

namespace Theme\Controllers;

use Themosis\Route\BaseController;
use Themosis\Facades\Route;


class TarifsController extends BaseController
{
    public function tarifs($post)
    {
        // GET renouvellement data
        $renouvellement = get_post_meta($post->ID, 'renouvellement', true);

        // GET new Prices data
        $newPrices = get_post_meta($post->ID, 'newPrices'); // Fonctionne -> Retourne un array

        // GET Prices data
        $prices = get_post_meta($post->ID, 'prices'); // Fonctionne -> Retourne un array

        // GET Thumbnail for Banner
        $banner = get_the_post_thumbnail($post->ID, 'banner');

        $dataTarifs = array(
            'thumbnail' => $banner,
            'title' => $post->post_title,
            'content' => $post->post_content,
            'newPrices' => $newPrices[0],
            'renouvellement' => $renouvellement,
            'prices' => $prices[0]
            );

        return view('tarifs', $dataTarifs);
    }
}
