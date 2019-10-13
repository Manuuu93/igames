<?php


use Phinx\Seed\AbstractSeed;

class TeamsSeeder extends AbstractSeed
{
    const TABLE = 'teams';

    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'name' => $faker->company,
                'birthday' => $faker->date('Y-m-d'),
            ];
        }

        $this->table(self::TABLE)->insert($data)->save();
    }
}
