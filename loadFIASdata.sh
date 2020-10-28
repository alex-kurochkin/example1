#!/bin/bash

TMPDIR="/tmp/fias_gar_xml/"

FIASFILE="/tmp/fias_gar_xml.zip"

# Reset DB
yes | php -f yii migrate/down 4

# Create DB tables without indexes
yes | php -f yii migrate 3

mkdir -p $TMPDIR

if [ ! -f $FIASFILE ]
  then
    URL=$(php -f ./yii parse-fias/get-download-url)
    wget "$URL" -O $FIASFILE
fi

unzip $FIASFILE -d $TMPDIR

chmod a+r -R $TMPDIR

php -f ./yii parse-fias/index $TMPDIR

rm -rf $TMPDIR

# Add indexes
yes | php -f yii migrate
