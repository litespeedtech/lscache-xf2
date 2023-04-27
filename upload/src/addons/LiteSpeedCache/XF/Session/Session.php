<?php

/**
 *
 * @since 2.2.0
 */

namespace LiteSpeedCache\XF\Session;

use LiteSpeedCache\Listener as LscListener;

class Session extends XFCP_Session
{

    public function logoutUser()
	{
        /**
         * Remove custom login tracking cookie on logout.
         */
        $response = \XF::app()->response();
        $response->setCookie(LscListener::LOGGED_IN_COOKIE_NAME, false);

		parent::logoutUser();
	}

    public function changeUser(\XF\Entity\User $user)
    {
        if ( $user->user_id != 0 ) {
            \XF::app()->response()
            ->setCookie(LscListener::LOGGED_IN_COOKIE_NAME, 1)
            ;
        }
        else {
            \XF::app()->response()
            ->setCookie(LscListener::LOGGED_IN_COOKIE_NAME, false)
            ;
        }

        return parent::changeUser($user);
    }

}