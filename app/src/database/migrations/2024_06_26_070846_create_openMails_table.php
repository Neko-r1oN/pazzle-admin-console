<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void
        {
            Schema::create('open_mails', function (Blueprint $table) {
                $table->id();
                $table->integer('user_id'); //userID
                $table->integer('mail_id'); //mailID
                $table->boolean('isOpen');  //開封判定
                $table->timestamps();
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('receivers');
        }
    };
