#!/bin/bash

catalog=/home/libmanuk/public_html/catalog/process
tla=$1
ark=$2

sed -i 's/"rights_t":"http:\/\/creativecommons.org\/licenses\/by\/4.0\/"/"rights_t":"This issue is in the public domain."\n/' ${catalog}/${tla}/${ark}.json
