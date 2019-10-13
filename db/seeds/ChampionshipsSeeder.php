<?php


use Phinx\Seed\AbstractSeed;

class ChampionshipsSeeder extends AbstractSeed
{
    const TABLE = 'championships';

    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->company,
                'start_date' => $faker->date('Y-m-d'),
                'end_date' => $faker->date('Y-m-d'),
                'place' => $faker->city
            ];
        }

        $this->table(self::TABLE)->insert($data)->save();
    }
}
