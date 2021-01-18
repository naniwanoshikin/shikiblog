FROM mysql:8.0

ENV MYSQL_DATABASE=blog \
  MYSQL_USER=shikin \
  MYSQL_PASSWORD=blogshiki \
  MYSQL_ROOT_PASSWORD=blogshiki \
  TZ=Asia/Tokyo

COPY ./my.cnf /etc/mysql/conf.d/my.cnf
RUN chmod 644 /etc/mysql/conf.d/my.cnf