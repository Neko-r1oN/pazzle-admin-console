<?php

    namespace Database\Seeders;

    use App\Models\Player;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    class PlayerTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            Player::create([

                'id' => 1,
                'name' => 'r1oN',
                'level' => 29,
                'exp' => 290,
                'life' => 1000,
            ]);
            Player::create([
                'id' => 2,
                'name' => 'SyuEn',
                'level' => 44,
                'exp' => 777,
                'life' => 4649,
            ]);
            Player::create([
                'id' => 3,
                'name' => 'GOD',
                'level' => 999,
                'exp' => 9999,
                'life' => 99999,
            ]);
        }
    }
