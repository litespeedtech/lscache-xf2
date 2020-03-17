<?php

/**
 *
 * @since 2.2.2
 */

namespace LiteSpeedCache\XF\Pub\Controller;

use \XF\Mvc\ParameterBag;

class Misc extends XFCP_Misc
{

    public function validateCsrfToken($token = null, &$error = null, $validityPeriod = null)
    {
        $visitor = \XF::visitor();

        if ( $visitor['user_id'] && $visitor['user_id'] != 0 ) {
            parent::validateCsrfToken($token, $error, $validityPeriod);
        }
        // else bypass check
        return true;
    }

}