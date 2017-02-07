#!/bin/bash

catalog=/home/path_to_public/public_html/papervault
tla=$1
ark=$2

sed -i 's/"publicdate":"/"publicdate":"\n/' ${catalog}/${tla}/${ark}.pdt
sed -i -e '1d' ${catalog}/${tla}/${ark}.pdt
sed -i -e '2d' ${catalog}/${tla}/${ark}.pdt
sed -i 's/"}//' ${catalog}/${tla}/${ark}.pdt
sed -i 's/]}}//' ${catalog}/${tla}/${ark}.pdt
sed -i 's/ //' ${catalog}/${tla}/${ark}.pdt
sed -i 's/\n//' ${catalog}/${tla}/${ark}.pdt
