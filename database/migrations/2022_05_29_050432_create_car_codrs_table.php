<?php

use App\Models\Qataa;
use App\Models\SetHolderAndDriver;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarCodrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_codrs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SetHolderAndDriver::class,'driver_id')->constrained('set_holder_and_drivers');
            $table->foreignIdFor(SetHolderAndDriver::class,'set_holder_id')->constrained('set_holder_and_drivers');
            $table->foreignIdFor(Qataa::class)->constrained();
            $table->date('entry_date');
            $table->time('entry_time');
            $table->date('exit_date')->nullable();
            $table->time('exit_time')->nullable();
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
        Schema::table('car_codrs',function(Blueprint $table){
            $table->dropForeign(['driver_id']);
            $table->dropForeign(['set_holder_id']);
            $table->dropForeign(['qataa_id']);
        });
        Schema::dropIfExists('car_codrs');
    }
}
