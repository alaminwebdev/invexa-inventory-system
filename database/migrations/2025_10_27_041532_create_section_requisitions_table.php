<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('section_requisitions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('department_requisition_id')->nullable();
            $table->string('requisition_no');
            $table->integer('user_id');
            $table->integer('section_id')->nullable();
            $table->integer('status')->nullable()->comment('0=Created, 1=Recommended, 2=Reject, 3=Final Approved, 4=Distributed, 5=Received, 6=Verify');
            $table->integer('recommended_by')->nullable();
            $table->dateTime('recommended_at')->nullable();
            $table->integer('final_approve_by')->nullable();
            $table->dateTime('final_approve_at')->nullable();
            $table->integer('distribute_by')->nullable();
            $table->dateTime('distribute_at')->nullable();
            $table->integer('receive_by')->nullable();
            $table->dateTime('receive_at')->nullable();
            $table->integer('verify_by')->nullable();
            $table->dateTime('verify_at')->nullable();
            $table->string('name')->comment('Received Person Name')->nullable();
            $table->string('designation')->comment('Received Person Designation')->nullable();
            $table->string('phone')->comment('Received Person Phone')->nullable();
            $table->string('email')->comment('Received Person Email')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('section_requisitions');
    }
};
