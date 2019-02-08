<?php

namespace XpressenginePlugin\XePlugin\Fms\Models;

use Xpressengine\Database\Eloquent\DynamicModel;

class Facility extends DynamicModel
{
    public $incrementing=false;
    protected $table = 'fms_facility';
}
