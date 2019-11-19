<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PatientDataPatient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('presence_data_presence', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('presence_id');
          $table->unsignedBigInteger('patient_data_id');
          $table->datetime('date_plan');
          $table->datetime('date_fact');
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
        Schema::dropIfExists('presence_data_presence');
    }
}
