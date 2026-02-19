.PHONY: lint test clean zip install

# Variables
THEME_NAME = starter-theme
ZIP_NAME = $(THEME_NAME).zip
PHP_FILES = $(shell find . -name "*.php" -not -path "./vendor/*" -not -path "./tests/*")

# Default target
all: lint test

# Install dependencies
install:
	@echo "Installing PHP dependencies..."
	@composer install --no-dev --optimize-autoloader

# Lint PHP files
lint:
	@echo "Running PHP syntax check..."
	@for file in $(PHP_FILES); do \
		php -l $$file || exit 1; \
	done
	@echo "Running PHPCS..."
	@if command -v phpcs >/dev/null 2>&1; then \
		phpcs --standard=phpcs.xml .; \
	else \
		echo "PHPCS not found. Install via: composer global require squizlabs/php_codesniffer"; \
	fi

# Run tests
test:
	@echo "Running PHPUnit tests..."
	@if [ -f vendor/bin/phpunit ]; then \
		vendor/bin/phpunit; \
	else \
		echo "PHPUnit not found. Run 'make install' first."; \
	fi

# Clean build artifacts
clean:
	@echo "Cleaning build artifacts..."
	@rm -f $(ZIP_NAME)
	@rm -rf vendor/
	@rm -f .phpunit.result.cache
	@echo "Clean complete."

# Create distribution zip
zip: clean lint
	@echo "Creating theme zip..."
	@zip -r $(ZIP_NAME) . \
		-x "*.git*" \
		-x "node_modules/*" \
		-x "vendor/*" \
		-x "tests/*" \
		-x "Makefile" \
		-x "phpcs.xml" \
		-x "composer.json" \
		-x "composer.lock" \
		-x ".phpunit.result.cache"
	@echo "Created $(ZIP_NAME)"

# Development helpers
dev-setup:
	@echo "Setting up development environment..."
	@composer install
	@if ! command -v phpcs >/dev/null 2>&1; then \
		echo "Installing PHPCS globally..."; \
		composer global require squizlabs/php_codesniffer; \
		composer global require wp-coding-standards/wpcs; \
		phpcs --config-set installed_paths ~/.composer/vendor/wp-coding-standards/wpcs; \
	fi

# Fix coding standards
fix:
	@echo "Auto-fixing coding standards..."
	@if command -v phpcbf >/dev/null 2>&1; then \
		phpcbf --standard=phpcs.xml .; \
	else \
		echo "PHPCBF not found. Install via: composer global require squizlabs/php_codesniffer"; \
	fi