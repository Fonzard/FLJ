# Utiliser une image de base avec PHP et Apache
FROM php:7.4-apache


# Installez Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installer les extensions PHP nécessaires pour Symfony
RUN docker-php-ext-install pdo pdo_mysql

# Activer les modules Apache requis pour Symfony
RUN a2enmod rewrite

# Installer Node.js et NPM pour React
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get update && apt-get install -y nodejs

# Définir le répertoire de travail dans le conteneur
WORKDIR /var/www/html

# Copier les fichiers de votre application Symfony dans le conteneur
COPY . .

# Installer les dépendances JavaScript (React)
RUN npm install

# Compiler les actifs (par exemple, avec Webpack Encore pour Symfony)
RUN npm run build

# Exposer le port 80 pour Apache
EXPOSE 80

# Commande pour démarrer Apache
CMD ["apache2-foreground"]
