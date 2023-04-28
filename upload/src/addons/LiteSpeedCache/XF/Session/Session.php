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
     * @since release_ver_placeholder
     *
     * @param User $user
     *
     * @return \XF\Session\Session
     *
     * @noinspection PhpUnused
     */
    public function changeUser( User $user)
    {
        if ( $user->user_id != 0 ) {
            XF::app()->response()
            ->setCookie(LscListener::LOGGED_IN_COOKIE_NAME, 1)
            ;
        }
        else {
            XF::app()->response()
            ->setCookie(LscListener::LOGGED_IN_COOKIE_NAME, false)
            ;
        }

        /** @noinspection PhpUndefinedClassInspection */
        return parent::changeUser($user);
    }

}