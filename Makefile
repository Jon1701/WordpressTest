# Variables for Docker containers.
CONTAINER_NAME_WP=container-wp
CONTAINER_NAME_DB=container-db

PLUGIN_NAME=hyperion

# Folder variables.
REMOTE_WP_PLUGINS_FOLDER=/var/www/html/wp-content/plugins

build:
	./node_modules/.bin/webpack

copy-plugin: build
	@docker exec ${CONTAINER_NAME_WP} rm -Rf ${REMOTE_WP_PLUGINS_FOLDER}/${PLUGIN_NAME}
	@docker cp ./${PLUGIN_NAME} ${CONTAINER_NAME_WP}:${REMOTE_WP_PLUGINS_FOLDER}
	@docker exec ${CONTAINER_NAME_WP} chown -R www-data:www-data ${REMOTE_WP_PLUGINS_FOLDER}/${PLUGIN_NAME}

start:
	@docker-compose up -d

stop:
	@docker-compose down
