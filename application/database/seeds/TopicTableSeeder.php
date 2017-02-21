<?php

use App\Models\Topic\Topic;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Topic::insert(array(
  array('id' => '1','name' => 'Science','description' => 'Science topic goes here','created_at' => '2017-02-21 15:11:52','updated_at' => '2017-02-21 15:11:52'),
  array('id' => '2','name' => 'Art','description' => 'Art topc','created_at' => '2017-02-21 15:12:03','updated_at' => '2017-02-21 15:12:03'),
  array('id' => '3','name' => 'Education','description' => 'Need good education system','created_at' => '2017-02-21 15:12:21','updated_at' => '2017-02-21 15:12:21'),
  array('id' => '4','name' => 'Digital Education','description' => 'Digital Education system','created_at' => '2017-02-21 15:13:10','updated_at' => '2017-02-21 15:13:10')
));
    }
}
