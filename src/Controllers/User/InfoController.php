<?php

namespace XpressenginePlugin\XePlugin\Fms\Controllers\User;

use App\Facades\XePresenter;
use XpressenginePlugin\XePlugin\Fms\Controllers\MainController;
use XpressenginePlugin\XePlugin\Fms\Models\Facility;

class InfoController extends MainController
{
    public function index(Facility $facility)
    {
        return XePresenter::make('fms::views.user.asset.index');
    }
    public function create(Facility $facility)
    {
        return XePresenter::make('fms::views.user.asset.create');
    }
    public function edit(Facility $facility)
    {
        return XePresenter::make('fms::views.user.asset.edit');
    }

}
