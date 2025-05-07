<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('form_inputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['text', 'number', 'email', 'file']); 
            $table->string('label');
            $table->string('placeholder')->nullable();
            $table->timestamps();
        });
}


   
    public function down(): void
    {
        Schema::dropIfExists('form_inputs');
    }
};
