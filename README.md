# MovieList

Test to archtouch, using Tmdb as source of data

## Installation

Use a apache2 and php enviroment

Clone the project

Run the composer install

The ./storage folder must have a 777 permission

Set up the sites-avaiable/sites-enabled acoordenly 
Ex:
<VirtualHost *:80>
    ServerName archtouch.local

    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/html/archtouch/public

    <Directory /var/www/html/archtouch>
        AllowOverride All
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>

Add a line to the file /etc/hosts/ 
Ex: 127.0.0.1       archtouch.local


## Usage

http://archtouch.local/

Shows the main screen

## Packages
 Laravel - as  source of project code, serving as template for beggining the code, using also blade as html template

 Guzzle - as library to request on tmdb's API  the movie list and informations

## License
[MIT](https://choosealicense.com/licenses/mit/)