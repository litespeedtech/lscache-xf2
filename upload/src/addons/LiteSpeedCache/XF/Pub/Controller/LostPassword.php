<?php

/**
 *
 * @since 2.1.1
 */

namespace LiteSpeedCache\XF\Pub\Controller;

use \XF\Mvc\ParameterBag;

class LostPassword extends XFCP_LostPassword
{

    public function checkCsrfIfNeeded( $action, ParameterBag $params )
    {
        $visitor = \XF::visitor();

        if ( $visitor['user_id'] && $visitor['user_id'] != 0 ) {
            parent::checkCsrfIfNeeded($action, $params);
        }
        // else bypass check
    }

}
