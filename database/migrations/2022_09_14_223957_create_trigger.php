<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared('
        CREATE TRIGGER updating_Credit AFTER INSERT ON `monthly_payements` FOR EACH ROW

            UPDATE `credits` SET `amountRemained` = `amountRemained` - NEW.paymentGiven

        ');

        //Schema::create('trigger', function (Blueprint $table) {
        // $table->id();
        // $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER updating_Credit');
        // Schema::dropIfExists('trigger');
    }
};
