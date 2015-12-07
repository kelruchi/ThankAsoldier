<?php
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 07/12/15
 * Time: 10:20 AM
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller as BaseController;

class HomeController extends  BaseController
{

    public function index()
    {
        dd(Auth::user());
        return view('home');
    }
}