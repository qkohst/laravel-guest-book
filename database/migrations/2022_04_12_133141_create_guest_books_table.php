<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_books', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->string('organization', 100);
            $table->string('address', 100);
            $table->unsignedBigInteger('province_code');
            $table->unsignedBigInteger('city_code');
            $table->timestamps();

            $table->foreign('province_code')
                ->references('code')
                ->on('provinces');

            $table->foreign('city_code')
                ->references('code')
                ->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guest_books');
    }
}
