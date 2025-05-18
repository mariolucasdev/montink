# up docker containers
app:
	@echo " \n 🏗️  Down containers docker... \n"
	@docker compose down

	@echo " \n 🏗️  Build containers docker... \n"
	@docker compose up -d
	@echo " \n ✅ Docker containers stated successfully. \n"

	@docker compose exec -it app git config --global --add safe.directory /var/www/html

	@echo " \n 🏗️  Installing composer packages... \n"
	@docker compose exec -it app composer install
	@echo " \n ✅ Composer packages installed \n"

	@echo " \n ⭐ Montink is being installed..."
	@echo " \n ℹ️  Run migrations in: http://montink.localhost/migrate"
pint:
	@docker compose exec -it app ./vendor/bin/pint ./application/controllers
	@echo " \n ✅ Pint executed successfully \n"