<?php

namespace App\Admin;

use App\Models\JobPosting;
use App\Models\JobDefaults;
use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;

class JobsAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $managed_models = [
        JobPosting::class,
        // SomeConfig class cannot be first
        JobDefaults::class,
    ];

    private static $url_segment = 'jobs';
    private static $menu_title = 'Jobs';
    private static $menu_icon_class = 'font-icon-torso';
}
