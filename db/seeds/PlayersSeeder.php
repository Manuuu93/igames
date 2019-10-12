<?php


use Phinx\Seed\AbstractSeed;

class PlayersSeeder extends AbstractSeed
{
    const TABLE = 'players';

    public function getDependencies()
    {
        return [
            'TeamsSeeder',
        ];
    }

    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 600; $i++) {
            $data[] = [
                'name' => $faker->name,
                'birthday' => $faker->date('Y-m-d'),
                'team_id' => $faker->numberBetween(1, 100),
            ];
        }

        $this->table(self::TABLE)->insert($data)->save();
    }
}
