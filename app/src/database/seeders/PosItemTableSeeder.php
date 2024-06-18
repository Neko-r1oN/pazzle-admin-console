<?php

    namespace Database\Seeders;

    use App\Models\PosItem;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    class PosItemTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            PosItem::create([

                'id' => 1,
                'pla_name' => 'r1oN',
                'item_name' => '毒チワワ',
                'num' => 20,
            ]);
            PosItem::create([
                'id' => 2,
                'pla_name' => 'SyuEn',
                'item_name' => '氷炭',
                'num' => 50,
            ]);
            PosItem::create([
                'id' => 3,
                'pla_name' => 'GOD',
                'item_name' => '鋭利なフジツボ',
                'num' => 999,

            ]);
        }
    }
