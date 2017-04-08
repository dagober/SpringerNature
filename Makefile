# vi:set tabstop=4 shiftwidth=4 noexpandtab:
DOCKER_LOGIN = $(shell aws ecr get-login --region $$AWS_REGION)

all: install

check.requirements:
	@command -v aws &>/dev/null
	@command -v php &>/dev/null
	@command -v docker &>/dev/null
	@command -v docker-compose &>/dev/null
	@command -v direnv &>/dev/null
	@test -n "$$DIRENV_DIR"

install:
	@$(MAKE) check.requirements
	@$(MAKE) install.composer
	@php composer.phar install
	@$(MAKE) docker.login
	@$(MAKE) docker.pull
	@cp -rf hooks/* .git/hooks/

install.composer:
	@if [ ! -f composer.phar ]; then curl -fSsLO https://github.com/composer/composer/releases/download/1.2.0/composer.phar; fi

docker.login:
	@$(DOCKER_LOGIN)

docker.pull:
	@docker-compose pull

docker.chrome:
	@docker-compose up -d chrome

docker.firefox:
	@docker-compose up -d firefox

docker.startvideo:
	@docker-compose stop chrome
	@docker-compose rm -f chrome
	@VIDEO=true docker-compose up -d chrome

docker.stopvideo:
	@docker-compose stop chrome

