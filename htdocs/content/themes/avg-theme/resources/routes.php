<?php

/**
 * Define your routes and which views to display
 * depending of the query.
 *
 * Based on WordPress conditional tags from the WordPress Codex
 * http://codex.wordpress.org/Conditional_Tags
 *
 */

// Route::get('home', function()
// {
//     return view('welcome');
// });

// Route::get('paged', 'HomeController@pages');
// Route::get('page/{id}/', 'ListPostsController@index');
Route::get('paged','ListPostsController@index');
// Route::match(['GET', 'POST'], 'coucou/{id}', function(){return 'test.id';});
// Route::get('page/{id}', 'HomeController@pages');

Route::get('home', 'HomeController@index');

// Using the simple model representation.
// Route callback can auto instantiate classes as well.
// Route::get('home', function (Post $model) {
//     return view('home', [
//         'posts' => $model->all()
//     ]);
// });

Route::match(['GET', 'POST'] ,'template', ['contact', 'uses' => 'ContactController@contact']);

Route::match(['GET', 'POST'], 'template', ['lieux', 'uses' =>'LieuxController@lieux']);

Route::match(['GET', 'POST'], 'template', ['tarifs', 'uses' =>'TarifsController@tarifs']);

Route::match(['GET', 'POST'], 'page', 'PageController@index');

Route::match(['GET', 'POST'], 'single', 'ArticleController@index');

Route::get('404', function(){return 'Page not found';});
