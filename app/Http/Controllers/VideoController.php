<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Services\VideoService;

class VideoController extends Controller
{
    //
    protected $videoservice;
 
	public function __construct(VideoService $videoservice)
	{
		$this->videoservice = $videoservice;
	}

	public function videos($gymid)
	{
		return view();
	}

	public function add($id)
	{
		return view();
	}

	public function watch($id)
	{
		return view();
	}
}
