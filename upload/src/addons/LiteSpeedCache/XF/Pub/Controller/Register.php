<?php

/**
 *
 * @since 2.1.0
 *
 * Contributions By: Jean-Baptiste Chauvin (foro.agency)
 */

namespace LiteSpeedCache\XF\Pub\Controller;

use XF;
use XF\Mvc\ParameterBag;

class Register extends XFCP_Register
{

    public function checkCsrfIfNeeded( $action, ParameterBag $params )
    {
        if ( XF::visitor()->user_id == 0 ) {
            return;
        }

        /** @noinspection PhpUndefinedClassInspection */
        parent::checkCsrfIfNeeded($action, $params);
    }

}
