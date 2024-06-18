<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * 'id' => 1,
         * 'name' => 'r1oN',
         * 'level' => 29,
         * 'exp' => 290,
         * 'life' => 1000,
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('players', function (Blueprint $table) {
                $table->id();                                 //IDカラム
                $table->string('name', 20);      //nameカラム(20文字)
                $table->integer('level'); //passwordカラム(100文字)
                $table->integer('exp'); //passwordカラム(100文字)
                $table->integer('life'); //passwordカラム(100文字)
                $table->timestamps();                         //created_at,updated_at

                $table->index('name');             //nameにindex設定
                $table->unique('name');           //nameにunique制約設定
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('players');
        }
    };
