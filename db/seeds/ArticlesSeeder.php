<?php


use Phinx\Seed\AbstractSeed;

class ArticlesSeeder extends AbstractSeed
{
    const TABLE = 'articles';

    public function run()
    {

        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'title' => $faker->title,
                'content' => $faker->text,
                'date' => $faker->date('Y-m-d'),
            ];
        }

        $this->table(self::TABLE)->insert($data)->save();
    }
}
