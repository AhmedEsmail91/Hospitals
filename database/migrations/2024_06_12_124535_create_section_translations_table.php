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
        Schema::create('section_translations', function (Blueprint $table) {
            // mandatory fields
            $table->bigIncrements('id'); // Laravel 5.8+ use bigIncrements() instead of increments()
            $table->string('locale')->index();// The locale field is used to store the language of the translation which get from App::getLocale() to set the locale based on it 

            // Foreign key to the main model
            $table->unsignedBigInteger('section_id');
            $table->unique(['section_id', 'locale']);
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

            // Actual fields you want to translate
            $table->string('name'); // just translate the name field (which is gonna be sections titles)
            // $table->longText('full_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_translations');
    }
};
