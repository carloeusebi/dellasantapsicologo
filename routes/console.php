<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('backup:run --only-db')->daily()->at('00:00');
Schedule::command('backup:run --only-files')->weekly();
Schedule::command('backup:run --only-files')->lastDayOfMonth();
Schedule::command('backup:clean')->weeklyOn(6, '23:00');

