<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void
        {
            Schema::create('mails', function (Blueprint $table) {
                $table->id();
                $table->string('title', 50);      //titleカラム(20文字)
                $table->string('message', 200);      //messageカラム(20文字)
                $table->integer('item_id',);      //itemカラム(20文字)
                $table->integer('item_num');      //itemカラム(20文字)
                $table->timestamps();
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('mails');
        }
    };
