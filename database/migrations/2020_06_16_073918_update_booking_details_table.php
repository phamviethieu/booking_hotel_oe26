<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBookingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_details', function (Blueprint $table) {
            if (Schema::hasColumn('booking_details', 'booking_details')) {
                $table->dropForeign(['booking_details']);
                $table->dropColumn('booking_details');
            }
            if (!Schema::hasColumn('booking_details', 'booking_id')) {
                $table->integer('booking_id')->unsigned();
                $table->foreign('booking_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
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
        if (Schema::hasColumn('booking_details', 'booking_id')) {
            Schema::table('booking_details', function (Blueprint $table) {
                $table->dropForeign(['booking_id']);
                $table->dropColumn('booking_id');
            });
        }
    }
}
