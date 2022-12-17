FROM mcr.microsoft.com/devcontainers/php:0-8.2-bullseye

RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
    && apt-get install -y mariadb-client \ 
        libfreetype6-dev \
        libjpeg-dev \
        libpng-dev \
        libwebp-dev \
        libpq-dev \
        libzip-dev \
    && apt-get clean -y && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp

# Install php-mysql driver
RUN docker-php-ext-install -j "$(nproc)" gd mysqli pdo pdo_mysql zip

# [Optional] Uncomment this section to install additional OS packages.
# RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
#     && apt-get -y install --no-install-recommends <your-package-list-here>

# [Optional] Uncomment this line to install global node packages.
# RUN su vscode -c "source /usr/local/share/nvm/nvm.sh && npm install -g <your-package-here>" 2>&1

# Stop xdebug spaming
RUN echo "xdebug.log=/dev/null" >> /usr/local/etc/php/conf.d/xdebug.ini

COPY ./apache.conf /etc/apache2/sites-enabled/apache.conf
RUN echo "export APACHE_RUN_USER=vscode" >> /etc/apache2/envvars;
RUN echo "export APACHE_RUN_GROUP=vscode" >> /etc/apache2/envvars;
