<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void
        {
            Schema::create('mail_logs', function (Blueprint $table) {
                $table->id();
                $table->integer('open_user_id'); //userID
                $table->integer('open_mail_id'); //itemID
                $table->integer('action'); //itemID
                $table->timestamps();

                $table->index('id');             //idにindex設定
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('mail_logs');
        }
    };
