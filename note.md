### Switch Between Multiple PHP Versions

$ php -v 

$ sudo update-alternatives --config php

### Install composer 
https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-20-04-ru

Path to composer = /usr/local/bin/composer

### Install Symfony
https://habr.com/ru/articles/451138/

-  Install Symfony CLI
    <p>The Symfony CLI is a developer tool to help you build, run, and manage your Symfony applications directly from your terminal.</p>
   
   > curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | sudo -E bash

   > sudo apt install symfony-cli

-   Check the system is ready to run Symfony
   > symfony check:requirements
   
   my error => Install and enable the SimpleXML extension.
   > sudo apt install php-xml
   
- build a web application
  > symfony new my_project_directory --version="6.3.*" --webapp

  > !!! Под капотом symfony new выполняет команду composer create-project, затем инициализирует новый Git репозиторий и сразу создаёт Initial commit.
  
- Running Symfony Applications

  > $ symfony serve
  
  > она проанализирует доступные SAPI на используемой машине и выберет лучший вариант из существующих, пользуясь следующими приоритетами: на первом месте PHP FPM, дальше PHP CGI и в конце PHP CLI. Список доступных SAPI можно посмотреть командой:

  > symfony local:php:list

  --- or ---
  > cd my-project/

  > symfony server:start


### Database & Doctrine orm;

Сначала установите поддержку Doctrine через orm Symfony pack , вместе с MakerBundle, которая поможет генерировать код:

composer require symfony/orm-pack
composer require --dev symfony/maker-bundle


Конфигурация базы данных

sudo mysql => run mysql;

SELECT user FROM mysql. user;  => all users

GRANT ALL PRIVILEGES ON *.* TO 'lyoubomyr'@'127.0.0.1' WITH GRANT OPTION; => donne permission 

change .env 


php bin/console doctrine:database:create


### Creating an Entity Class

$ php bin/console make:entity

Команда make:entity - это инструмент упрощающий жизнь. Но это ваш код: добавляйте/удаляйте поля, добавляйте/удаляйте методы или обновляйте конфигурацию.

Doctrine поддержвивет множество типов полей, каждое со своими настройками. Весь список можно посмотреть в документации отображения типов Doctrine. Если вы хотите использовать XML вместо аннотаций, добавьте type: xml и dir: '%kernel.project_dir%/config/doctrine' к маппингу сущностей в вашем файле `config/packages/doctrine.yaml``.


### Controller

### 
php bin/console debug:router


### Cache
php bin/console cache:clear



cmd//

didyksdb@gmail.com  = didyk2022




