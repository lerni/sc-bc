<?php

namespace App\Models;

use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use SilverStripe\View\TemplateGlobalProvider;

class JobDefaults extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig;

    private static $db = [
        'Industry' => 'Varchar',
        'DefaultLocation' => 'Varchar',
    ];

    private static $table_name = 'JobDefaults';
}
