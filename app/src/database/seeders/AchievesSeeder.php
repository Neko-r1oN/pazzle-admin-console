<?php

    namespace Database\Seeders;

    use App\Models\Achieve;
    use Illuminate\Database\Seeder;

    class AchievesSeeder extends Seeder
    {
        public function run(): void
        {
            Achieve::create([

                'title' => 'はじめの一歩',
                'message' => 'ステージ１をクリアしよう',
                'exp' => 100,
            ]);
            Achieve::create([
                'title' => '回転酔い',
                'message' => '1プレイの総回転数が1000°を超える',
                'exp' => 200,
            ]);
            Achieve::create([
                'title' => '未踏の領域',
                'message' => 'ボールが範囲外に落下する',
                'exp' => 500,
            ]);
        }
    }
