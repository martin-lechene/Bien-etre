# Bien être Application d'annuaire

CMS of service based on Symfony 6.0+.
Web project for the Saint Laurent Institute in Liege.
For Projet Web : Bien être


## Install
### Clone by github
Open console and write : <<'git clone <url> <name of directory>'>>
<url> -> https://github.com/martin-lechene/Bien-etre.git
<name of directory> -> Choose name of directory
OR
git clone https://github.com/martin-lechene/Bien-etre

### Composer setting
Tape composer install

### Config .env
Vous devez configurer votre base de donnée 

### Config database
On PHPMyAdmin import in your database the file database.zip
OR BY symfony-cli
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

### Install maildev for your mailer
> Installation avec npm (recommandée): npm -g install maildev
> Installation avec Docker (alternative) : docker run -p 1080:80 -p 1025:25 djfarrelly/maildev
> Lancement : maildev
> Accès : L'interface web de maildev sera accessible via http://localhost:1080 par défaut. Le serveur SMTP (dans la configuration de esmtp ou mhsendmail) est localhost:1025 par défaut.


### Start server symfony (for dev)
symfony server:start
Go to http://localhost:[port(8000)]
OR
php -S localhost:8000 
Go to http://localhost:8000/public



## Tools, CDN, Software & Technology use
- Symfony 5.0+
- PHP 8.0+
- HiedeSQL + MySQL Server (laragon)
- Composer
- NodeJS
- Font Amewsome
- Bootstrap
- Laragon