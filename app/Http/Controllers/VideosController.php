<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
	private $videoModel;
	
	public function __construct(Video $video)
	{
		$this->videoModel = $video;
	}
	
	function index()
	{
		$videos = $this->videoModel->orderBy('created_at', 'DESC')->get();
		
		return view('site.videos', compact('videos'));
	}
}
