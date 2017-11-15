<?php

namespace Theme\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Articles.
 * Help you retrieve data from your $prefix_posts table.
 *
 * @package Theme\Models
 */
// class Articles extends Model
class Articles 

{
    public function all()
    {
        $query = new WP_Query([
            'post_type' => 'post',
            'posts_per_page' => -1,
            'post_status' => 'publish'
        ]);
        
        return $query->get_posts();
    }
}
