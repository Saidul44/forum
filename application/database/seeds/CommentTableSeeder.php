<?php

use App\Models\Comment\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Comment::insert(array(
  array('id' => '1','comment_id' => '0','user_id' => '3','thread_id' => '1','comment' => 'Good stuff','image' => NULL,'created_at' => '2017-02-21 15:38:59','updated_at' => '2017-02-21 15:38:59'),
  array('id' => '2','comment_id' => '0','user_id' => '3','thread_id' => '1','comment' => 'Second Comment','image' => NULL,'created_at' => '2017-02-21 15:39:10','updated_at' => '2017-02-21 15:39:10'),
  array('id' => '3','comment_id' => '2','user_id' => '3','thread_id' => '1','comment' => 'Child Comment','image' => NULL,'created_at' => '2017-02-21 15:39:28','updated_at' => '2017-02-21 15:39:28'),
  array('id' => '4','comment_id' => '1','user_id' => '3','thread_id' => '1','comment' => 'Test comment','image' => NULL,'created_at' => '2017-02-21 15:39:58','updated_at' => '2017-02-21 15:39:58'),
  array('id' => '5','comment_id' => '2','user_id' => '3','thread_id' => '1','comment' => 'Third Child','image' => NULL,'created_at' => '2017-02-21 15:40:38','updated_at' => '2017-02-21 15:40:38'),
  array('id' => '6','comment_id' => '3','user_id' => '3','thread_id' => '1','comment' => 'Bad Stuff','image' => NULL,'created_at' => '2017-02-21 15:40:53','updated_at' => '2017-02-21 15:40:53'),
  array('id' => '7','comment_id' => '0','user_id' => '3','thread_id' => '2','comment' => 'Good stuff','image' => NULL,'created_at' => '2017-02-21 15:41:47','updated_at' => '2017-02-21 15:41:47'),
  array('id' => '8','comment_id' => '7','user_id' => '3','thread_id' => '2','comment' => 'Good stuff','image' => NULL,'created_at' => '2017-02-21 15:41:52','updated_at' => '2017-02-21 15:41:52'),
  array('id' => '9','comment_id' => '0','user_id' => '3','thread_id' => '3','comment' => 'Good stuff','image' => NULL,'created_at' => '2017-02-21 15:42:09','updated_at' => '2017-02-21 15:42:09'),
  array('id' => '10','comment_id' => '0','user_id' => '3','thread_id' => '3','comment' => 'Good stuff','image' => NULL,'created_at' => '2017-02-21 15:42:14','updated_at' => '2017-02-21 15:42:14'),
  array('id' => '11','comment_id' => '10','user_id' => '3','thread_id' => '3','comment' => 'Good stuff','image' => NULL,'created_at' => '2017-02-21 15:42:18','updated_at' => '2017-02-21 15:42:18'),
  array('id' => '12','comment_id' => '11','user_id' => '3','thread_id' => '3','comment' => 'Good stuff','image' => NULL,'created_at' => '2017-02-21 15:42:22','updated_at' => '2017-02-21 15:42:22'),
  array('id' => '13','comment_id' => '0','user_id' => '3','thread_id' => '4','comment' => 'Good stuff','image' => NULL,'created_at' => '2017-02-21 15:42:27','updated_at' => '2017-02-21 15:42:27'),
  array('id' => '14','comment_id' => '0','user_id' => '3','thread_id' => '5','comment' => 'Good stuff','image' => NULL,'created_at' => '2017-02-21 15:42:31','updated_at' => '2017-02-21 15:42:31'),
  array('id' => '15','comment_id' => '0','user_id' => '3','thread_id' => '6','comment' => 'Good stuff','image' => NULL,'created_at' => '2017-02-21 15:42:35','updated_at' => '2017-02-21 15:42:35')
));
    }
}
