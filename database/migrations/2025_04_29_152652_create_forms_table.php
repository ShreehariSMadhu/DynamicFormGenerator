<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('method', ['GET', 'POST', 'PUT', 'DELETE']);
            $table->string('action_url');
            $table->boolean('cancel_button');
            $table->string('submit_button_name');
            $table->timestamps();
         });
}

    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
