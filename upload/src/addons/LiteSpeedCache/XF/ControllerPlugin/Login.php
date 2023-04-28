<?php

/**
 *
 * @since 2.2.0
 */

namespace LiteSpeedCache\XF\ControllerPlugin;

use LiteSpeedCache\Listener as LscListener;
use XF;
use XF\Entity\User;

class Login extends XFCP_Login
{
    /**
     *
     * @noinspection PhpUnused
     */
    public function completeLogin( User $user, $remember )
    {
        if ( $user->user_id !== XF::visitor()->user_id ) {
            /**
             * Set custom cookie to better track logged in state when
             * "Stay logged in" is unchecked.
             */
            XF::app()->response()
            ->setCookie(LscListener::LOGGED_IN_COOKIE_NAME, 1)
            ;
        }

        /** @noinspection PhpUndefinedClassInspection */
        parent::completeLogin($user, $remember);
    }

}

