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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('date');
            $table->text('date2');
            $table->text('dep_area');
            $table->text('careus_name');
            $table->text('careus_id');
            $table->text('careus_tel');
            $table->text('careus_mail');
            $table->text('problem');
            $table->text('state');
            $table->text('remark');
            $table->text('reply');
            $table->text('staff');
            $table->text('note');
            $table->text('deadline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
