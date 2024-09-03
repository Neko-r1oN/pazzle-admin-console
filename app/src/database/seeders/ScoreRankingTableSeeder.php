<?php

    namespace Database\Seeders;

    use App\Models\ScoreRanking;
    use App\Models\User;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    class ScoreRankingTableSeeder extends Seeder
    {
        public function run(): void
        {
            ScoreRanking::create([
                'user_id' => 3,
                'user_name' => "r1oN",
                'score' => 2024,
            ]);

            ScoreRanking::create([
                'user_id' => 4,
                'user_name' => "Cal",
                'score' => 5000,
            ]);

            ScoreRanking::create([
                'user_id' => 10,
                'user_name' => "SyuEn",
                'score' => 9999,
            ]);

            ScoreRanking::create([
                'user_id' => 1,
                'user_name' => "No1",
                'score' => 1,
            ]);
        }
    }
