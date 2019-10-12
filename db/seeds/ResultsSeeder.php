<?php


use Phinx\Seed\AbstractSeed;

class ResultsSeeder extends AbstractSeed
{
    const TABLE = 'results';

    public function getDependencies()
    {
        return [
            'TeamsSeeder',
            'ChampionshipsSeeder',
        ];
    }

    public function run()
    {

        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'champ_id' => $faker->numberBetween(1,10),
                'team_id' => $faker->numberBetween(1, 100),
                'points' => $faker->numberBetween(1, 36),
            ];
        }

        $this->table(self::TABLE)->insert($data)->save();
    }
}
