<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientDiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presence_disease', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('presence_id');
            $table->unsignedBigInteger('disease_id');
            $table->unsignedBigInteger('doctor_id');
            $table->datetime('date_scheduled')->nullable();
            $table->datetime('date_fact')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presence_disease');
    }
}
