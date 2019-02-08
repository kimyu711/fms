<?php

namespace XpressenginePlugin\XePlugin\Fms\Controllers\Admin;

use App\Facades\XePresenter;
use App\Themes\SettingsTheme;
use XpressenginePlugin\XePlugin\Fms\Controllers\Controller;

class LayoutController extends Controller
{
    public function __construct()
    {
        $themeHandler = \XePresenter::getThemeHandler();
        $settingsTheme = SettingsTheme::getId();
        $themeHandler->selectTheme($settingsTheme);
    }
}
