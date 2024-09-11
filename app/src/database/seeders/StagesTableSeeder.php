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
            Stage::create([
                'stage_name' => '1-5',
            ]);
            Stage::create([
                'stage_name' => '1-6',
            ]);
            Stage::create([
                'stage_name' => '1-7',
            ]);
            Stage::create([
                'stage_name' => '1-8',
            ]);
            Stage::create([
                'stage_name' => '1-9',
            ]);
            Stage::create([
                'stage_name' => '1-10',
            ]);
            Stage::create([
                'stage_name' => '1-11',
            ]);
            Stage::create([
                'stage_name' => '1-12',
            ]);
            Stage::create([
                'stage_name' => '1-13',
            ]);
            Stage::create([
                'stage_name' => '1-14',
            ]);
            Stage::create([
                'stage_name' => '1-15',
            ]);
            Stage::create([
                'stage_name' => '1-16',
            ]);
            Stage::create([
                'stage_name' => '1-17',
            ]);
            Stage::create([
                'stage_name' => '1-18',
            ]);
            Stage::create([
                'stage_name' => '1-19',
            ]);
            Stage::create([
                'stage_name' => '1-20',
            ]);
            
            /*Stage::factory(100)->create();*/
        }

    }
