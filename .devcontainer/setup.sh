#!/bin/bash
set -e

# Create .env for devcontainer (overwrite with local DB settings)
WORKSPACE_DIR="$(cd "$(dirname "$0")/.." && pwd)"
cat > "$WORKSPACE_DIR/.env" << 'ENV'
SS_DATABASE_SERVER=127.0.0.1
SS_DATABASE_NAME=silverstripe
SS_DATABASE_USERNAME=silverstripe
SS_DATABASE_PASSWORD=silverstripe
SS_DATABASE_CLASS=MySQLDatabase
SS_ENVIRONMENT_TYPE=dev
SS_DEFAULT_ADMIN_USERNAME=admin
SS_DEFAULT_ADMIN_PASSWORD=password
SS_ALLOWED_HOSTS="*"
ENV

# Configure Apache to serve from workspace
sudo bash -c "echo 'export APACHE_DOCUMENT_ROOT=$WORKSPACE_DIR/public' >> /etc/apache2/envvars"

# Set up MySQL database and user
sudo service mariadb start
sudo mysql -e "CREATE DATABASE IF NOT EXISTS silverstripe;"
sudo mysql -e "CREATE USER IF NOT EXISTS 'silverstripe'@'localhost' IDENTIFIED BY 'silverstripe';"
sudo mysql -e "GRANT ALL PRIVILEGES ON silverstripe.* TO 'silverstripe'@'localhost';"
sudo mysql -e "FLUSH PRIVILEGES;"

# Install Composer dependencies
composer install

# Build the Silverstripe database
php vendor/bin/sake db:build --flush
