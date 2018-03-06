<?php
/**
 *
 * @since 1.0.0
 *
 * Contributions By: Jean-Baptiste Chauvin (foro.agency)
 */

namespace LiteSpeedCache\XF\ControllerPublic;

use XF\Mvc\ParameterBag;

class Login extends XFCP_Login
{

    public function checkCsrfIfNeeded( $action, ParameterBag $params )
    {
        if ( $this->isPost() ) {
            return;
        }

        return;
        // parent::checkCsrfIfNeeded($action, $params);
    }

}
