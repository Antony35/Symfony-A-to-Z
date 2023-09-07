# Récupérer l'adresse IP du conteneur MySQL
MYSQL_IP=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' antoinebernabeu-database-1)

# Récupérer l'adresse IP du conteneur Mailer
MAILER_IP=$(docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' antoinebernabeu-mailer-1)

# Mettre à jour les valeurs dans le fichier .env
sed -i "s/DATABASE_URL=mysql:\/\/root:password@.*:3306\/main/DATABASE_URL=mysql:\/\/root:password@${MYSQL_IP}:3306\/main/" .env
sed -i "s/MAILER_DSN=smtp:\/\/.*:1025/MAILER_DSN=smtp:\/\/${MAILER_IP}:1025/" .env

echo "IPs mises à jour dans le fichier .env :"
grep "DATABASE_URL\|MAILER_DSN" .env
