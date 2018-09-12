#!/bin/sh

./vendor/bin/php-cs-fixer fix \
    --config=./resources/ci/.php-cs-fixer.dist \
    --dry-run --stop-on-violation &&

exit $?
