#! /bin/bash

catalog=/home/path_to_public/public_html/papervault
tla=$1
ark=$2

curl -o ${catalog}/${tla}/${ark}.dwn http://archive.org/advancedsearch.php?q=${ark}'&'fl%5B%5D=downloads'&'page=1'&'output=json > /dev/null 2>&1
curl -o ${catalog}/${tla}/${ark}.pdt http://archive.org/advancedsearch.php?q=${ark}'&'fl%5B%5D=publicdate'&'page=1'&'output=json > /dev/null 2>&1
