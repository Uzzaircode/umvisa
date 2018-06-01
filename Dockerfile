FROM php:7.1.7-fpm-alpine
ENV APP_HOME /app/web-root/app4
RUN mkdir -p $APP_HOME
COPY . $APP_HOME
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer
RUN apk add --no-cache imap-dev openssl-dev krb5-dev libxml2-dev
RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
        && docker-php-ext-install iconv pdo pdo_mysql soap mbstring tokenizer xml imap
WORKDIR $APP_HOME
RUN cd $APP_HOME
RUN composer install --no-interaction
RUN chmod 777 -R storage
