<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = 'post_category';

// public function get_posts()
// {
//     return $this->belongsTo('App\Post', 'post_id' ,'id');
// }

// public function get_category()
// {
//     return $this->belongsTo('App\Category', 'category_id', 'id');
// }

}
