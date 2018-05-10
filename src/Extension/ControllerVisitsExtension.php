<?php

use SilverStripe\Control\Session;
use SilverStripe\ORM\DataExtension;
use SilverStripe\ORM\DB;
use SilverStripe\Security\Member;
use SilverStripe\Security\Security;

/**
 *
 * @author Hudhaifa Shatnawi <hudhaifa.shatnawi@gmail.com>
 * @version 1.0, Apr 27, 2018 - 10:27:12 AM
 */
class ControllerVisitsExtension
        extends DataExtension {

    public function onAfterInit() {
        // Directly access the session variable just in case the Group or Member tables don't yet exist
        if (Session::get('loggedInAs') && Security::database_is_ready() && ($member = Member::currentUser())) {
            DB::prepared_query(
                    sprintf('UPDATE "Member" SET "LastVisited" = %s WHERE "ID" = ?', DB::get_conn()->now()), [
                $member->ID
            ]);
        }
    }

}
