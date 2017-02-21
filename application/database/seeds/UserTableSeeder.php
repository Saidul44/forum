<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        User::insert(
            array(
              array('id' => '1','name' => 'Foo','email' => 'demo@gmail.com','password' => '$2y$10$RUpFvm0XqY6ANuJuFiYniuexwJXMWLU2l.2gc7.qTFDxnFnFSt08.','remember_token' => 'KxiyQE1CseUHyo9fY3uu5IXWywtZ3zeJLxfanZ6fNzAhzcyg5QdACe446dGx','created_at' => '2017-02-21 15:10:35','updated_at' => '2017-02-21 15:10:35','photo'=>''),
              array('id' => '2','name' => 'Jorge','email' => 'test@yahoo.com','password' => '$2y$10$69hpUS5eNK8Lpj1yuT9uBeZ0nuf3R0EeT9bTLPv8lAGlQ7uYEWn8u','remember_token' => '6nJ4bLo4R8zbxhOtfRQcN4arky9dOjeFJtiS9zVxAO3Xx8Yd1NJkz7BWwNlA','created_at' => '2017-02-21 15:11:02','updated_at' => '2017-02-21 15:11:02','photo'=>''),
              array('id' => '3','name' => 'Fobia','email' => 'demo@yahoo.com','password' => '$2y$10$Js99qqFJcCWfDu2sLeUj1.XigW8DZNROwypclnD9SSAFt1EV1m7rK','remember_token' => 'I1rIgnHWkNWVcEPNc7LhsxHTL5iLif2brncdXtGyoGDWJsvxKjAXM88n5cbC','created_at' => '2017-02-21 15:11:21','updated_at' => '2017-02-21 15:11:21','photo'=>'')
            )
        );
    }
}
