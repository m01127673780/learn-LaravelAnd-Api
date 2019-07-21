<?php

use Illuminate\Database\Seeder;
use\App\News;
class NewsDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
for($i = 0; $i<10; $i++)
		{
 
			$add = new News;
 			$add->add_by = '1';
			$add->title = 'news Title'.rand(0,9);
			$add->desc = 'news Descripton Test'.rand(0,9);
			$add->content = 'news content  '.rand(0,9);
			$add->status = 'active';
	 		$add->save();
		}
	}
}
