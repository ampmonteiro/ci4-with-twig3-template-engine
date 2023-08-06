# CodeIgniter 4  with Twig 3 template engine

## About the project?

Base on my improved version of `ci4 - Build Your First Application`:

[Original improved](https://github.com/ampmonteiro/ci4-build-your-first-App).

What was added:

- Alternative template Engine

## What was used

- php: 8.1
- mysql: 8
- Docker
- CodeIgniter: 4.3.6
- Twig: 3.6.1 -> [more about](https://twig.symfony.com/)

## side by side template code (Twig vs Vanilla Ci4 template engine)

![Twig template engine VS Ci4 Template engine](twig_vs_ci4_template.png 'Twig template engine VS Ci4 Template engine')

## image of the App

![CI4 News-Improved](app_screen.png 'News CI4 + Twig')

## Editor and Recommend extensions

- Editor: [VS Code](https://code.visualstudio.com) (By Microsoft)

- [PHP Intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client) (By Ben Mewburn)

- [PHP Namespace Resolver](https://marketplace.visualstudio.com/items?itemName=MehediDracula.php-namespace-resolver) (By Mehedi Hassan)

- [PHP Awesome Snippets](https://marketplace.visualstudio.com/items?itemName=hakcorp.php-awesome-snippets) (By HakCorp)

- To better developement it is taked advantages of this two wonderfull vscode extensions:
  - [Docker](https://marketplace.visualstudio.com/items?itemName=ms-azuretools.vscode-docker) (By Microsoft): to manage docker containers in vs code
  - [Dev Containers](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers) (By Microsoft): to use vscode inside of the container.

- [TWIG pack](https://marketplace.visualstudio.com/items?itemName=bajdzis.vscode-twig-pack) (By Bajdzis)

## Setup (using docker without compose)

php image: read the Dockerfile

mysql image in terminal:

```bash

docker run --name db_ci \
     -e MYSQL_ROOT_PASSWORD=secret \
     -e MYSQL_DATABASE=ci4 \
     -e MYSQL_USER=dev \
     -e MYSQL_PASSWORD=secret \
     -dp 3306:3306 mysql;
```
