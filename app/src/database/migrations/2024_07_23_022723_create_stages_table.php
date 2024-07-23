<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void
        {
            Schema::create('stages', function (Blueprint $table) {
                $table->id();
                $table->integer('merge_num'); //userID
                $table->text('goal_text'); //itemID
                $table->timestamps();

                $table->index('id');             //idにindex設定
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('stages');
        }
    };
