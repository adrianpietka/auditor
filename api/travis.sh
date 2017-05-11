#!/bin/sh

STATUS=0

./vendor/bin/phpcs --standard=PSR2 --encoding=utf-8 src/ tests/
[ $? == 0 ] || STATUS=1

composer unit
[ $? == 0 ] || STATUS=1

composer integration
[ $? == 0 ] || STATUS=1

exit $STATUS