<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    //
    function migration()
    {
        // return 1;
        try {
            // $output =
            Artisan::call('migrate', [
                // '--path' => '/database/migrations',
                // '--database' => 'u621336810_despachos',
                '--force' => true
            ]);
            return response()->json(Artisan::output());
            // return response()->json(true);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    function rollback()
    {
        // return 1;
        try {
            // $output =
            Artisan::call('migrate:rollback', [
                // '--path' => '/database/migrations',
                // '--database' => 'u621336810_despachos',
                '--force' => true
            ]);
            return response()->json(Artisan::output());
            // return response()->json(true);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    function optimize_cache()
    {
        // return 1;
        try {
            // $output =
            Artisan::call('optimize:clear', [
                // '--path' => '/database/migrations',
                // '--database' => 'u621336810_despachos',
                // '--force' => true
            ]);

            return response()->json(Artisan::output());
            // return response()->json(true);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    function migration_status()
    {
        // return 1;
        try {
            // $output =
            Artisan::call('migrate:status', [
                // '--path' => '/database/migrations',
                // '--database' => 'u621336810_despachos',
                // '--force' => true
            ]);
            return response()->json(Artisan::output());
            // return response()->json(true);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
