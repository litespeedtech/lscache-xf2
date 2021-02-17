<?php

/**
 *
 * @since 2.2.3
 */

namespace LiteSpeedCache\XF\Pub\Controller;

use \XF;
use \XF\Mvc\ParameterBag;

class Forum extends XFCP_Forum
{

    public function checkCsrfIfNeeded( $action, ParameterBag $params )
    {
        if ( $action == 'PostThread' || $action == 'Draft' ) {
            $visitor = XF::visitor();

            if ( !$visitor['user_id'] || $visitor['user_id'] == 0 ) {
                return;
            }
        }

        parent::checkCsrfIfNeeded($action, $params);
    }

}