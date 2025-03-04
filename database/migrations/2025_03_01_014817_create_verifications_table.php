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
        Schema::create('verifications', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->enum('status', [
                'captcha_pending', // Đang chờ xác minh CAPTCHA
                'otp_pending', // CAPTCHA đã xác minh, chờ OTP
                'verified', // Đã xác minh thành công
                'expired' // Hết hạn
            ])->default('captcha_pending')->comment('Trạng thái xác minh');

            $table->enum('method', ['email', 'sms'])->nullable()->comment('Phương thức xác minh (bước OTP)');
            
            $table->string('captcha_code')->nullable();
            $table->timestamp('captcha_expires_at')->nullable();
            
            $table->string('otp_code')->nullable();
            $table->timestamp('otp_expires_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifications');
    }
};
