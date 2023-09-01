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
docker-compose up -d
symfony serve -d
```