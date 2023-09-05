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