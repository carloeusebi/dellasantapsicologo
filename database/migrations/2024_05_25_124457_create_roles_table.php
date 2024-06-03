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
                $table->string('label');
            });
        }

        $adminRole = Role::create(['name' => Role::$ADMIN, 'label' => 'Amministratore']);
        $doctorRole = Role::create(['name' => Role::$DOCTOR, 'label' => 'Dottore']);
        Role::create(['name' => Role::$PATIENT, 'label' => 'Paziente']);

        if (!Schema::hasColumn('users', 'role_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->foreignIdFor(Role::class)->after('id')->constrained()->nullOnDelete();
            });
        }

        if (!Schema::hasColumn('users', 'name')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('name')->after('role_id');
            });
        }

        User::find(2)?->role()->associate($adminRole)->save();
        User::whereDoesntHave('role')->get()->each(function (User $user) use ($doctorRole) {
            $user->role()->associate($doctorRole)->save();
        });

        $doctor = User::find(1);

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
