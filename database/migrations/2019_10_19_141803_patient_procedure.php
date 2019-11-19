<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PatientProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('presence_procedure', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('presence_id');
          $table->unsignedBigInteger('procedure_id');
          $table->string('amount');
          $table->datetime('date_plan')->useCurrent();
          $table->datetime('date_fact')->useCurrent();
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
        Schema::dropIfExists('presence_procedure');
    }
}
