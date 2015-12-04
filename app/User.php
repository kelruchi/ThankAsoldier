<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    protected $table = 'users';
    
    protected $fillable = 
    [
        'email',
        'oauth',
        'username',
        'auth_token'
    ];


    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}