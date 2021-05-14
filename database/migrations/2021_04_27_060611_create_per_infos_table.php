<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('per_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('pp',50);
            $table->string('profession',50);
            $table->text('quote');
            $table->text('bio');
            $table->string('cp',50);
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
        Schema::dropIfExists('per_infos');
    }
}
