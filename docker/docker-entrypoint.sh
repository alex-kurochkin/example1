#!/usr/bin/env sh
TMPDIR="/fias_gar_xml/"

FIASFILE="/fias_gar_xml/fias_gar_xml.zip"

composer install -e prod

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

#CMD ["php-fpm"]
php-fpm
