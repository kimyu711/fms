<?php
/**
 * Created by PhpStorm.
 * User: hero
 * Date: 07/02/2019
 * Time: 5:16 PM
 */

namespace XpressenginePlugin\XePlugin\Fms;


use Illuminate\Support\Facades\Artisan;
use XpressenginePlugin\XePlugin\Fms\Models\Facility;

class Dev
{
    public static function makeMigration($name)
    {
        Artisan::call('make:migration', [
            '--path'=>'plugins/fms/src/Migrations',
            'name'=>$name
        ]);
    }

    public static function makeFacility($name)
    {
        $facility = new Facility();
        $facility->name = $name;
        $facility->save();
        return $facility;
    }
}
