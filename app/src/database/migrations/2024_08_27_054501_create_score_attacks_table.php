<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void
        {
            Schema::create('score_attacks', function (Blueprint $table) {
                $table->id();
                $table->integer('user_id'); //userID
                $table->integer('score');   //ゲームスコア
                $table->timestamps();
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('score_attacks');
        }
    };
