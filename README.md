# Bem vindo ao iMobi  - FLX
O iMobi está utilizando as mais recentes ferramentas do mercado, fique por dentro: 

 - [Laravel 5.8](https://laravel.com/docs/5.8) 
 - [Bootstrap 4.3](https://getbootstrap.com/docs/4.3/getting-started/introduction/)

# Assents
Para compilar os arquivos `css` e `js` execute os seguintes comandos:

 - Para desenvolvimento - `npm run dev`
 - Para produção - `npm run production`


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