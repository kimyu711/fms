<?php

namespace XpressenginePlugin\XePlugin\Fms\Controllers\User;

use App\Facades\XePresenter;
use XpressenginePlugin\XePlugin\Fms\Controllers\MainController;
use XpressenginePlugin\XePlugin\Fms\Models\Facility;

class EnergeController extends MainController
{
    public function index(Facility $facility)
    {
        return XePresenter::make('fms::views.user.energe.index');
    }
    public function create(Facility $facility)
    {
        return XePresenter::make('fms::views.user.energe.create');
    }
    public function edit(Facility $facility)
    {
        return XePresenter::make('fms::views.user.energe.edit');
    }
    public function print(Facility $facility)
    {
        return XePresenter::make('fms::views.user.energe.print');
    }
}
