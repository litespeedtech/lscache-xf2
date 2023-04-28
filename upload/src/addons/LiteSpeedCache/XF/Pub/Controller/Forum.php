<?php

/**
 *
 * @since 2.2.3
 */

namespace LiteSpeedCache\XF\Pub\Controller;

use XF;
use XF\Mvc\ParameterBag;

class Forum extends XFCP_Forum
{

    public function checkCsrfIfNeeded( $action, ParameterBag $params )
    {
        if ( $action == 'PostThread' || $action == 'Draft' ) {

            if ( XF::visitor()->user_id == 0 ) {
                return;
            }
        }

        /** @noinspection PhpUndefinedClassInspection */
        parent::checkCsrfIfNeeded($action, $params);
    }

}