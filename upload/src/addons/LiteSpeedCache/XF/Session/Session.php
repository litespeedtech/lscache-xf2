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
        \XF::app()->response()->
                removeCookie(LscListener::LOGGED_IN_COOKIE_NAME);

		parent::logoutUser();
	}
}