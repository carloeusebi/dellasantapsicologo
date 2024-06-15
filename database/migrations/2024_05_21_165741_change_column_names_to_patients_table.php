<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->foreignIdFor(User::class)->after('id')->nullable()->constrained()->cascadeOnDelete();
            $table->renameColumn('fname', 'first_name');
            $table->renameColumn('lname', 'last_name');
            $table->renameColumn('sex', 'gender');
            $table->renameColumn('birthday', 'birth_date');
            $table->renameColumn('birthplace', 'birth_place');
            $table->renameColumn('begin', 'therapy_start_date');
            $table->softDeletes();
            $table->archivedAt();
        });
    }

    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(User::class);
            $table->renameColumn('first_name', 'fname');
            $table->renameColumn('last_name', 'lname');
            $table->renameColumn('gender', 'sex');
            $table->renameColumn('birth_date', 'birthday');
            $table->renameColumn('birth_place', 'birthplace');
            $table->renameColumn('therapy_start_date', 'begin');
            $table->dropSoftDeletes();
            $table->dropColumn('archived_at');
        });
    }
};
