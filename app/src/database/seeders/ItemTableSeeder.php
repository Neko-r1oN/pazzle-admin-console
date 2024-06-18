<?php

    namespace Database\Seeders;

    use App\Models\Item;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    class ItemTableSeeder extends Seeder
    {
        /**id' => 1,
         * 'name' => '毒チワワ',
         * 'type' => '消耗品',
         * 'effect' => 20,
         * 'text' => '使うとタヒ',
         * Run the migrations.
         * Run the database seeds.
         */
        public function run(): void
        {
            Item::create([

                'id' => 1,
                'name' => '毒チワワ',
                'type' => '消耗品',
                'effect' => 20,
                'text' => '使うとタヒ',
            ]);
            Item::create([

                'id' => 2,
                'name' => '氷炭',
                'type' => '消耗品',
                'effect' => 30,
                'text' => 'ランダムに凍結効果',
            ]);
            Item::create([

                'id' => 3,
                'name' => '鋭利なフジツボ',
                'type' => '消耗品',
                'effect' => 60,
                'text' => 'まきびしに使える',
            ]);
        }
    }
