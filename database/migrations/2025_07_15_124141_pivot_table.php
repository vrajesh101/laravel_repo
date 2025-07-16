<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("pivotes", function (Blueprint $table) {
            $table->unsignedBigInteger('master_id');
            $table->unsignedBigInteger('manytomanies_id');

            $table->foreign('master_id')->references('id')->on('masters')->onDelete('cascade');
            $table->foreign('manytomanies_id')->references('id')->on('manytomanies')->onDelete('cascade');
        });
    }

    public function down(): void
    {
       //
    }
};
