<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            # ID of account that owns this accounts.
            $table->integer('user_id');

            # Netflix Data
            $table->string('netflix_email');
            $table->string('netflix_password');
            $table->string('netflix_expiry');
            $table->string('netflix_subscriber');

            # Spotify Data
            $table->string('spotify_email');
            $table->string('spotify_password');
            $table->string('spotify_expiry');
            $table->string('spotify_subscriber');
            
            # Card Data
            $table->string('card_number');
            $table->string('card_cvv');
            $table->string('card_expiry');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
