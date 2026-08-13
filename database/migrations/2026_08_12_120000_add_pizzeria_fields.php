<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false)->after('active');
        });

        Schema::table('pizzas', function (Blueprint $table) {
            $table->string('category')->default('Tradicionais')->after('name');
            $table->boolean('available')->default(true)->after('image');
            $table->boolean('featured')->default(false)->after('available');
            $table->unsignedSmallInteger('prep_time')->default(25)->after('featured');
        });

        Schema::table('pedidos', function (Blueprint $table) {
            $table->string('channel')->default('site')->after('status');
            $table->string('payment_method')->nullable()->after('channel');
            $table->string('payment_status')->default('pendente')->after('payment_method');
            $table->decimal('delivery_fee', 8, 2)->default(0)->after('total');
            $table->text('notes')->nullable()->after('cep');
        });

        DB::table('users')->orderBy('id')->limit(1)->update(['is_admin' => true]);
    }

    public function down(): void
    {
        Schema::table('pedidos', fn (Blueprint $table) => $table->dropColumn(['channel', 'payment_method', 'payment_status', 'delivery_fee', 'notes']));
        Schema::table('pizzas', fn (Blueprint $table) => $table->dropColumn(['category', 'available', 'featured', 'prep_time']));
        Schema::table('users', fn (Blueprint $table) => $table->dropColumn('is_admin'));
    }
};
