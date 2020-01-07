FROM centos:7.4.1708

RUN yum clean all && yum -y update
RUN yum -y install epel-release
RUN yum -y install http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
RUN yum-config-manager --enable remi-php73
RUN yum -y install mod_ssl php73 php73-php php73-php-mbstring php73-php-mysqlnd php73-php-opcache php73-php-gd php73-php-mcrypt php73-php-xml php73-php-xmlrpc
RUN yum -y install zip unzip php73-php-zip
RUN ln -s /usr/bin/php73 /usr/bin/php


# apache
RUN yum -y --setopt=tsflags=nodocs update && \
    yum -y --setopt=tsflags=nodocs install httpd && \
    yum clean all
RUN sed -i -e "s/var\/www\/html/srv/g" /etc/httpd/conf/httpd.conf
RUN sed -i -e "s/    AllowOverride None/    AllowOverride All/g" /etc/httpd/conf/httpd.conf
RUN echo 'Timeout 600' >> /etc/httpd/conf/httpd.conf


# php
RUN sed -i -e "s/\;date.timezone =/date.timezone = \"Asia\/Tokyo\"/g" /etc/opt/remi/php73/php.ini
RUN sed -i -e "s/\;mbstring.internal_encoding =/mbstring.internal_encoding = \"UTF-8\"/g" /etc/opt/remi/php73/php.ini
RUN sed -i -e "s/\;mbstring.language =/mbstring.language =/g" /etc/opt/remi/php73/php.ini
RUN sed -i -e "s/memory_limit = 128M/memory_limit = 256M/g" /etc/opt/remi/php73/php.ini
RUN sed -i -e "s/post_max_size = 8M/post_max_size = 256M/g" /etc/opt/remi/php73/php.ini
RUN sed -i -e "s/upload_max_filesize = 2M/upload_max_filesize = 256M/g" /etc/opt/remi/php73/php.ini


# Install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN chmod +x composer-setup.php
RUN php composer-setup.php
#RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

WORKDIR /srv
