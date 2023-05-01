<?php

/**
 *
 * @since 2.2.0
 */

namespace LiteSpeedCache\XF\Session;

use LiteSpeedCache\Listener as LscListener;
use XF;
use XF\Entity\User;

class Session extends XFCP_Session
{

    /**
     *
     * @noinspection PhpUnused
     */
    public function logoutUser()
	{
        XF::app()->response()
        ->setCookie(LscListener::LOGGED_IN_COOKIE_NAME, false)
        ;

        /** @noinspection PhpUndefinedClassInspection */
        parent::logoutUser();
	}

    /**
     *
     * @since 2.3.0
     *
     * @param User $user
     *
     * @return \XF\Session\Session
     *
     * @noinspection PhpUnused
     */
    public function changeUser( User $user)
    {
        $userId = $user->user_id;

        if ( $userId != 0 ) {
            XF::app()->response()
            ->setCookie(LscListener::LOGGED_IN_COOKIE_NAME, 1)
            ;
        }
        else {
            XF::app()->response()
            ->setCookie(LscListener::LOGGED_IN_COOKIE_NAME, false)
            ;
        }

        LscListener::$userChangedTo = $userId;

        /** @noinspection PhpUndefinedClassInspection */
        return parent::changeUser($user);
    }

}