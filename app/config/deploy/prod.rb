# set :branch, "master"
set :deploy_to, "/homez.635/esnfranc/www/esnp"
# set :symfony_env_prod, "prod"
set :user, "esnfranc"
set :permission_method, :acl
set :domain, "ftp.ixesn.fr"

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server
role :db,         domain, :primary => true       # This is where Symfony2 migrations will run

# conserver le app_dev.php
set :controllers_to_clear, []