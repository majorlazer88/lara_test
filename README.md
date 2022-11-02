# Init new project
docker exec -u root:root -w /var/www/ <container_id> bash -c "composer create-project laravel/laravel ml"
docker exec -u root:root -w /var/www/ <container_id> bash -c "chmod 0777 storage/logs/"
docker exec -u root:root -w /var/www/ <container_id> bash -c "chmod 0777 storage/framework/views/"
docker exec -u root:root -w /var/www/ <container_id> bash -c "chmod -R 0777 storage/framework/cache/"
# Install dependencies
docker exec -u root:root -w /var/www/ <container_id> bash -c "composer install"
docker exec -u root:root -w /var/www/ <container_id> bash -c "npm install"
## Livewire, Vite
docker exec -u root:root -w /var/www/ <container_id> bash -c "npm run build"
##
docker exec -u root:root -w /var/www/ <container_id> bash -c "npm run dev"

# Login as root
docker exec -it -w /var/www -u root:root <container_id> bash
