#!/bin/sh

sh vendor/reyesoft/ci/db/mysql-start.sh &&
sh vendor/reyesoft/ci/db/laravel-mysql-env.sh &&
sh vendor/reyesoft/ci/db/laravel-migrate.sh &&

exit $?
