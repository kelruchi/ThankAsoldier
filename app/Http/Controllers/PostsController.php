<?php

namespace App\Http\Controllers;

use App\Post;
use App\Convertable;
use Laravel\Lumen\Routing\Controller as BaseController;


class PostsController extends BaseController
{
	private $converter;


	public function __construct(Convertable $converter)
	{
		$this->converter = $converter;
	}

	public function store(Request $request, Post $post)
	{
		$post->user_message = $request->get('message');
		$post->username = $request->get('name');
		$image = $request->file('image');

		$post->user_image = $converter->imageToString($image);


		$post->save();


		return redirect()->back()->with('info', 'Thank you')



	}
}