<?php

    namespace Database\Seeders;

    use App\Models\Stage;
    use App\Models\User;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    class StagesTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {

            Stage::create([
                'stage_name' => '1-1',
            ]);
            Stage::create([
                'stage_name' => '1-2',
            ]);
            Stage::create([
                'stage_name' => '1-3',
            ]);
            Stage::create([
                'stage_name' => '1-4',
            ]);

            /*Stage::factory(100)->create();*/
        }

    }
