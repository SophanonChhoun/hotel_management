<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsToCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {

            $table->integer("identification_id")->nullable()->change();
            $table->string("street_address")->nullable()->change();
            $table->string("city")->nullable()->change();
            $table->string("country")->nullable()->change();
            $table->string("zip")->nullable()->change();
            $table->string("phone_number")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            //
        });
    }
}
