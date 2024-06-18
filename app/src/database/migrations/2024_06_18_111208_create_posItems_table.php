<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**'id' => 1,
         * 'pla_name' => 'r1oN',
         * 'item_name' => '毒チワワ',
         * 'num' => 20,
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('pos_items', function (Blueprint $table) {
                $table->id();                                 //IDカラム
                $table->string('pla_name', 20);      //nameカラム(20文字)
                $table->string('item_name', 20); //passwordカラム(100文字)
                $table->integer('num');
                $table->timestamps();                         //created_at,updated_at


            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            //
            Schema::dropIfExists('pos_items');
        }
    };
