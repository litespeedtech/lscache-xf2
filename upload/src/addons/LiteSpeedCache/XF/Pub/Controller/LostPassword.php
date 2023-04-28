<?php

/**
 *
 * @since 2.1.1
 */

namespace LiteSpeedCache\XF\Pub\Controller;

use XF;
use XF\Mvc\ParameterBag;

class LostPassword extends XFCP_LostPassword
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
