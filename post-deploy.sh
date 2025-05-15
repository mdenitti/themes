#!/bin/bash
# This script should be run on the server after deployment

# Go to the application directory
cd /subsites/fullstack.be

# Set proper permissions
find storage -type d -exec chmod 775 {} \;
find storage -type f -exec chmod 664 {} \;
chmod 775 bootstrap/cache

# If this is the first deployment, copy the environment file
if [ ! -f .env ]; then
    cp .env.production.example .env
    # Generate application key
    php artisan key:generate
    echo "Please configure your .env file with the correct database credentials and other settings"
fi

# Run migrations
php artisan migrate --force

# Clear caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Optimize
php artisan optimize

echo "Deployment completed successfully!"
