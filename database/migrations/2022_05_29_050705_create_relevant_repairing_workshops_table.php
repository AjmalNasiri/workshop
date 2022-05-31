<?php

use App\Models\CarCodr;
use App\Models\Part;
use App\Models\Workshop;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelevantRepairingWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relevant_repairing_workshops', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Workshop::class)->constrained();
            $table->foreignIdFor(Part::class)->constrained();
            $table->date('repairing_date');
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
        Schema::table('relevant_repairing_workshops',function(Blueprint $table){
            $table->dropForeign(['workshop_id']);
            $table->dropForeign(['car_codr_id']);
            $table->dropForeign(['part_id']);
        });
        Schema::dropIfExists('relevant_repairing_workshops');
    }
}
