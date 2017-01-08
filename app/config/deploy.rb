# Server
set :application,           "ESNP"
set :use_set_permissions,   true
set :permission_method,     :acl
set :use_sudo,              false
set :webserver_user,        "www-data"
set :use_set_permission,    true
set :use_composer, false
default_run_options[:pty] = true

# Multistaging
set :stages,                %w(prod)
set :default_stage,         "prod"
set :stage_dir,             "app/config/deploy"

set :stages do
   names = []
   for filename in Dir["#{stage_dir}/*.rb"]
       names << File.basename(filename, ".rb")
   end
   names
end
require 'capistrano/ext/multistage'
set :stage_files,           false

# Repository
set :repository,            "git@github.com:ESNFranceG33kTeam/ESNP.git"
set :scm,                   :git
set :deploy_via,            :copy
set :keep_releases,         3

# Symfony
set :parameters_file,       false
set :assets_symlinks,       true
set :app_path,              "app"
set :model_manager,         "doctrine"
set :shared_files,          ["#{app_path}/config/parameters.yml"]
set :writable_dirs,         ["#{app_path}/logs", "#{app_path}/cache"]
set :interactive_mode,      false
set :dump_assetic_assets,   false
set :composer_options, "--verbose --prefer-dist --optimize-autoloader --no-progress"

logger.level = Logger::MAX_LEVEL

# Assets
#before "symfony:cache:warmup", "symfony:assets:install"

# Backup remote database to local
#before "deploy:rollback:revision", "database:dump:remote"

# Migrate remote database
#after "symfony:cache:warmup", "symfony:doctrine:migrations:migrate"

# Run deployment
after "deploy", "deploy:cleanup" # Clean old releases at the end