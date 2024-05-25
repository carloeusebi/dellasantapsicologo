<?php

use App\Models\Patient;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->id();
                $table->string('name');
            });
        }

        $adminRole = Role::create(['name' => Role::$ADMIN]);
        $doctorRole = Role::create(['name' => Role::$DOCTOR]);

        if (!Schema::hasColumn('users', 'role_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->foreignIdFor(Role::class)->nullable()->after('id');
            });
        }

        $doctor = User::find(1)?->role()->associate($doctorRole)->save();
        User::find(2)?->role()->associate($adminRole)->save();

        Patient::withArchived()
            ->withTrashed()
            ->get()
            ?->each(function (Patient $patient) use ($doctor) {
                if (!$patient->user()->exists()) {
                    $patient->user()->associate($doctor)->save();
                }
            });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_id');
        });

        Schema::dropIfExists('roles');
    }
};
