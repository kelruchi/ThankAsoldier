<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $table = 'posts';
    
    protected $fillable = [
        'username',
        'user_message',
        'card_image',
    ];

}