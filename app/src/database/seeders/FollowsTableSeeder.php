<?php

    namespace Database\Seeders;

    use App\Models\Follow;
    use Illuminate\Database\Seeder;

    class FollowsTableSeeder extends Seeder
    {
        public function run(): void
        {
            Follow::create([
                'send_user_id' => 1,
                'follow_user_id' => 2,
            ]);
        }
    }
