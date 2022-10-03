<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->string('imdb_id')->unique();
            $table->string('title');
            $table->text('overview');
            $table->date('release_date');
            $table->string('status')->default('Active');
            $table->boolean('adult')->default(false);
            $table->string('image')->default('none');
            $table->string('video')->default('none');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
