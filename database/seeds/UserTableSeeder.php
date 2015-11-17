<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Article;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $users = array();

        foreach(range(1,20) as $index)
        {

            array_push($users,array(
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'article_id' => Article::orderByRaw("Rand()")->first()->id,
                'password' => Hash::make($faker->password),
                'created_at' => $faker->dateTimeThisYear
            ));
        }

        User::insert($users);

    }
}
