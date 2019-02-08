<?php

namespace XpressenginePlugin\XePlugin\Fms\Controllers\Admin;

use App\Facades\XePresenter;

class FacilityController extends LayoutController
{

    public function index()
    {
        return XePresenter::make('fms::views.admin.facility.index');
    }
}
