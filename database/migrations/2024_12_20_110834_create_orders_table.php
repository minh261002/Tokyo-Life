<?php

use App\Enums\Order\PaymentMethod;
use App\Enums\Order\PaymentStatus;
use App\Enums\Order\ShippingMethod;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Order\OrderStatus;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('order_number')->unique();
            $table->string('province_id');
            $table->string('district_id');
            $table->string('ward_id');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('note')->nullable();
            $table->enum('status', OrderStatus::getValues())->default(OrderStatus::Pending);
            $table->enum('payment_status', PaymentStatus::getValues())->default(PaymentStatus::Pending);
            $table->enum('payment_method', PaymentMethod::getValues())->default(PaymentMethod::Cash);
            $table->enum('shipping_method', ShippingMethod::getValues())->default(ShippingMethod::GHTK);
            $table->decimal('shipping_fee', 15, 0)->default(0);
            $table->decimal('discount', 15, 0)->default(0);
            $table->decimal('total_price', 15, 0)->default(0);
            $table->text('cancel_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
