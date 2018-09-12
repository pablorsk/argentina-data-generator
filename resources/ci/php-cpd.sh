#!/bin/sh

./vendor/bin/phpcpd --min-tokens=50 ./src/ \
--regexps-exclude=IntegrationTests \
--names-exclude=FiscalbookExport.php,FiscalbookTrait.php \
&&

exit $?
