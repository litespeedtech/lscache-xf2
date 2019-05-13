<?php

/**
 *
 * @since 2.1.0
 *
 * Contributions By: Jean-Baptiste Chauvin (foro.agency)
 */

namespace LiteSpeedCache\XF\Pub\Controller;

use \XF\Mvc\ParameterBag;

class Login extends XFCP_Login
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
