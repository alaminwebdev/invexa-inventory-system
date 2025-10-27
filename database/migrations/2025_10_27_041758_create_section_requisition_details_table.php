<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('section_requisition_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('section_requisition_id');
            $table->string('requisition_no');
            $table->bigInteger('product_id');
            $table->integer('current_stock')->nullable();
            $table->integer('demand_quantity')->nullable();
            $table->integer('recommended_quantity')->nullable();
            $table->integer('verify_quantity')->nullable()->comment('verify quantity for approve');
            $table->longText('verify_remarks')->nullable();
            $table->integer('final_approve_quantity')->nullable()->comment('approved quantity for distribute');
            $table->longText('remarks')->nullable();
            $table->longText('recommended_remarks')->nullable();
            $table->longText('final_approve_remarks')->nullable();
            $table->integer('status')->nullable()->comment('0=Created, 1=Recommended, 2=Reject, 3=Final Approved, 4=Distributed, 5=Received');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('section_requisition_details');
    }
};
