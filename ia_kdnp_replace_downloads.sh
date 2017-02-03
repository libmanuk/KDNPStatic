#!/bin/bash

catalog=/home/libmanuk/public_html/papervault
tla=$1
ark=$2

sed -i 's/"downloads":/"downloads":\n/' ${catalog}/${tla}/${ark}.dwn
sed -i -e '1d' ${catalog}/${tla}/${ark}.dwn
sed -i -e '2d' ${catalog}/${tla}/${ark}.dwn
sed -i 's/}//' ${catalog}/${tla}/${ark}.dwn
sed -i 's/ //' ${catalog}/${tla}/${ark}.dwn
sed -i 's/\n//' ${catalog}/${tla}/${ark}.dwn
