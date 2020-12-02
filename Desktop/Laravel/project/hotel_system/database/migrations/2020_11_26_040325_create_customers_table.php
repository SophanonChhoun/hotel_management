<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("first_name");
            $table->string("last_name");
            $table->date("dob");
            $table->enum("gender",["m","f"]);
            $table->integer("identification_id");
            $table->string("street_address");
            $table->string("city");
            $table->string("country");
            $table->string("zip");
            $table->string("phone_number");
            $table->boolean("is_enable");
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
        Schema::dropIfExists('customers');
    }
}
