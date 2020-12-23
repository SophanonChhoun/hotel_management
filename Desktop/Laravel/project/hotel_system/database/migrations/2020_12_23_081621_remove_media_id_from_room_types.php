<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveMediaIdFromRoomTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('room_types', function (Blueprint $table) {
            if (Schema::hasColumn('room_types', 'media_id')) {
                $table->dropColumn('media_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_types', function (Blueprint $table) {
            //
        });
    }
}
