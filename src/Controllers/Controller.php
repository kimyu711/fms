<?php
namespace XpressenginePlugin\XePlugin\Fms\Controllers;

use XeFrontend;
use XePresenter;
use App\Http\Controllers\Controller as BaseController;
use XpressenginePlugin\XePlugin\Fms\Plugin;

class Controller extends BaseController
{
    public function index()
    {
        $title = 'Fms plugin';

        // set browser title
        XeFrontend::title($title);

        // load css file
        XeFrontend::css(Plugin::asset('assets/style.css'))->load();

        // output
        return XePresenter::make('fms::views.index', ['title' => $title]);
    }
}
