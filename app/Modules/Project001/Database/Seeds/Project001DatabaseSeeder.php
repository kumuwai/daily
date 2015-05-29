<?php
namespace Kumuwai\Playground\Modules\Project001\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class Project001DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('Kumuwai\Playground\Modules\Project001\Database\Seeds\FoobarTableSeeder');
	}

}
