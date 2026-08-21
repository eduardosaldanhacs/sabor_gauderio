<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('users', fn (Blueprint $table) => $table->string('name', 80)->nullable()->after('id'));
        DB::table('users')->whereNull('name')->update(['name' => DB::raw('username')]);
    }
    public function down(): void {
        Schema::table('users', fn (Blueprint $table) => $table->dropColumn('name'));
    }
};
