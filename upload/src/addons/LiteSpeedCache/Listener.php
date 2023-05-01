<?php

/**
 *
 * @copyright (C) 2018-2023 LiteSpeed Technologies, Inc.
 * @link     https://www.litespeedtech.com
 * @since    2.0.0
 *
 * Contributions By: Jean-Baptiste Chauvin (foro.agency)
 *
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace LiteSpeedCache;

use XF;
use XF\Admin\Controller\AbstractController;
use XF\App;
use XF\Http\Response;
use XF\Mvc\Controller;
use XF\Mvc\ParameterBag;
use XF\Mvc\Reply\AbstractReply;
use XF\Pub\Controller\Login;
use XF\Pub\Controller\Register;

class Listener
{

    /**
     * @var string
     */
    const LOGGED_IN_COOKIE_NAME = 'lscxf_logged_in';

    /**
     * @since 2.3.0
     * @var null|int
     */
    public static $userChangedTo = null;

    /**
     *
     * @noinspection PhpUnused
     * @noinspection PhpUnusedParameterInspection
     * @noinspection PhpParameterByRefIsNotUsedAsReferenceInspection
     */
    public static function emptyCacheForLoggedUser(
        App      $app,
        Response &$response )
    {
        if ( XF::visitor()->user_id != 0 ) {
            $response->header('X-LiteSpeed-Cache-Control', 'no-cache');
        }
        else {
            $response->setCookie(self::LOGGED_IN_COOKIE_NAME, false);
        }
    }

    /**
     *
     * @noinspection PhpUnused
     * @noinspection PhpUnusedParameterInspection
     * @noinspection PhpParameterByRefIsNotUsedAsReferenceInspection
     */
    public static function doNotCachePages(
        Controller    $controller,
                      $action,
        ParameterBag  $params,
        AbstractReply &$reply )
    {
        if ( $controller instanceof Login
                || $controller instanceof Register
                || $controller instanceof AbstractController) {

            self::sendNoCacheHeader();
            return;
        }

        if ( method_exists($reply, 'getViewClass') ) {
            $isDoNotCacheView = in_array(
                $reply->getViewClass(),
                array(
                    "XF:Error\RegistrationRequired",
                    "XF:Error\Server",
                    "XF:Login\TwoStep",
                    "XF:LostPassword\Confirm"
                )
            );

            if ( $isDoNotCacheView ) {
                self::sendNoCacheHeader();
                return;
            }
        }

        if ( method_exists($reply, 'getResponseCode') ) {
            $isCacheableResponseCode =
                in_array($reply->getResponseCode(), array(200, 404));

            if ( !$isCacheableResponseCode ) {
                self::sendNoCacheHeader();
            }
        }
    }

    private static function sendNoCacheHeader()
    {
        header('X-LiteSpeed-Cache-Control: no-cache');
    }

}