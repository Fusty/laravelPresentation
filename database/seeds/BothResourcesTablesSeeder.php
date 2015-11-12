<?php

use Illuminate\Database\Seeder;
use App\SomeResource;
use App\SomeOtherResource;

class BothResourcesTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        //These need to be associated with one another, so seed them both at once!
        foreach(range(1,100) as $index)
        {
            $someResource = SomeResource::create(array(
                'title' => $faker->title,
                'body' => $faker->text,
                'created_at' => $faker->dateTimeThisMonth
            ));

            $someOtherResource = SomeOtherResource::create(array(
                'title' => $faker->title,
                'body' => $faker->text,
                'created_at' => $faker->dateTimeThisMonth
            ));

            //Link the two together so the one to one works
            $someResource->someOtherResource_id = $someOtherResource->id;
            $someResource->save();
            $someOtherResource->someResource_id = $someResource->id;
            $someOtherResource->save();
        }

    }
}
