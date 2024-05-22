<?php

use App\Helpers\PowerGridThemes\TailwindStriped;
use PowerComponents\LivewirePowerGrid\Components\Exports\OpenSpout\v3\ExportToCsv;
use PowerComponents\LivewirePowerGrid\Components\Exports\OpenSpout\v3\ExportToXLS;
use PowerComponents\LivewirePowerGrid\Themes\Tailwind;

return [

    /*
    |--------------------------------------------------------------------------
    | Theme
    |--------------------------------------------------------------------------
    |
    | PowerGrid supports Tailwind and Bootstrap 5 themes.
    | Configure here the theme of your choice.
    */

    'theme' => Tailwind::class,
//    'theme' => Bootstrap5::class,

    /*
    |--------------------------------------------------------------------------
    | Plugins
    |--------------------------------------------------------------------------
    |
    | Plugins used: flatpickr.js to datepicker.
    |
    */

    'plugins' => [
        /*
         * https://flatpickr.js.org
         */
        'flatpickr' => [
            'locales' => [
                'it' => [
                    'locale' => 'it',
                    'dateFormat' => 'd M Y',
                    'enableTime' => false,
                    'time_24hr' => true,
                ],
            ],
        ],

        'select' => [
            'default' => 'tom',

            /*
             * TomSelect Options
             * https://tom-select.js.org
             */
            'tom' => [
                'plugins' => [
                    'clear_button' => [
                        'title' => 'Remove all selected options',
                    ],
                ],
            ],

            /*
             * Slim Select options
             * https://slimselectjs.com/
             */
            'slim' => [
                'settings' => [
                    'alwaysOpen' => false,
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Filters
    |--------------------------------------------------------------------------
    |
    | PowerGrid supports inline and outside filters.
    | 'inline': Filters data inside the table.
    | 'outside': Filters data outside the table.
    | 'null'
    |
    */

    'filter' => 'outside',

    /*
    |--------------------------------------------------------------------------
    | Persisting
    |--------------------------------------------------------------------------
    |
    | PowerGrid supports persisting of the filters, columns and sorting.
    | 'session': persist in the session.
    | 'cookies': persist with cookies (default).
    |
    */

    'persist_driver' => 'cookies',

    /*
    |--------------------------------------------------------------------------
    | Cache
    |--------------------------------------------------------------------------
    |
    | Cache is enabled by default to improve search performance when using collections.
    | When enabled, data is reloaded whenever the page is refreshed or a field is updated.
    |
    */

    'cached_data' => true,

    /*
    |--------------------------------------------------------------------------
    | New Release Notification
    |--------------------------------------------------------------------------
    |
    | PowerGrid can verify if a new release is available when you create a new PowerGrid Table.
    |
    | This feature depends on composer/composer.
    | To install, run: `composer require composer/composer --dev`
    |
    */

    'check_version' => false,

    /*
    |--------------------------------------------------------------------------
    | Exportable class
    |--------------------------------------------------------------------------
    |
    |
    */

    'exportable' => [
        'default' => 'openspout_v4',
        'openspout_v4' => [
            'xlsx' => \PowerComponents\LivewirePowerGrid\Components\Exports\OpenSpout\v4\ExportToXLS::class,
            'csv' => \PowerComponents\LivewirePowerGrid\Components\Exports\OpenSpout\v4\ExportToCsv::class,
        ],
        'openspout_v3' => [
            'xlsx' => ExportToXLS::class,
            'csv' => ExportToCsv::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Auto-Discover Models
    |--------------------------------------------------------------------------
    |
    | PowerGrid will search for Models in the directories listed below.
    | These Models be listed as options when you run the
    | "artisan powergrid:create" command.
    |
    */

    'auto_discover_models_paths' => [
        app_path('Models'),
    ],
];
