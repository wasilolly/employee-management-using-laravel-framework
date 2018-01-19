<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id');
			$table->string('email')->unique();
			$table->string('fname');
			$table->string('lname');
			$table->date('birth_date');
			$table->date('hired_date');
			$table->string('gender');
			$table->string('phone')->nullable();
			$table->string('street');
			$table->string('town')->nullable();
			$table->string('city');
			$table->string('country');
			
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
        Schema::dropIfExists('employees');
    }
}
