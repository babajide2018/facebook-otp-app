Clone the repository

Install Dependencies:
composer install

Configure Facebook OAuth:
Obtain OAuth credentials from the facebook Cloud Console and update the services file:

FACEBOOK_CLIENT_ID=(specified in the project)
FACEBOOK_CLIENT_SECRET=(specified in the project)
FACEBOOK_REDIRECT_URI='/auth/facebook/callback'


Serve the Application:
php artisan serve --port=5000