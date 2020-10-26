#!/bin/bash

TMPDIR="/tmp/fias_gar_xml/"

FIASFILE="/tmp/fias_gar_xml.zip"

mkdir -p $TMPDIR

if [ ! -f $FIASFILE ]
  then
    URL=$(php -f ./yii parse-fias/get-download-url)
fi

wget "$URL" -O $FIASFILE

unzip $FIASFILE -d $TMPDIR

chmod a+r -R $TMPDIR

php -f ./yii parse-fias/index $TMPDIR

rm -rf $TMPDIR
