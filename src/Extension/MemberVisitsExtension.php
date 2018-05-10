<?php

use SilverStripe\ORM\DataExtension;

/**
 *
 * @author Hudhaifa Shatnawi <hudhaifa.shatnawi@gmail.com>
 * @version 1.0, Apr 27, 2018 - 10:27:12 AM
 */
class MemberVisitsExtension
        extends DataExtension {

    private static $db = [
        'NumVisit' => 'Int',
        'LastVisited' => 'SS_Datetime'
    ];

}