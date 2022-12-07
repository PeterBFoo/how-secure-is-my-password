#COPY ./create-local-db.sql /tmp
#CMD [ "mysqld", "--init-file=/tmp/create-local-db.sql" ]

CMD ["sudo", "apt-get", "install", "php-mysql"]