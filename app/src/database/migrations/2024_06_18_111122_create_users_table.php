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
            Schema::create('users', function (Blueprint $table) {
                $table->id();                                 //IDカラム
                $table->string('name', 120);      //nameカラム(20文字)
                $table->string('password'); //passwordカラム
                $table->integer('level'); //levelカラム
                $table->integer('exp'); //expカラム
                $table->integer('life'); //lifeカラム
                $table->timestamps();       //created_at,updated_at

                $table->index('id');             //idにindex設定
                $table->index('name');             //nameにindex設定
                //$table->unique('name');           //nameにunique制約設定
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('users');
        }
    };
