<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create("manytomanies",function(Blueprint $table){
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger('master_id');
            $table->foreign("master_id")->references("id")->on("masters")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
