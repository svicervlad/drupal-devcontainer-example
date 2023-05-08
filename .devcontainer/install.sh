#!/bin/bash
# Define variabes.
ERROR_COLOR='\033[0;31m';
WARNING_COLOR='\033[0;33m'
SUCCESS_COLOR='\033[0;32m';
NORMAL_COLOR='\033[0m';
bold=$(tput bold)
normal=$(tput sgr0)

echo "export PATH="\$PATH:\$VSCODE_REMOTE_FOLDER/vendor/bin"" >> ~/.bashrc

if [ ! -L "/code" ]; then
  sudo ln -sf $(pwd) /code
fi

printf "\n${SUCCESS_COLOR}${bold}Run composer install...\n\n${NORMAL_COLOR}";
composer install -n || { printf "${ERROR_COLOR}${bold}An error occurred while install dependencies by composer.\n${NORMAL_COLOR}${normal}"; exit 1; };

printf "\n${SUCCESS_COLOR}${bold}Install standart drupal...\n\n${NORMAL_COLOR}${normal}";
./vendor/bin/drush si --site-name=DEV --account-pass=admin -y
./vendor/bin/drush en advagg advagg_ext_minify advagg_css_minify advagg_js_minify -y
