ARG VARIANT=8-bullseye
FROM mcr.microsoft.com/vscode/devcontainers/php:0-${VARIANT}

RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
    && apt-get install -y mariadb-client \
        libfreetype6-dev \
        libjpeg-dev \
        libpng-dev \
        libpq-dev \
        libzip-dev \
    && apt-get clean -y && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg=/usr

RUN docker-php-ext-install -j "$(nproc)" gd opcache mysqli pdo pdo_mysql zip

ARG NODE_VERSION="none"
RUN if [ "${NODE_VERSION}" != "none" ]; then su vscode -c "umask 0002 && . /usr/local/share/nvm/nvm.sh && nvm install ${NODE_VERSION} 2>&1"; fi

RUN sudo curl -fsSL -o /usr/local/bin/drush "https://github.com/drush-ops/drush-launcher/releases/latest/download/drush.phar" && \
  sudo chmod +x /usr/local/bin/drush

# Stop xdebug spaming
RUN echo "xdebug.log=/dev/null" >> /usr/local/etc/php/conf.d/xdebug.ini

COPY ./apache.conf /etc/apache2/sites-enabled/apache.conf
RUN echo "export APACHE_RUN_USER=vscode" >> /etc/apache2/envvars;
RUN echo "export APACHE_RUN_GROUP=vscode" >> /etc/apache2/envvars;
