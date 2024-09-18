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
                'user_name' => "プレイヤー１",
                'score' => 2024,
            ]);

            ScoreRanking::create([
                'user_id' => 4,
                'user_name' => "player6",
                'score' => 5000,
            ]);

            ScoreRanking::create([
                'user_id' => 10,
                'user_name' => "No.12",
                'score' => 9999,
            ]);

            ScoreRanking::create([
                'user_id' => 1,
                'user_name' => "CutieCat",
                'score' => 1,
            ]);
        }
    }
