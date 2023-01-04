FROM ubuntu:20.04

RUN apt-get update
RUN apt-get upgrade -y

RUN apt-get install -y zip unzip tzdata curl
RUN apt-get install -y php7.4
RUN apt-get install -y apache2 libapache2-mod-php7.4

RUN rm /var/www/html/index.html
RUN rm /etc/apache2/apache2.conf
COPY ./src /var/www/html/
RUN chmod 777 /var/www/html/upload/
COPY ./run.sh /usr/sbin/
COPY ./000-default.conf /etc/apache2/sites-enabled/
COPY ./apache2.conf /etc/apache2/

RUN a2enmod rewrite
RUN chmod +x /usr/sbin/run.sh

COPY ./flag.c /flag.c
RUN apt install -y gcc \
    && gcc /flag.c -o /flag \
    && chmod 111 /flag && rm /flag.c

EXPOSE 80

CMD ["/usr/sbin/run.sh"]