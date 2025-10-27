<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stock_in_details', function (Blueprint $table) {
            $table->id();
            $table->integer('stock_in_id')->nullable();
            $table->integer('product_information_id')->nullable();
            $table->string('po_no')->nullable();
            $table->date('po_date')->nullable();
            $table->integer('po_qty')->nullable();
            $table->integer('receive_qty')->nullable();
            $table->integer('reject_qty')->nullable();
            $table->integer('available_qty')->nullable();
            $table->integer('dispatch_qty')->nullable();
            $table->integer('prev_receive_qty')->nullable();
            $table->date('mfg_date')->nullable();
            $table->date('expire_date')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_in_details');
    }
};
