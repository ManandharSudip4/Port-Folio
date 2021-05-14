<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkingexpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workingexps', function (Blueprint $table) {
            $table->id();
            $table->string('startyear', 30);
            $table->string('post', 75);
            $table->string('institute', 50);
            $table->text('description');
            $table->string('endyear', 30);
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
        Schema::dropIfExists('workingexps');
    }
}
