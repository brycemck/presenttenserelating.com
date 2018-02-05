#!/bin/bash

host="brycemckenney.co"
hostSSHUser="brycemckenney"
hostSSHKeyPath="/Users/brycemckenney/.ssh/brycemckenney"

hostSQLUser="root"
hostSQLPass="eu4-u45r01"
hostDBName="presenttenserelating"

localSQLUser="root"
localSQLPassword="root"
localDBName="presenttenserelating"

SQLExportName="presenttenserelating.sql"

# # Export local db
# mysqldump -u $localSQLUser -p$localSQLPassword $localDBName > ~/Downloads/$SQLExportName
# # Copy to remote
# scp -i $hostSSHKeyPath ~/Downloads/$SQLExportName $hostSSHUser@$host:/home/$hostSSHUser/
# # SSH and import new db
# ssh -i $hostSSHKeyPath $hostSSHUser@$host << EOF
#     mysql -u $hostSQLUser -p$hostSQLPass -h localhost $hostDBName < /home/$hostSSHUser/$SQLExportName
# EOF

# Copy the project
scp -r -i $hostSSHKeyPath /Users/brycemckenney/Projects/presenttenserelating.com/wp-content/plugins $hostSSHUser@$host:/var/www/presenttenserelating.com/wp-content/plugins
# rsync -r -a -v -e "ssh -i /Users/brycemckenney/.ssh/brycemckenney" --delete ~/Projects/presenttenserelating.com/wp-content brycemckenney@brycemckenney.co:/var/www/presenttenserelating.com/wp-content
# scp -i $hostSSHKeyPath /Users/brycemckenney/Projects/presenttenserelating.com/wp-config-remote.php $hostSSHUser@$host:/var/www/presenttenserelating.com

# Switch WP-config to corrent
# ssh -i $hostSSHKeyPath $hostSSHUser@$host << EOF
#     rm -rf /var/www/presenttenserelating.com/wp-config.php
#     mv /var/www/presenttenserelating.com/wp-config-remote.php /var/www/presenttenserelating.com/wp-config.php
# EOF