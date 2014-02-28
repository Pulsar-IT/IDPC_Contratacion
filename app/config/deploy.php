set :application, "IDPCContratacion"
set :domain,      "idpccontratacion"
set :deploy_to,   "/var/www/scontratos"
set :app_path,    "app"


set :user,	  "scontratos"
set :use_sudo,	  true
ssh_options[:port] = 22
ssh_options[:forward_agent] = true
set :php_bin,	   "/usr/bin/php"


set :repository,  "git@github.com:miguelplazasr/IDPC_Contratacion.git"
set :scm,         :git
set :branch,	  "master"

set :model_manager, "doctrine"

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server

set :use_composer, true
set :update_vendors, true
set :dump_assetic_assets, true

set  :keep_releases,  3

set :shared_files,      ["app/config/parameters.yml"]
set :shared_children,     [app_path + "/logs", web_path + "/uploads", "vendor"]
