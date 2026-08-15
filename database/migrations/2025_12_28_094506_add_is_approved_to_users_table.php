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
        Schema::table('users', function (Blueprint $user) {
            $user->boolean('is_approved')->default(false)->after('role');
        });

        // Set admin as approved by default
        \App\Models\User::where('role', 'admin')->update(['is_approved' => true]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $user) {
            $user->dropColumn('is_approved');
        });
    }
};
