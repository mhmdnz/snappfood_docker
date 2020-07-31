# SnappFood

The Application is wrriten on Laravel, if you are not familier with the environment please check the link below:

[Laravel Installation](https://laravel.com/docs/7.x/installation)

[Code Repository](https://github.com/mhmdnz/snappfood_docker.git)
# Installation Guid

  - [Clone project from Git repository](#Clone project From Git)
  - [Edit ENV file](#Edit-env-File)
  - [Install Composer Packages](#Install Composer Packages)
  - [Run DB migrations](#Run DB migrations)
  - [Add laravel schedules to your cronjobs](#Add laravel schedules to your cronjobs)
  - [Run Tests](#Run Tests)

### Clone project From Git

```sh
$ mkdir snappfood
$ cd Snappfood
$ git clone "https://github.com/mhmdnz/snappfood_docker.git" .
```

### Edit env File

To run laravel applications you have to define your system configuration for the laravel in .env file

```sh
$ mv .env.example .env
$ vim .env
```

### Install Composer Packages

```sh
$ composer install
```

### Run DB migrations

> Do not forget to create your database and give it to the .env file or you will get and Error<br>
> - If you got any error you could simply use <strong>fresh</strong> parameter<br>
> - Or if you are not familier with laravel migrations just drop and create your database again
```sh
//Create database example
//login to mysql console then use below command
$ mysql -u{enter user name here} -p{enter password here}
$ Create Database Snappfood
```
```sh
$ php artisan migrate --seed
```

### Add laravel schedules to your cronjobs

```sh
$ crontab -e

//add folowing line to your crontab, Do not Forget to change the path of your project

* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

> this Schedule will run all the commands that I have designed for the project ,<br> For instance ,
> it will run the addStockCommand which will increase the amount of zero ingredients stock every 15 minutes  

### Run Tests

```sh
//you could run all the tests by running below command in the project root
$ phpunit
//or 
$ ./vendor/bin/phpunit
```

```sh
//you could run only one test by using this command
$ phpunit /address of the test
```

# Docker Installation Guid

  - [Clone project from Git repository](https://github.com/mhmdnz/snappfood_docker.git)
  - [Run Prepration File](#Run Prepration File)
  
```sh
//it will bring project up
$ docker-compose up --build -d
$ docker exec -it php sh /tmp/Prepration.sh
```

## Some helpful commands

```sh
//to Run Tests
$ docker exec -it php sh /tmp/RunTests.sh

//to get fresh migration
$ docker exec -it php sh /tmp/FreshMigrations.sh

//to run composer install
$ docker exec -it php sh /tmp/ComposerInstall.sh
```

> Please notice that, <br>
> - due to lack of time , test and environment database
    is same, and affect on each others so for the more accurate tests just run fresh migration 
> - you could simply change database data <br>
    just open "database/seeds" directory and feel free to make some changes for better tests 
