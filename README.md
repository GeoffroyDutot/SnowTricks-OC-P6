# SnowTricks-OC-P6 
## Author
[Geoffroy Dutot](https://geoffroydutot.fr)  - 2020 

[contact@geoffroydutot.fr](mailto:contact@geoffroydutot.fr)
## Badge  
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/fb00fad73472411f801cc2521cbbff22)](https://www.codacy.com/gh/GeoffroyDutot/SnowTricks-OC-P6/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=GeoffroyDutot/SnowTricks-OC-P6&amp;utm_campaign=Badge_Grade)
## Introduction

This project is the 6th project of the [Developer PHP / Symfony](https://openclassrooms.com/fr/paths/59-developpeur-dapplication-php-symfony) formation of [Openclassrooms](https://openclassrooms.com/).  

The goal of this project is to create a community site for snowboard tricks fans with the PHP [Symfony](https://symfony.com/doc/current/index.html) framework.  

No use of any Back-End bundles excepts for initial data. 

The design of the site should follow wireframes given and be responsive. 

The website will integrate CRUD, and comment's spaces.

A forgot and reset password page with a system of token to change the password.

The website's urls should be readable and easy to understand.

To access to the back-office of the site, you should be logged in.

In addition to the community site, the project will have UML diagrams and an analysis by a code validator.

## Build with 

-   Symfony 5.2
-   Twig
-   Tailwindcss
-   Jquery

## Requirements 

-   PHP 7.4
-   Composer
-   Web server
-   MYSQL

## Installation

-   Clone / Download the project

-   Configure your web server to point on the project directory
-   Composer install
-   Copy the .env.template file and rename it to .env 
-   Edit the .env file to connect it with your database server and your SMTP server to send emails
-   Run the command to create the database :  `php bin/console doctrine:database:create`

  Nb: If you want to add data fixtures. You will need to be in dev mode and to run : 

  `php bin/console doctrine:fixtures:load`
