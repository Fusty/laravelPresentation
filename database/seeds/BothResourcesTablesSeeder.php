<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\SubArticle;
use Faker\Provider\en_US\Company;

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
            $article = Article::create(array(
                'title' => $faker->catchPhrase,
                'body' => $faker->text(1000),
                'created_at' => $faker->dateTimeThisMonth
            ));

            $subArticle = SubArticle::create(array(
                'title' => $faker->catchPhrase,
                'body' => $faker->text(1000),
                'created_at' => $faker->dateTimeThisMonth
            ));

            //Link the two together so the one to one works
            $article->subArticle_id = $subArticle->id;
            $article->save();
            $subArticle->article_id = $article->id;
            $subArticle->save();
        }

    }
}
