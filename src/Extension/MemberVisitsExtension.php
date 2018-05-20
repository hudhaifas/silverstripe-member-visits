<?php

use SilverStripe\Forms\FieldList;
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
        'LastVisited' => 'Datetime'
    ];

    public function addVisit() {
        $this->owner->NumVisit++;
    }

    public function beforeMemberLoggedIn() {
        $this->owner->addVisit();
    }

    public function updateCMSFields(FieldList $fields) {
        $fields->removeFieldFromTab('Root.Main', 'NumVisit');
        $fields->removeFieldFromTab('Root.Main', 'LastVisited');
    }

}
