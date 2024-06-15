<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        $role = Role::create([
            'name' => Role::$SUPERUSER,
            'label' => 'Superuser',
        ]);

        User::find(1)->role()->associate($role)->save();
    }
};
