set :deploy_to, "/var/www/esnp.jeremiesamson.com"
set :domain, "ns378858.ip-5-196-69.eu"
set :user, "jerem"
set :symfony_env_prod, "dev"
set :symfony_console_path, "bin/console"

role :web,        domain
role :app,        domain, :primary => true
role :db,         domain, :primary => true

# conserver le app_dev.php
set :controllers_to_clear, []