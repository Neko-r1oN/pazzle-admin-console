<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void
        {
            Schema::create('follows', function (Blueprint $table) {
                $table->id();
                $table->integer('send_user_id'); //userID
                $table->integer('follow_user_id'); //mailID
                $table->timestamps();

                $table->unique(['send_user_id', 'follow_user_id']);
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('follows');
        }
    };
