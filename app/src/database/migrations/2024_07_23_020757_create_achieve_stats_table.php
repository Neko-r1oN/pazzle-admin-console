<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void
        {
            Schema::create('achieve_stats', function (Blueprint $table) {
                $table->id();
                $table->integer('user_id',);
                $table->integer('achieve_id',);
                $table->integer('isClear'); //itemID
                $table->timestamps();

                $table->index('id');
                $table->index('user_id');

                $table->unique(['user_id', 'achieve_id']);
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('achieve_stats');
        }
    };
