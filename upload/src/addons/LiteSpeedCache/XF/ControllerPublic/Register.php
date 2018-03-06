<?php
/**
 *
 * @since 1.0.0
 *
 * Contributions By: Jean-Baptiste Chauvin (foro.agency)
 */

namespace LiteSpeedCache\XF\ControllerPublic;

use XF\Mvc\ParameterBag;

class Register extends XFCP_Register
{

    public function checkCsrfIfNeeded( $action, ParameterBag $params )
    {
        return;
        // parent::checkCsrfIfNeeded($action, $params);
    }

}
