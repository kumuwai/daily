<?php
namespace Kumuwai\Playground\Modules\Project002\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class Project002DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('Kumuwai\Playground\Modules\Project002\Database\Seeds\FoobarTableSeeder');
	}

}
