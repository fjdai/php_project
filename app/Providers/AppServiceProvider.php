<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Đăng ký các service vào container (chạy TRƯỚC khi ứng dụng khởi động).
     */
    public function register(): void
    {
        
    }

    /**
     * Thực hiện các thiết lập khi ứng dụng khởi động.
     */
    public function boot(): void
    {
        //
    }
}
