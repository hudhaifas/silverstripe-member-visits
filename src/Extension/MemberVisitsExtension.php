<?php

use SilverStripe\Core\Extension;
use SilverStripe\Forms\FieldList;

/**
 *
 * @author Hudhaifa Shatnawi <hudhaifa.shatnawi@gmail.com>
 * @version 1.0, Apr 27, 2018 - 10:27:12 AM
 */
class MemberVisitsExtension
        extends Extension {

    private static $db = [
        'NumVisit' => 'Int',
        'LastVisited' => 'Datetime'
    ];

    public function addVisit() {
        $this->owner->NumVisit++;
    }

    public function onBeforeMemberLoggedIn() {
        $this->owner->addVisit();
    }

    public function updateCMSFields(FieldList $fields) {
        $fields->removeFieldFromTab('Root.Main', 'NumVisit');
        $fields->removeFieldFromTab('Root.Main', 'LastVisited');
    }

}
