<?php

use Illuminate\Database\Seeder;
use App\User;
use App\SomeResource;

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

        foreach(range(1,20) as $index)
        {
            User::create(array(
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'someResource_id' => SomeResource::orderByRaw("Rand()")->first()->id,
                'password' => Hash::make($faker->password),
                'created_at' => $faker->dateTimeThisYear
            ));
        }

    }
}
