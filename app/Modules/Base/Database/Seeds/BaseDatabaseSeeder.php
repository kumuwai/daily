<?php
namespace Kumuwai\Daily\Modules\Base\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class BaseDatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('Kumuwai\Daily\Modules\Base\Database\Seeds\FoobarTableSeeder');
	}

}
