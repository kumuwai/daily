<?php namespace Kumuwai\Daily\Modules\Day001\Http\Controllers;

use Kumuwai\Daily\Http\Requests;
use Kumuwai\Daily\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Day001Controller extends Controller 
{

	public function index()
	{
		return view('day001::day001');
	}

}
