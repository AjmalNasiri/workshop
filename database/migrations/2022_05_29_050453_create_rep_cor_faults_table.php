<?php

use App\Models\CarCodr;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepCorFaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rep_cor_faults', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->boolean('type');
            $table->foreignIdFor(CarCodr::class)->constrained();
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
        Schema::table('rep_cor_faults',function(Blueprint $table){
            $table->dropForeign(['car_codr_id']);
        });
        Schema::dropIfExists('rep_cor_faults');
    }
}
