<?php
namespace XpressenginePlugin\XePlugin\Fms;

use Route;
use Xpressengine\Plugin\AbstractPlugin;

class Plugin extends AbstractPlugin
{
    /**
     * 이 메소드는 활성화(activate) 된 플러그인이 부트될 때 항상 실행됩니다.
     *
     * @return void
     */
    public function boot()
    {
        // implement code

        $this->route();
    }

    protected function route()
    {
        // implement code

        Route::fixed(
            $this->getId(),
            function () {
                Route::get('/', [
                    'as' => 'fms::index','uses' => 'XpressenginePlugin\XePlugin\Fms\Controllers\Controller@index'
                ]);
            }
        );

        Route::group(['prefix'=>'{facility}', 'namespace'=>'XpressenginePlugin\XePlugin\Fms\Controllers\User'], function (){

            Route::group(['prefix'=>'info'], function (){

                Route::get('/', [
                    'as'=>'fms.info.index',
                    'uses'=>'InfoController@index'
                ]);

                Route::get('edit', [
                    'as'=>'fms.info.edit',
                    'uses'=>'InfoController@edit'
                ]);
            });

            Route::group(['prefix'=>'asset/{type}'], function (){
                Route::get('/', [
                    'as'=>'fms.asset.index',
                    'uses'=>'AssetController@index'
                ]);
                Route::get('create', [
                    'as'=>'fms.asset.create',
                    'uses'=>'AssetController@create'
                ]);
                Route::get('edit', [
                    'as'=>'fms.asset.edit',
                    'uses'=>'AssetController@edit'
                ]);
            });

            Route::group(['prefix'=>'energe'], function (){
                Route::get('/', [
                    'as'=>'fms.energe.index',
                    'uses'=>'EnergeController@index'
                ]);
                Route::get('create', [
                    'as'=>'fms.energe.create',
                    'uses'=>'EnergeController@create'
                ]);
                Route::get('edit', [
                    'as'=>'fms.energe.edit',
                    'uses'=>'EnergeController@edit'
                ]);
                Route::get('print', [
                    'as'=>'fms.energe.print',
                    'uses'=>'EnergeController@print'
                ]);
            });

            Route::group(['prefix'=>'report'], function (){

                Route::group(['prefix'=>'generator'], function (){
                    Route::get('/', [
                        'as'=>'fms.generator.index',
                        'uses'=>'GeneratorController@index'
                    ]);
                    Route::get('create', [
                        'as'=>'fms.generator.create',
                        'uses'=>'GeneratorController@create'
                    ]);
                    Route::get('edit', [
                        'as'=>'fms.generator.edit',
                        'uses'=>'GeneratorController@edit'
                    ]);
                    Route::get('print', [
                        'as'=>'fms.generator.print',
                        'uses'=>'GeneratorController@print'
                    ]);
                });

                Route::group(['prefix'=>'guage'], function (){
                    Route::get('/', [
                        'as'=>'fms.guage.index',
                        'uses'=>'GuageController@index'
                    ]);
                    Route::get('create', [
                        'as'=>'fms.guage.create',
                        'uses'=>'GuageController@create'
                    ]);
                    Route::get('edit', [
                        'as'=>'fms.guage.edit',
                        'uses'=>'GuageController@edit'
                    ]);
                    Route::get('print', [
                        'as'=>'fms.guage.print',
                        'uses'=>'GuageController@print'
                    ]);
                });


                Route::group(['prefix'=>'{term}'], function (){
                    Route::get('/', [
                        'as'=>'fms.term.index',
                        'uses'=>'TermController@index'
                    ]);
                    Route::get('create', [
                        'as'=>'fms.term.create',
                        'uses'=>'TermController@create'
                    ]);
                    Route::get('edit', [
                        'as'=>'fms.term.edit',
                        'uses'=>'TermController@edit'
                    ]);
                    Route::get('print', [
                        'as'=>'fms.term.print',
                        'uses'=>'TermController@print'
                    ]);
                });
            });

            Route::group(['prefix'=>'notice'], function (){
                Route::get('/', [
                    'as'=>'fms.notice.index',
                    'uses'=>'NoticeController@index'
                ]);
                Route::get('create', [
                    'as'=>'fms.notice.create',
                    'uses'=>'NoticeController@create'
                ]);
                Route::get('edit', [
                    'as'=>'fms.notice.edit',
                    'uses'=>'NoticeController@edit'
                ]);
                Route::get('print', [
                    'as'=>'fms.notice.show',
                    'uses'=>'NoticeController@print'
                ]);
            });

            Route::group(['prefix'=>'process'], function (){
                Route::get('/', [
                    'as'=>'fms.process.index',
                    'uses'=>'ProcessController@index'
                ]);
                Route::get('create', [
                    'as'=>'fms.process.create',
                    'uses'=>'ProcessController@create'
                ]);
                Route::get('edit', [
                    'as'=>'fms.process.edit',
                    'uses'=>'ProcessController@edit'
                ]);
                Route::get('print', [
                    'as'=>'fms.process.show',
                    'uses'=>'ProcessController@print'
                ]);
            });

            Route::group(['prefix'=>'file'], function (){
                Route::get('/', [
                    'as'=>'fms.file.index',
                    'uses'=>'FileController@index'
                ]);
                Route::get('create', [
                    'as'=>'fms.file.create',
                    'uses'=>'FileController@create'
                ]);
                Route::get('edit', [
                    'as'=>'fms.file.edit',
                    'uses'=>'FileController@edit'
                ]);
                Route::get('print', [
                    'as'=>'fms.file.show',
                    'uses'=>'FileController@print'
                ]);
            });
        });

        Route::group(['prefix'=>'fmsAdmin','namespace'=>'XpressenginePlugin\XePlugin\Fms\Controllers\Admin'], function(){

            Route::get('dashboard', [
                'as'=>'fms.admin.dashboard',
                'uses'=>'DashboardController@index',
                'settings_menu'=>'fms.settings.dashboard'
            ]);

            Route::group(['prefix'=>'user'], function (){
                Route::get('/', [
                    'as'=>'fms.admin.user',
                    'uses'=>'UserController@index',
                    'settings_menu'=>'fms.settings.user'
                ]);
            });

            Route::group(['prefix'=>'spc'], function (){
                Route::get('/', [
                    'as'=>'fms.admin.spc',
                    'uses'=>'SpcController@index',
                    'settings_menu'=>'fms.settings.spc'
                ]);
            });

            Route::group(['prefix'=>'facility'], function (){
                Route::get('/', [
                    'as'=>'fms.admin.facility',
                    'uses'=>'FacilityController@index',
                    'settings_menu'=>'fms.settings.facility'
                ]);
            });

        });

        \XeRegister::push('settings/menu', 'fms.settings.dashboard', [
            'title'=>'대시보드',
            'display' => true,
            'description' => 'fms 관리자 전용 대시보드',
            'ordering' => 10000
        ]);
        \XeRegister::push('settings/menu', 'fms.settings.user', [
            'title'=>'사용자관리',
            'display' => true,
            'description' => 'fms 관리자 전용 사용자 대시보드',
            'ordering' => 10001
        ]);
        \XeRegister::push('settings/menu', 'fms.settings.spc', [
            'title'=>'spc관리',
            'display' => true,
            'description' => 'fms 관리자 전용 spc 목록',
            'ordering' => 10002
        ]);
        \XeRegister::push('settings/menu', 'fms.settings.facility', [
            'title'=>'현장관리',
            'display' => true,
            'description' => 'fms 관리자 전용 현장 목록',
            'ordering' => 10003
        ]);

    }

    /**
     * 플러그인이 활성화될 때 실행할 코드를 여기에 작성한다.
     *
     * @param string|null $installedVersion 현재 XpressEngine에 설치된 플러그인의 버전정보
     *
     * @return void
     */
    public function activate($installedVersion = null)
    {
        // implement code
    }

    /**
     * 플러그인을 설치한다. 플러그인이 설치될 때 실행할 코드를 여기에 작성한다
     *
     * @return void
     */
    public function install()
    {
        // implement code
    }

    /**
     * 해당 플러그인이 설치된 상태라면 true, 설치되어있지 않다면 false를 반환한다.
     * 이 메소드를 구현하지 않았다면 기본적으로 설치된 상태(true)를 반환한다.
     *
     * @return boolean 플러그인의 설치 유무
     */
    public function checkInstalled()
    {
        // implement code

        return parent::checkInstalled();
    }

    /**
     * 플러그인을 업데이트한다.
     *
     * @return void
     */
    public function update()
    {
        // implement code
    }

    /**
     * 해당 플러그인이 최신 상태로 업데이트가 된 상태라면 true, 업데이트가 필요한 상태라면 false를 반환함.
     * 이 메소드를 구현하지 않았다면 기본적으로 최신업데이트 상태임(true)을 반환함.
     *
     * @return boolean 플러그인의 설치 유무,
     */
    public function checkUpdated()
    {
        // implement code

        return parent::checkUpdated();
    }
}
