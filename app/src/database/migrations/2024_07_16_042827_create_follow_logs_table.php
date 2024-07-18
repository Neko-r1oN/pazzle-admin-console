<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void
        {
            Schema::create('follow_logs', function (Blueprint $table) {
                $table->id();
                $table->integer('follow_user_id'); //userID
                $table->integer('follower_user_id'); //itemID
                $table->integer('action'); //itemNum
                $table->timestamps();

                $table->index('id');             //idにindex設定
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('follow_logs');
        }
    };
