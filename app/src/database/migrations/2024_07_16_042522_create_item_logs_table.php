<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void
        {
            Schema::create('item_logs', function (Blueprint $table) {
                $table->id();
                $table->integer('get_user_id'); //userID
                $table->integer('get_item_id'); //itemID
                $table->integer('get_item_num'); //itemNum
                $table->timestamps();

                $table->index('id');             //idにindex設定
            });
        }

        public function down(): void
        {
            Schema::table('', function (Blueprint $table) {
                //
            });
        }
    };
