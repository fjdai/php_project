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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary(); 
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['pending', 'failed', 'completed'])->index()->comment('Trạng thái giao dịch');
            $table->enum('type', ['momo', 'zalopay', 'vnpay'])->index()->comment('Phương thức thanh toán');

            $table->timestamp('transaction_date')->useCurrent();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
