docker exec -u root:root -w /var/www/ <container_id> bash -c "composer create-project laravel/laravel ml"
docker exec -u root:root -w /var/www/ <container_id> bash -c "composer install"
docker exec -u root:root -w /var/www/ <container_id> bash -c "chmod 0777 storage/logs/"
docker exec -u root:root -w /var/www/ <container_id> bash -c "chmod 0777 storage/framework/views/"
docker exec -u root:root -w /var/www/ <container_id> bash -c "npm install"
# Livewire
docker exec -u root:root -w /var/www/ <container_id> bash -c "npm run build"
docker exec -u root:root -w /var/www/ <container_id> bash -c "npm run dev"
