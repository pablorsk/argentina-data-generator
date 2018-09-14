#!/bin/sh

echo "php-csniffer..." &&
sh resources/ci/php-csniffer.sh
if [ $? -ne 0 ]; then
    echo "php-csniffer-fix..." &&
    sh resources/ci/php-csniffer-fix.sh
fi

echo "double spaces..." &&
sh vendor/reyesoft/ci/tools/find-double-spaces.sh src/
sh vendor/reyesoft/ci/tools/find-double-spaces.sh tests/

echo "php-cs-fixer..." &&
./vendor/bin/php-cs-fixer fix --config=resources/rules/php-cs-fixer.php
echo

git status -s

echo "\n 💡  Don't forget to run \n    composer ci-php-md \n"
