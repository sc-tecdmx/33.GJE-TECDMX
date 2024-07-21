## Requerimientos
- Habilitar LDAP  
- Abrir php.ini descomentar extension=ldap

php artisan key:generate
php artisan config:cache

# Despues de modificar archivo .env
php artisan config:cache
php artisan config:clear