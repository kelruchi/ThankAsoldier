<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $table = 'posts';
    
    protected $fillable = 
    [
        'post_title',
        'post_body',
        'post_closing_text',
    ];
}