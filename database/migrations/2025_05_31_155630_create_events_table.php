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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->string('transportation');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('small_description');
            $table->text('long_description')->nullable();
            $table->string('main_image');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->boolean('has_hotel')->nullable()->default(false);
            $table->boolean('has_food')->nullable()->default(false);
            $table->integer('price');
            $table->integer('people');
            $table->foreignId('organizer_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
