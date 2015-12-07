<?php
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 07/12/15
 * Time: 10:20 AM
 */

namespace App\Http\Controllers;

use App\StringToImage;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class HomeController extends  BaseController
{

    public function index()
    {
        return view('home');
    }


    public function test(StringToImage $strToImg, Request $request)
    {
        $strToImg->stringToImage($request->get('image'), 'image');
    }
}