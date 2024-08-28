<?php

    namespace Database\Seeders;

    use App\Models\ScoreAttack;
    use App\Models\User;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    class ScoreAttackTableSeeder extends Seeder
    {
        public function run(): void
        {
            ScoreAttack::create([
                'user_id' => 3,
                'score' => 2024,
            ]);
        }
    }
