![](https://github.com/mmilten/Webpage/tree/main)
# Webpage #
 
**NOTE**: you will need a client_secret.json file in a folder named json for this to work as well.


This webpage is for testing purposes only and not for production

## Requirements ##
* [PHP 8.0 or higher](https://www.php.net/)
* [XAMPP 8.2.12 or higher](https://www.apachefriends.org/)

### Authentication with OAuth ###

> An example of this can be seen in [google-api-php-client/examples/simple-file-upload.php](https://github.com/googleapis/google-api-php-client/blob/main/examples/simple-file-upload.php).

1. Follow the instructions to [Create Web Application Credentials](https://github.com/googleapis/google-api-php-client/blob/main/docs/oauth-web.md#create-authorization-credentials)
1. Download the JSON credentials
1. Set the path to these credentials using `Google\Client::setAuthConfig`:

    ```php
    $gclient = new Google\Client();
    $gclient->setAuthConfig('/path/to/client_credentials.json');
    ```

1. Set the scopes required for the API you are going to call

    ```php
    $gclient->addScope(Google\Service\Drive::DRIVE);
    ```

1. Set your application's redirect URI

    ```php
    // Your redirect URI can be any registered URI, but in this example
    // we redirect back to this same page
    $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $gclient->setRedirectUri($redirect_uri);
    ```

1. In the script handling the redirect URI, exchange the authorization code for an access token:

    ```php
    if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    }
    ```

