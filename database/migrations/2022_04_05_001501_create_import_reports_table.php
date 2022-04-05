<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('import_reports', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('row_quantity');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('import_reports');
    }
};
