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
        Schema::create('status_histories', function (Blueprint $table) {
            $table->id()->index();
            $table->enum('status', [
                'pending_doctor', 'approved_doctor', 'rejected_doctor',
                'pending_verification', 'pending_supporter', 'approved_supporter',
                'rejected_supporter', 'payment_pending', 'completed'
            ])->index()->comment('Trạng thái của lịch hẹn');
        
            //pending_doctor: when supporter create a new schedule and wait for doctor to approve.
            //approved_doctor: when doctor approve the schedule.
            //rejected_doctor: when doctor reject the schedule.
            //pending_verification: when patient book a schedule and wait for system to verify.
            //pending_supporter: when patient book a schedule and wait for supporter to approve.
            //approved_supporter: when supporter approve the patient.
            //rejected_supporter: when supporter reject the patient.
            //payment_pending: when patient was approved and waiting for payment.
            //completed: when patient complete the payment. End of the process.




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_histories');
    }
};
