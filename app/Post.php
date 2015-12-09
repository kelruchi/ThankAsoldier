<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $table = 'posts';
    
    protected $fillable = 
    [
        'post_title',
        'post_body',
        'card_type',
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}