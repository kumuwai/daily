<?php namespace Kumuwai\Daily\Modules\Day001\Http\Controllers;

use Kumuwai\Daily\Http\Requests;
use Kumuwai\Daily\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kumuwai\Daily\Modules\Day001\Domain\Tools;
use Kumuwai\Daily\Modules\Day001\Domain\Days;

class Day001Controller extends Controller 
{
    private $days;
    private $tools;

    public function __construct(Days $days, Tools $tools)
    {
        $this->days = $days;
        $this->tools = $tools;
    }

	public function index()
	{
        $days = $this->days->get();
        $tools = $this->tools->all();

		return view('day001::day001', compact('days','tools'));
	}

}
