#!/bin/bash

TMPDIR="/tmp/fias_gar_xml/"
FIASFILE="/tmp/fias_gar_xml.zip"

mkdir -p $TMPDIR

URL=`php -f ./yii parse-fias/get-download-url`

wget "$URL" -O $FIASFILE

unzip $FIASFILE -d $TMPDIR

unlink $FIASFILE

php -f ./yii parse-fias/index $TMPDIR

rm -rf $TMPDIR
