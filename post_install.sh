#!/bin/sh
# Install script to perform tasks after composer install

# cp git-hooks/pre-commit ../.git/hooks/pre-commit
# chmod +x ../.git/hooks/pre-commit

cp ./behat.aliases.drushrc.php ./vendor/drush/drush/
