#!/bin/bash
#同步laravel工作目录

SCRIPTPATH="$(realpath $0)"
workDir="$(dirname $SCRIPTPATH)"

pushd "$workDir" || &>/dev/null
#rsync to office Desktop PC:
rsync -rlvvztPD -e 'ssh -p 24' ./ Administrator@192.168.4.15:/cygdrive/e/Work/Laravel-work/

#rsync to HOMEPC:
rsync -rlvvztPD  ./ homepc:/cygdrive/m/XunLu/Laravel-work/

echo -e "All things Done..."
popd &>/dev/null
