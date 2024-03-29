<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationPesuboxsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_pesuboxs', function (Blueprint $table) {
            $table->id();
            $table->integer("location_id");
            $table->string("name")->nullable();
            $table->string("description")->nullable();
            $table->integer("status")->default(0);
            $table->char("is_delete")->default("N");
            $table->integer("display_order")->default(0);
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
        Schema::dropIfExists('location_pesuboxs');
    }
}
