# Sviluppo del tema utilizzando Docker

Per evitare di installare e configurare PHP sulla propria macchina di lavoro,
si consiglia di utilizzare [Docker](https://www.docker.com/) per lo sviluppo e 
la contribuzione al tema.

1. Creare un file `docker-compose.yml` nella propria area di lavoro
come segue

```yaml
services:
  db:
    image: mariadb:10.6.4-focal
    command: '--default-authentication-plugin=mysql_native_password'
    volumes:
      - db_data:/var/lib/mysql
    restart: always
    environment:
      - MYSQL_ROOT_PASSWORD=somewordpress
      - MYSQL_DATABASE=wordpress
      - MYSQL_USER=wordpress
      - MYSQL_PASSWORD=wordpress
    expose:
      - 3306
  wordpress:
    image: wordpress:latest
    ports:
      - 8080:80
    restart: always
    environment:
      - WORDPRESS_DB_HOST=db
      - WORDPRESS_DB_USER=wordpress
      - WORDPRESS_DB_PASSWORD=wordpress
      - WORDPRESS_DB_NAME=wordpress
    volumes:
      - ./wp-content:/var/www/html/wp-content
    expose:
      - 8080
volumes:
  db_data:
```

2. Avviare i container 

```sh
docker-compose up
```

3. Installare Wordpress (disponibile all' indirizzo[http://localhost:8080](http://localhost:8080))

4. Clonare all'interno della cartella `wp-content/themes/` il tema e installarlo 
seguendo la classica procedura.
