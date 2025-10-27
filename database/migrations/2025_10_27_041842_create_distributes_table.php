<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('distributes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('section_requisition_id');
            $table->bigInteger('department_requisition_id')->nullable();
            $table->bigInteger('product_id');
            $table->bigInteger('stock_in_detail_id');
            $table->integer('distribute_quantity');
            $table->integer('distribute_by')->nullable();
            $table->dateTime('distribute_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('distributes');
    }
};
