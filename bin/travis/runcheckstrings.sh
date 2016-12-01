#!/usr/bin/env sh

set -x

cd $HOME/build/ezplatform
$(docker-compose exec --user www-data app sh -c "cd vendor/ezsystems/platform-ui-bundle; ./bin/travis/checkstrings.sh")

exit $?
