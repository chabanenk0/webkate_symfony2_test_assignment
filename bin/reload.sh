app/console cache:clear

chmod -R 777 app/cache
chmod -R 777 app/logs

app/console doctrine:database:create
app/console doctrine:schema:create
app/console doctrine:fixtures:load

app/console cache:clear

