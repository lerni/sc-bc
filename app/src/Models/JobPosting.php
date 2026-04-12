<?php

namespace App\Models;

use SilverStripe\ORM\DataObject;

class JobPosting extends DataObject
{
    private static $db = [
        'Title' => 'Varchar(255)',
        'Description' => 'Text',
        'Active' => 'Boolean',
        'Sort' => 'Int',
    ];

    private static $table_name = 'JobPosting';

    private static $singular_name = 'Job Posting';
    private static $plural_name = 'Job Postings';

    private static $summary_fields = [
        'Title',
        'Active.Nice' => 'Active',
    ];

    private static $default_sort = 'Sort ASC';
}
