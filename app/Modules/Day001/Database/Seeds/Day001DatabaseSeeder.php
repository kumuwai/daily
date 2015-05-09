<?php
namespace Kumuwai\Daily\Modules\Day001\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class Day001DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('Kumuwai\Daily\Modules\Day001\Database\Seeds\FoobarTableSeeder');
	}

}
