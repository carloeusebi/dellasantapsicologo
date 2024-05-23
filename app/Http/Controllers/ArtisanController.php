<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    public function optimize()
    {
        Artisan::call('optimize');
        return 'optimized';
    }

    public function clear()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');

        return 'cleared';
    }

    public function migrate()
    {
        Artisan::call('migrate', ['--force' => true]);
        return 'migrated';
    }

    public function rollback()
    {
        Artisan::call('migrate:rollback', ['--force' => true]);
        return 'rollbacked';
    }
}
