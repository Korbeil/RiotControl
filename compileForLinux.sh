#!/bin/bash

echo "###########################"
echo "#  [Check] Assembly Info  #"
echo "###########################"

echo "Checking AssemblyInfo exists in PATH ..."

assemblyInfoPath="`pwd`/AssemblyInfo"
var=`echo $PATH | tr ':' '\n' | grep -x -c $assemblyInfoPath > /dev/null && echo "Yes" || echo "No"`;

if [ $var == "No" ]; then
  echo "AssemblyInfo doesn't exists in PATH, we add it ..."
  export PATH=$PATH:$assemblyInfoPath
  echo "AssemblyInfo was added !"
else
    echo "AssemblyInfo is already in your PATH !"
fi

echo "########################"
echo "#  [Check] References  #"
echo "########################"

error=0

if [ -d "`pwd`/References" ]; then
  echo "'./References' folder exists, checking files ..."

  if [[ ! -e "`pwd`/References/Blighttp.dll" ]]; then
    echo "'./References/Blighttp.dll' doesn't exists, please put it in './References' folder"
    error=1
  fi

  if [[ ! -e "`pwd`/References/FluorineFx.dll" ]]; then
    echo "'./References/FluorineFx.dll' doesn't exists, please put it in './References' folder"
    error=1
  fi

  if [[ ! -e "`pwd`/References/LibOfLegends.dll" ]]; then
    echo "'./References/LibOfLegends.dll' doesn't exists, please put it in './References' folder"
    error=1
  fi

  if [[ ! -e "`pwd`/References/Nil.dll" ]]; then
    echo "'./References/Nil.dll' doesn't exists, please put it in './References' folder"
    error=1
  fi

  if [[ ! -e "`pwd`/References/System.Data.SQLite.dll" ]]; then
    echo "'./References/System.Data.SQLite.dll' doesn't exists, please put it in './References' folder"
    error=1
  fi

  if [ $error == 1 ]; then
    exit 0
  else
    echo "All files are present."
  fi

else
  echo "'./References' folder doesn't exists, please add it and put all *.dll into that folder and restart that script"
fi

echo "######################"
echo "#  [Build] RiotGear  #"
echo "######################"

cd ./RiotGear
xbuild

