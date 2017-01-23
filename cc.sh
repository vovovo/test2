sudo chmod 777 -R var/cache/
sudo chmod 777 -R var/logs/
sudo chmod 777 -R var/sessions/
sudo chmod 777 -R bin/bowerphp.phar
sudo chmod 777 -R ./composer.json
php bin/console cache:clear --env=prod