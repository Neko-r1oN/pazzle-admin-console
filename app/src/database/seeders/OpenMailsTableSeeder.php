<?php

    namespace Database\Seeders;

    use App\Models\OpenMail;
    use Illuminate\Database\Seeder;

    class OpenMailsTableSeeder extends Seeder
    {
        public function run(): void
        {
            OpenMail::create([
                'user_id' => 1,
                'mail_id' => 1,
                'isOpen' => true,
            ]);
            OpenMail::create([
                'user_id' => 2,
                'mail_id' => 1,
                'isOpen' => true,
            ]);
            OpenMail::create([
                'user_id' => 1,
                'mail_id' => 2,
                'isOpen' => true,
            ]);
        }
    }
