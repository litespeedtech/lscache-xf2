<?php

/**
 *
 * @copyright (C) 2018 LiteSpeed Technologies, Inc.
 * @link     https://www.litespeedtech.com
 * @since    1.0.0
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

class Listener
{

    public static function emptyCacheForLoggedUser( \XF\App $app,
            \XF\Http\Response &$response )
    {
        $visitor = \XF::visitor();

        if ( $visitor['user_id'] && $visitor['user_id'] != 0 ) {
            $cache_header = 'no-cache';
            $response->header('X-LiteSpeed-Cache-Control', $cache_header);
        }
    }

    public static function doNotCachePages( \XF\Mvc\Controller $controller,
            $action, \XF\Mvc\ParameterBag $params,
            \XF\Mvc\Reply\AbstractReply &$reply )
    {
        $doNotCacheControllers = array(
            "XF\Pub\Controller\Login",
            "XF\Pub\Controller\Register"
        );

        $class = get_class($controller);
        $cache = true;

        if ( in_array($class, $doNotCacheControllers) ) {
            $cache = false;
        }

        if ( method_exists($reply, 'getViewClass') ) {
            $viewClass = $reply->getViewClass();

            $doNotCacheViewClass = array(
                "XF:Login\TwoStep",
                "XF:Error\RegistrationRequired",
                "XF:Error\Server",
            );

            if ( in_array($viewClass, $doNotCacheViewClass) ) {
                $cache = false;
            }
        }

        if ( method_exists($reply, 'getResponseCode') ) {
            $responseCode = $reply->getResponseCode();

            if ( $responseCode == 403 ) {
                $cache = false;
            }
        }

        if ( $cache == false ) {
            header('X-LiteSpeed-Cache-Control: no-cache');
        }
    }

}
