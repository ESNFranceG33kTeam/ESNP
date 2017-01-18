ESNP - ESN NP Android App Backend
===

### How do I get set up?

## Installation

Here are the different steps to install the project 

# Download the project through git #

```shell
git clone https://github.com/ESNFranceG33kTeam/ESNP.git
```

# Install vendor 

```shell
composer install
```

# Configure folder 

## Mac

```shell
HTTPDUSER=`ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
sudo chmod +a "$HTTPDUSER allow delete,write,append,file_inherit,directory_inherit" var/cache var/logs var/sessions
sudo chmod +a "$HTTPDUSER allow delete,write,append,file_inherit,directory_inherit" var/cache var/logs var/sessions
```
or 

## Linux

```shell
HTTPDUSER=`ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX var/cache var/logs var/sessions
sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX var/cache var/logs var/sessions
```

# Create and update database

```shell
php app/console doctrine:database:create
php app/console doctrine:schema:update --force
```

# Changelog

You can see project evolution here : [changelog](CHANGELOG)

### Creator

This project has been created and made with SYMFONY framework by Jérémie Samson in order to promote international mobility and help international people in local integration. 
