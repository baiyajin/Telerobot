#!/bin/sh
# chkconfig: 2345 55 25
# Description:run_rsync.sh
/usr/local/bin/inotifywait -mrq -e modify,attrib,move,create,delete /www/wwwroot/telrobot/uploads/audio/ | while read file
do
    rsync -av /www/wwwroot/telrobot/uploads/audio/ 1.1.1.1:/var/smartivr/uploads/audio/
    echo "$file在`date +'%F %T %A'`同步成功" >> /var/log/rsync.log
done
