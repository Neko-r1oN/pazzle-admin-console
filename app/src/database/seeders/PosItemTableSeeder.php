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


                'user_id' => 1,
                'item_id' => 1,
                'item_num' => 20,
            ]);
            PosItem::create([

                'user_id' => 2,
                'item_id' => 2,
                'item_num' => 50,
            ]);
            PosItem::create([

                'user_id' => 3,
                'item_id' => 3,
                'item_num' => 999,

            ]);
        }
    }
