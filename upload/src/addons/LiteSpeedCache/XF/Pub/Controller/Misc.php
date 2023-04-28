<?php

/**
 *
 * @since 2.2.2
 */

namespace LiteSpeedCache\XF\Pub\Controller;

use XF;

class Misc extends XFCP_Misc
{

    /**
     *
     * @noinspection PhpUnused
     */
    public function validateCsrfToken(
        $token = null,
        &$error = null,
        $validityPeriod = null)
    {
        if ( XF::visitor()->user_id == 0 ) {
            return true;
        }

        /** @noinspection PhpUndefinedClassInspection */
        return parent::validateCsrfToken($token, $error, $validityPeriod);
    }

}