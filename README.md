# Bem vindo ao iMobi - FLX

O iMobi est� utilizando as mais recentes ferramentas do mercado, fique por dentro:

- [Laravel 5.8](https://laravel.com/docs/5.8)
- [Bootstrap 4.3](https://getbootstrap.com/docs/4.3/getting-started/introduction/)

# Assents

Para compilar os arquivos `css` e `js` execute os seguintes comandos:

- Para desenvolvimento - `npm run dev`
- Para produ��o - `npm run production`

# Instalando o Projeto

Execute os seguintes comandos no terminal:

```
git clone https://bitbucket.org/hugoBarbato/flx.git
mv flx/* .
mv flx/.* .
rmdir flx/

# php version
sudo add-apt-repository ppa:ondrej/php -y
sudo apt-get update -y
sudo apt-get install php7.1-curl php7.1-cli php7.1-dev php7.1-gd php7.1-intl php7.1-mcrypt php7.1-json php7.1-mysql php7.1-opcache php7.1-bcmath php7.1-mbstring php7.1-soap php7.1-xml php7.1-zip -y
sudo mv /etc/apache2/envvars /etc/apache2/envvars.bak
sudo apt-get remove libapache2-mod-php5 -y
sudo apt-get install libapache2-mod-php7.1 -y
sudo cp /etc/apache2/envvars.bak /etc/apache2/envvars

# Set 'Run Project'
sudo nano /etc/apache2/sites-enabled/001-cloud9.conf
// Change this line
DocumentRoot /home/ubuntu/workspace
// To following
DocumentRoot /home/ubuntu/workspace/public

# database
mysql-ctl cli
use c9;
select @@hostname;
exit

# phpmyadmin
phpmyadmin-ctl install

# .env
cp .env.example .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=c9
DB_USERNAME=root
DB_PASSWORD=

#Dep. do Laravel
sudo composer install
npm install
php artisan key:generate
php artisan migrate

```

> Server installs

```
Skip to content

Search or jump to�

Pull requests
Issues
Marketplace
Explore

@hugobr02
5
22 14 dev-nowornet/Laravel-5.8-Complete-Installation-Cloud9-C9
 Code  Issues 1  Pull requests 0  Projects 0  Wiki  Insights
Laravel-5.8-Complete-Installation-Cloud9-C9
/
laravel.sh
@dev-nowornet dev-nowornet Update laravel.sh
0b9e403 27 days ago
53 lines (45 sloc)  1.71 KB

# Clear existing files
#
rm hello-world.php php.ini README.md

# Install and configure PHP 7.1 Ondrej Repository
#
sudo add-apt-repository ppa:ondrej/php -y
sudo apt-get update
sudo apt-get install libapache2-mod-php7.1 -y
sudo a2dismod php5
sudo a2enmod php7.1
sudo apt-get install php7.1-curl php7.1-cli php7.1-dev php7.1-gd php7.1-intl php7.1-mcrypt php7.1-json php7.1-mysql php7.1-opcache php7.1-bcmath php7.1-mbstring php7.1-soap php7.1-xml php7.1-zip -y

#Install Laravel
#
sudo composer global require 'laravel/installer'
export PATH=~/.composer/vendor/bin:$PATH
sudo chown -R $USER $HOME/.composer
laravel new
rm -rf ./composer

#Configure public folder
#
printf '%s\n' ':%s/DocumentRoot\ \/home\/ubuntu\/workspace/DocumentRoot\ \/home\/ubuntu\/workspace\/public/g' 'x'  | sudo ex /etc/apache2/sites-enabled/001-cloud9.conf

#Select and install the mysql version 5.7 or up
#
wget https://dev.mysql.com/get/mysql-apt-config_0.8.9-1_all.deb
sudo dpkg -i mysql-apt-config_0.8.9-1_all.deb
sudo service apache2 restart
sudo apt-get update
sudo apt-get install mysql-server -y
sudo service  mysql restart
sudo mysql_upgrade

#Configure database and .env file database=laravel, user=root, no password
#
sudo mysql --user="root" -e "CREATE DATABASE laravel character set UTF8mb4 collate utf8mb4_bin;"
printf '%s\n' ':%s/DB_DATABASE=homestead/DB_DATABASE=laravel/g' 'x'  | sudo ex .env
printf '%s\n' ':%s/DB_USERNAME=homestead/DB_USERNAME=root/g' 'x'  | sudo ex .env
printf '%s\n' ':%s/DB_PASSWORD=secret/DB_PASSWORD=/g' 'x'  | sudo ex .env

#Artisan auth scaffolding and migration
#
#php artisan make:auth
#php artisan migrate

#remove laravel installer
#
rm -rf laravel.sh
rm -rf mysql-apt-config_0.8.9-1_all.deb
#Edited by Bretfelean Sorin Cristian
� 2019 GitHub, Inc.
Terms
Privacy
Security
Status
Help
Contact GitHub
Pricing
API
Training
Blog
About

```

<div class="col-md-12">
    <!-- <div class="scroll-imagem">  -->
    <!-- d-flex flex-wrap -->
        @foreach($imovel->imagens as $id=>$img)
        <!-- <div class="small-img-controls" data-target="#detail_imovel_carousel"data-slide-to="{{$id}}" class="active">
            <img width="70" height="50" src="{{env('APP_URL').'/images/lg/'.$img->cd_imovel.'/'.$img->nm_link}}" onerror=' this.src = "/images/default.png"'>
        </div> -->
        @endforeach
    <!-- </div> -->
</div>
