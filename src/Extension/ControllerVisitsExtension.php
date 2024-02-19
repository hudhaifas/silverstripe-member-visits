<?php

use SilverStripe\ORM\DataExtension;
use SilverStripe\ORM\DB;
use SilverStripe\Security\Security;

/**
 *
 * @author Hudhaifa Shatnawi <hudhaifa.shatnawi@gmail.com>
 * @version 1.0, Apr 27, 2018 - 10:27:12 AM
 */
class ControllerVisitsExtension
        extends DataExtension {

    public function onAfterInit() {
        if (Security::database_is_ready() && ($member = Security::getCurrentUser())) {
            DB::prepared_query(
                    sprintf('UPDATE "Member" SET "LastVisited" = %s WHERE "ID" = ?', DB::get_conn()->now()), [
                $member->ID
            ]);
        }
    }

}
