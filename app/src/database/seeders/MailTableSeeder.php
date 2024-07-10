<?php

    namespace Database\Seeders;

    use App\Models\Mail;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    class MailTableSeeder extends Seeder
    {
        public function run(): void
        {
            /*$table->id();
                $table->string('user_name', 20);      //user_nameカラム(20文字)
                $table->string('title', 50);      //titleカラム(20文字)
                $table->string('message', 200);      //messageカラム(20文字)
                /*$table->string('message', 200);      //messageカラム(20文字)*/
            Mail::create([

                'title' => '長期メンテナンスによる補填について',
                'message' => 'サーバーがデッティしました。補填を送ります。',
                'item_id' => 1,
                'item_num' => 12000,

            ]);
            Mail::create([

                'title' => 'フレンド機能について',
                'message' => 'ハートが贈れます。',
                'item_id' => 2,
                'item_num' => 10,

            ]);
        }
    }
