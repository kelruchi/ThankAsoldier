<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;


class PostsController extends BaseController
{
	public function store(Request $request)
	{
		$message = $request->get('message');
		$username = $request->get('name');
		$image = $request->file('image');


		$imageString = base64_encode($image);
	}
}