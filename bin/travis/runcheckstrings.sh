#!/usr/bin/env sh

cd $HOME/build/ezplatform

exit $(docker-compose exec --user www-data app sh -c "cd vendor/ezsystems/platform-ui-bundle; ./bin/checkstrings.sh")
