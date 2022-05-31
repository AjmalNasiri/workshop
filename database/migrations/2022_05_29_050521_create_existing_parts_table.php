<?php

use App\Models\CarCodr;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExistingPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('existing_parts', function (Blueprint $table) {
            $table->id();
            $table->string('part_name');
            $table->integer('qty');
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
        Schema::table('existing_parts',function(Blueprint $table){
            $table->dropForeign(['car_codr_id']);
        });
        Schema::dropIfExists('existing_parts');
    }
}
