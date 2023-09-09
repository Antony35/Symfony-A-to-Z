# AntoineBernabeu

AntoineBermabeu est un site internet permettant à un artiste peintre de publier ses oeuvres.

## Environnement de développement

### Pré-requis

* PHP 8.1
* Composer
* Symfony CLI
* Docker
* Docker-compose

Vous pouvez vérifier les pré-requis (sauf Docker et Docker-compose) avec la commande suivante (de la CLI Symfony):

```bash
symfony check:requirements
```

### Lancer l'environnement de développment

```bash
composer install
npm install
npm run build
docker-compose up -d
### Update IP adress for DBB and SMTP in .env ###
./bin/bash/update_ips.sh
### If FIRST TIME allow chmod ###
chmod +x ./bin/bash/update_ips.sh
symfony console make:migration
synfony console d:m:m
### Start async sender message in background ###
php bin/console messenger:consume async -vv
symfony serve -d
```


### Ajouter des données de tests

```bash
symfony console doctrine:fixtures:load
```

## Lancer des tests

```bash
php bin/phpunit -- testdox
```

###