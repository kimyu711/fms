<?php

namespace XpressenginePlugin\XePlugin\Fms\Controllers\Admin;

use App\Facades\XePresenter;

class DashboardController extends LayoutController
{

    public function index()
    {
        return XePresenter::make('fms::views.admin.dashboard.index');
    }
}
