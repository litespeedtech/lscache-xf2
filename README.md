# lscache-xf2
LSCache Plugin for XenForo 2

Feature list:

- Powerful defense against DDOS attacks.
- Significantly reduce server load (and MySQL queries).
- Guests pages are cached by LiteSpeed cache.

Installation:

1. Disable any other page caches as these will interfere with LSCXF2.
2. Access the server hosting your XenForo installation, either directly or 
using ssh/sftp.
3. From the unzipped LSCXF2 folder, copy all files under upload to the 
upload folder of your XenForo installation.
4. In the XenForo control panel, navigate to the Add-ons section to complete 
the installation.

Configuration:

- Add the following .htaccess rules, replacing 'xf_user' by the custom cookie 
prefix used if changed in XenForo's configuration, and '360' by the number of 
seconds the content should remain cached (Recommended < 10 mins):

        # LiteSpeed XenForo cache
        <IfModule litespeed>
            RewriteEngine On
             # cache
             RewriteCond %{HTTP_COOKIE} !xf_user [NC]
             RewriteRule .* - [E=Cache-Control:max-age=360]
             # no cache
             RewriteCond %{HTTP_COOKIE} xf_user [NC]
             RewriteRule .* - [E=Cache-Control:no-cache]
        </IfModule>