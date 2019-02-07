# Pat Phy Dep site

### Intsalling project

Create project directory
> mkdir pat

Clone remote project from GitHub
> git clone https://github.com/sumtsow/pat

Set project directory as current
> cd pat

Load requred dependecies by Composer
> composer update

On Linux set write permissions to ***storage*** directory recursively. On Windows use GUI if required.
> chmod 777 storage -R

Make new ***.env*** file to Environment Options

On Linux
> cp .env.example .env

On Windows
> copy .env.example .env

Set Environment Options in ***.env*** file (for example)

> APP_NAME=Rise19CRM

> DB_DATABASE=pat

> DB_USERNAME=mysqluser

> DB_PASSWORD=password

Generate new Key File
> php artisan key:generate

Create new database for project and if nessesary create new users with database permissions. You can use any MySQL client or PhpMyAdmin

Migrate Database using Artisan
> php artisan migrate

and seed test data
> php artisan db:seed

Make Symlink from ***/storage/app/public*** to ***/public/storage***
> php artisan storage:link

**Intallation complete**.

Start your Laravel development server
> php artisan serve

There are some test database data on SQL format in ***/database/sql*** directory.
