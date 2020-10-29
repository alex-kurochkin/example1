#!/bin/bash

FIASFILE="/tmp/fias_gar_xml.zip"

# Reset DB
yes | php -f yii migrate/down 4

# Create DB tables without indexes
yes | php -f yii migrate 3

if [ ! -f $FIASFILE ]
  then
    URL=$(php -f ./yii parse-fias/get-download-url)
    wget "$URL" -O $FIASFILE
fi

php -f ./yii parse-fias/index $FIASFILE

# Add indexes
yes | php -f yii migrate
