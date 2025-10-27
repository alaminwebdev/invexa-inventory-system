<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('department_requisition_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('department_requisition_id');
            $table->bigInteger('product_id');
            $table->integer('current_stock')->nullable();
            $table->integer('demand_quantity')->nullable();
            $table->integer('approve_quantity')->nullable();
            $table->integer('final_approve_quantity')->nullable()->comment('Approved distribute quantity');
            $table->longText('remarks')->nullable();
            $table->longText('approve_remarks')->nullable();
            $table->longText('final_approve_remarks')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('department_requisition_details');
    }
};
