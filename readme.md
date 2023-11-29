#  Obsolescence Tracker
## _Time longer the better_
[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)

## Dévelopeur(es) Full Stack :
[@pauline](https://www.github.com/pauline-brevet),  [@bilel](https://www.github.com/bilel69500),   [@david](https://www.github.com/dsayag),  [@nicolas](https://www.github.com/koubila)
Tous membres de l'It Akademy.

## Application :

Obsolescence tracker est un site qui référence les marques commerciales de PC et leur attribue une note globale (/10) sur leur état d'obsolescence en fonction des critères des composants constitutifs.


## Features

- Inscription et connexion pour y avoir accès
- Recherche d'un PC par marque ou modèle ou année
- Filtrer sur les résultats de recherche
- Admin Crud 
- Détails des graphiques pour des données plus complètes


Le site Web respecte l'éco-conception green it avec un design épuré.

> L'obsolescence programmée est la réduction consciente
> de la vie des produits afin d'accélérer le renouvellement des produits.
> La France a été le premier pays au monde à interdire cette pratique en 2015.
> Il peut être puni de 2 ans d'emprisonnement
> et 300 000 € d'amende et jusqu'à 5 % du chiffre d'affaires moyen annuel.
> https://www.halteobsolescence.org/a-propos/#manifeste



## Tech

Nous avons choisi la stack suivante pour notre projet:

- Javascript - langage de script léger, orienté objet.
- Docker Engine - conteneurisation open source.
- [Symfony 6.2](https://symfony.com/releases/6.2) - framework PHP leader.
- ✨Bootstrap 5.0 ✨ - bon outil UI pour applications web modernes

Et bien sûr Html, Css pour la structure et la base du style.

# Development

Vous voulez contribuez ? Bien !
### Installation
Requis :
- IDE
- docker
- git
- php 8

Récupérer notre projet : 
   -- 1 - cloner le projet
   -- 2 - builder et up docker
   -- 3 - installer composer dans le conteneur php_symfony
   -- 4 - lancer les migrations
   -- 5 - lancer les fixtures

Ouvrez votre Terminal et lancer ces commandes:
```sh
cd ./handson-2023-1-equipe-5
docker-compose up --build
docker exec -it <identifiant_conteneur_php_symfony> bash
root@exemple_id_symfony:/app# composer install
root@exemple_id_symfony:/app# php bin/console d:m:m
root@exemple_id_symfony:/app# php bin/console h:f:l
```

> Note: `localhost:8000` est utilisé.

> Note: `root` est utilisé pour phpmyadmin.

> Note: `admin@admin.com` `admin` est utilisé pour se login.

 -----------------
Pour l'environnement de production.

Configurations:
Ubuntu 18.0 LTS
Nginx
MariaDB

## Hébergement
- nom de domaine : https://obsolescence-tracker.tech
- certificat SSL : namecheap
- hébergeur : Digital Ocean

## Exemple Librairie

L'application web utilise certaines fonctionnalités très utiles pour développer rapidement.

| Bundle | Infos |
| ------ | ------ |
| ChartJS | https://www.chartjs.org/ |
| AliceFixture | https://symfonycasts.com/screencast/alice-fixtures/fixtures |
| Mailer | https://symfony.com/doc/current/mailer.html |
| Composer | https://getcomposer.org/ |

## License

MIT

**Free Software, Hell Yeah!**

## 
