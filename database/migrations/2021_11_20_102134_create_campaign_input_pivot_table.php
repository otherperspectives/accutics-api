<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaignInputPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_input', function (Blueprint $table) {
            $table->foreignId('campaign_id')->constrained()->onDelete('cascade');
            $table->foreignId('input_id')->constrained()->onDelete('cascade');
            $table->primary(['campaign_id', 'input_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaign_input');
    }
}
