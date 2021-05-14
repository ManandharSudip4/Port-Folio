<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('title',50);
            $table->string('link',100);
            $table->string('workimage',50);
            $table->integer('categoryid');
            $table->integer('view');
            $table->enum('featured',['Featured','notFeatured'])->default('notFeatured');
            $table->enum('status',['Active','Passive'])->default('Active');
            $table->text('content');
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
        Schema::dropIfExists('works');
    }
}
