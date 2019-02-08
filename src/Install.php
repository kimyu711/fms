<?php
/**
 * Created by PhpStorm.
 * User: hero
 * Date: 07/02/2019
 * Time: 5:11 PM
 */

namespace XpressenginePlugin\XePlugin\Fms;


use App\Facades\XeDB;
use App\Facades\XeMenu;
use App\Facades\XeSite;
use Illuminate\Support\Facades\Artisan;
use XpressenginePlugin\XePlugin\Fms\Components\Themes\FmsMain\FmsMainTheme;

class Install
{
    public static function config()
    {

    }

    public static function menu()
    {
        XeDB::beginTransaction();
        try{
            $menu = XeMenu::creaeMenu([
                'title'=>'',
                'description'=>'',
                'site_key'=>XeSite::getCurrentSiteKey()
            ]);
            XeMenu::setMenuTheme($menu, FmsMainTheme::getId(), FmsMainTheme::getId());
            app('xe.permission')->register($menu->getKey(), XeMenu::getDefaultGrant());
        }catch(\Exception $e){
            XeDB::rollback();

            throw $e;
        }
        XeDB::commit();
        return $menu;
    }

    public static function menuItem($menu)
    {
        $menuItem = [
            'menu_id'=>$menu->id,
            'parent_id'=>null,
            'title'=>'fms메인'
        ];
    }

    public static function migration()
    {
        Artisan::call('migrate', [
            '--path'=>'plugins/fms/src/Migrations',
            '--force'=>true
        ]);
    }

    public static function reset()
    {
        Artisan::call('migrate:reset', [
            '--path'=>'plugins/fms/src/Migrations',
            '--force'=>true
        ]);
    }

    public static function refresh()
    {
        Artisan::call('migrate:refresh', [
            '--path'=>'plugins/fms/src/Migrations',
            '--force'=>true
        ]);
    }
}

