<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_daily_report', function (Blueprint $table) {
            $table->bigIncrements('daily_report_id');
            $table->integer('id_user');
            $table->integer('confirmed')->nullable();
            $table->integer('discarded')->nullable();
            $table->integer('under_investigation')->nullable();
            $table->integer('interned_outside')->nullable();
            $table->integer('cured')->nullable();
            $table->integer('deaths')->nullable();
            $table->date('report_date');
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
        Schema::dropIfExists('tb_daily_report');
    }
}
