<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('department_requisitions', function (Blueprint $table) {
            $table->id();
            $table->string('requisition_no');
            $table->bigInteger('user_id');
            $table->integer('department_id')->nullable();
            $table->integer('status')->nullable()->comment('0=Created, 1=Department Approved, 2=Rejected, 3=Final Approved');
            $table->bigInteger('final_approve_by')->nullable();
            $table->dateTime('final_created_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('department_requisitions');
    }
};
