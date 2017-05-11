#!/bin/sh

STATUS=0

./vendor/bin/phpcs --standard=PSR2 --encoding=utf-8 src/ tests/
if [ $? == 0 ]
then
  STATUS=1
fi

composer unit
if [ $? == 0 ]
then
  STATUS=1
fi

composer integration
if [ $? == 0 ]
then
  STATUS=1
fi

exit $STATUS