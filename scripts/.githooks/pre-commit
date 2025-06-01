#!/bin/bash

echo "🪝 pre-commit hook"
# Blocca lo script in caso di errore
set -e

# Trova tutti i file PHP modificati (aggiunti, copiati, modificati, rinominati)
changed_php_files=$(git diff --cached --name-only --diff-filter=ACMR | grep -E '\.php$')

if [[ -z "$changed_php_files" ]]; then
    echo "✅ Nessun file PHP modificato."
    exit 0
fi

echo "🔍 File PHP modificati:"
echo "$changed_php_files"

# Esempio: esegui PHPStan sui file modificati
# echo "🚦 Avvio PHPStan..."
# vendor/bin/phpstan analyse $changed_php_files

echo "🚦 Avvio PHPCS"
vendor/bin/phpcs --standard=PHPCompatibility --runtime-set testVersion 8.4 $changed_php_files
