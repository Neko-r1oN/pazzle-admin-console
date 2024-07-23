<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void
        {
            Schema::create('achieve_logs', function (Blueprint $table) {
                $table->id();
                $table->integer('clear_user_id'); //userID
                $table->integer('clear_achieve_id'); //itemID
                $table->integer('action'); //itemID
                $table->timestamps();

                $table->index('id');             //idにindex設定
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('achieve_logs');
        }
    };
