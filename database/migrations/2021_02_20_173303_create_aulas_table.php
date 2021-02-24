<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aulas', function (Blueprint $table) {
            $table->id();
            $table->string('title', 250);
            $table->timestamps();
            $table->string('discipline');
            $table->string('grade');
            $table->text('content');
            $table->string('userCreator');
            $table->string('image');
            $table->string('aulaVideo');
            $table->string('imageFont')->nullable();
            $table->text('references')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aulas');
    }
}
