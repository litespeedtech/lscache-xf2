<?php

/**
 *
 * @since 2.2.0
 */

namespace LiteSpeedCache\XF\ControllerPlugin;

use LiteSpeedCache\Listener as LscListener;

class Login extends XFCP_Login
{
    public function completeLogin( \XF\Entity\User $user, $remember )
    {
        if ( $user->user_id !== \XF::visitor()->user_id ) {
            /**
             * Set custom cookie to better track logged in state when
             * "Stay logged in" is unchecked.
             */
            \XF::app()->response()->
                    setCookie(LscListener::LOGGED_IN_COOKIE_NAME, 1);
        }

       parent::completeLogin($user, $remember);
    }

}

