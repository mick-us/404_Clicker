# 404 Clicker

404 Clicker est un browser game basé sur le jeu Cookie Clicker.

Projet de fin de formation POEC PHP-Symfony.

Utilisation d'un environnment LAMP avec Docker et Symfony 5 lors de son développement : https://github.com/nicolasvauche/docker_sf5


-----------------

## Table des matières
1.[Environnement](#environnement)

2.[Installation du projet](#installation)

-----------------

## Environnement

***
Informations sur l'environnement du site


_php_ : 7.4.26

_symfony_ : 5.4.6

_mysql_ : 8.0.28

_adminer_ : 4.8.1

_apache_ : 2.4.38

_maildev_ : 1.1.0

-----------------

## Installation

***
- Docker sf5 projet github : https://github.com/nicolasvauche/docker_sf5

    Récupérez-le et initialisez-le en suivant son README.

    Emplacement où mettre le clone :

    ```
    $ docker exec -it sf5_www bash
    $ cd app
    ```

- Pour l'installation de git et du clonage du repository :

    ```
    $ git clone https://github.com/mitaksim1/404_Clicker .
    ```

- Faire une copie du fichier *.env* dans un fichier que l'on va nommer *.env.local* et renseigner les données pour la création de votre base de données.
    
    ```
    DATABASE_URL="mysql://nomUser:passwordUser@docker_sf5_mysql:3306/nomDatabase?serverVersion=5.7"
    
    ``` 

- Activez l'utilisation du mailer :

    ```
    ###> symfony/mailer ###
    MAILER_DSN=smtp://docker_sf5_maildev:25
    ###< symfony/mailer ###
    ```

- Installez les dépendances du projet :

    ```
    $ composer install
    ```

- Si vous n'avez pas node.js installé dans votre machine : 

    ```
    // Vérifie si node est installé et sa version
    $ node -v
    ```

    ```
    $ curl -sL https://deb.nodesource.com/setup_16.x | bash -
    $ apt update && apt-get install -y nodejs
    ```

- Installation de yarn dans le projet pour l'utilisation de [Webpack Encore](https://github.com/symfony/webpack-encore) :
    ```
    $ curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
    $ echo "deb https://dl.yarnpkg.com/debian/ stable main" | sudo tee /etc/apt/sources.list.d/yarn.list
    $ apt install yarn
    ```

    ```
    // Vérifie la version de yarn installé
    $ yarn -v
    ```

- Utilisez la commande ci-dessous pour actualiser le scss et le js sur le site :

    ```
    $ yarn watch
    ```

- Mise en place la base de données :

    ```
    $ php bin/console doctrine:database:create
    $ php bin/console doctrine:migrations:migrate
    $ php bin/console doctrine:fixtures:load
    ```

- Pour la documentation avec PHPDocumentor (on active cela avec son .phar) :
    ```
    $ php phpDocumentor.phar -d ./src -t docs/api
    ```
Bravo vous avez fini l'installation de notre projet, maintenant faites vous plaisir avec ^^!
