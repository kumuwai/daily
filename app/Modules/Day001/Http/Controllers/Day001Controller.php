<?php namespace Kumuwai\Daily\Modules\Day001\Http\Controllers;

use Kumuwai\Daily\Http\Requests;
use Kumuwai\Daily\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kumuwai\Daily\Modules\Day001\Domain\Tools;
use Kumuwai\Daily\Modules\Day001\Domain\Days;

class Day001Controller extends Controller 
{
    /**
     * Information about individual days / subprojects
     * in this project. 
     * Includes name, slug, description, status, and tools used
     */
    private $days;

    /**
     * Information about the tools used in the project
     * (eg, Laravel, AngularJS, etc.)
     * Reads data from config/tools.php
     */
    private $tools;

    /**
     * Constructor
     * 
     * @param Days  $days  
     * @param Tools $tools 
     */
    public function __construct(Days $days, Tools $tools)
    {
        $this->days = $days;
        $this->tools = $tools;
    }

    /**
     * Return a view showing an index of days and tools used
     */
	public function index()
	{
        $days = $this->days->get();
        $tools = $this->tools->all();

		return view('day001::day001', compact('days','tools'));
	}

}
