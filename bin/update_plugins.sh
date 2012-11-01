#!/bin/bash
clear

echo -e "\E[31m"
#echo -n -e "\033[1m"
echo "============================================================"
echo -e "PROYECTO: ${item}"
echo "============================================================"
#echo -e "\033[0m"
tput sgr0

cd plugins

PLUGINS="$(ls -1)"
for plugin in ${PLUGINS[@]}
do
  cd ${plugin}
  echo -n ">> "
  echo -n -e "\033[1m"
  printf "%-30s: " $plugin
  echo -n -e "\033[0m"
  if [ -d ".svn" ]; then
    echo -n -e "\E[33m[svn] "
    svn up --ignore-externals
    tput sgr0
  else
    if [ -d ".git" ]; then
      echo -n -e "\E[33m[git] "
      git fetch
      git rebase origin
      git submodule update --recursive
      tput sgr0
  else
    echo -e "\E[33m[no versionado] "
    tput sgr0
    fi
  fi
  cd ..
done
cd ..
echo -n -e "\n\033[1m\E[34mpublish-assets...\033[0m\n"
tput sgr0
./symfony plugin:publish-assets
./symfony cc
echo -n -e "\n\033[1m\E[34mAll ready ;)\033[0m\n"
exit