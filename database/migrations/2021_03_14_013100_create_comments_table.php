<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('comments', function (Blueprint $table) {
       $table->increments('id');
       $table->integer('user_id')->constrained('users')->nullable()->onDelete('cascade');
       $table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade');
       $table->integer('parent_id')->unsigned()->default(0);
       $table->text('comment');
       $table->string('aula_type');
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
        Schema::dropIfExists('comments');
    }
}
