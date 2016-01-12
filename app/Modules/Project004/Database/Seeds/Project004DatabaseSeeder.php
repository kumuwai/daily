<?php
namespace Kumuwai\Playground\Modules\Project004\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class Project004DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('Kumuwai\Playground\ModulesProject004\Database\Seeds\FoobarTableSeeder');
	}

}
