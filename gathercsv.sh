#!/bin/bash

set -e

control=$1
path=/home/libmanuk/public_html/papervault
catalog=/home/libmanuk/public_html/catalog

cat $path/$control/*.txt > $path/$control/${control}_texts.csv
cat $path/$control/*.itm > $path/$control/${control}_items.csv

echo $path/$control/*.json | wc -w > $catalog/mysql/$control/issue_count.txt

mv $path/$control/${control}_texts.csv $catalog/mysql/${control}/texts/${control}_texts
mv $path/$control/${control}_items.csv $catalog/mysql/${control}/items/${control}_items


if [[ $(find $catalog/mysql/${control}/texts/${control}_texts -type f -size +47185920c 2>/dev/null) ]]; then
    split -l 4872 $catalog/mysql/${control}/texts/${control}_texts $catalog/mysql/${control}/texts/texts_
    rm $catalog/mysql/${control}/texts/${control}_texts
fi

#1190 2450 4872 5124 8428
#split -l 2450 $path/mysql/${control}/texts/${control}_texts $path/mysql/${control}/texts/texts_
#split -b 45m $path/mysql/${control}/items/${control}_items $path/mysql/${control}/items/items_

for file in /home/libmanuk/public_html/catalog/mysql/${control}/texts/*; do
    if [ -f ${file} ]; then
        mv ${file} ${file}.csv
#        echo  >> ${file}.csv
    fi
done

for file in /home/libmanuk/public_html/catalog/mysql/${control}/items/*; do
    if [ -f ${file} ]; then
        mv ${file} ${file}.csv
#        echo  >> ${file}.csv
    fi
done
