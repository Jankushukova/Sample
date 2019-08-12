<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')
                ->references('id')
                ->on('users');
            $table->bigInteger('lesson_id')->unsigned();
            $table->foreign('lesson_id')
                ->references('id')
                ->on("lessons");
            $table->bigInteger('access_id')->unsigned();
            $table->foreign('access_id')
                ->references('id')
                ->on('accesses');
            $table->double('grade')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('grades');
    }
}
