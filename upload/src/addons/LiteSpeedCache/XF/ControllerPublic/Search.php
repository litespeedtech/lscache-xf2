<?php
/**
 *
 * @since 2.1.1
 *
 */

namespace LiteSpeedCache\XF\ControllerPublic;

use \XF\Mvc\ParameterBag;

class Search extends XFCP_Search
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
