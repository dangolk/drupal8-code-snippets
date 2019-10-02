# Clear Routing Cache using Drush:
vendor/drush/drush/drush ev '\Drupal::service("router.builder")->rebuild();

# Clear Cache (Rebuild Cache) using Drush Console:
drupal cache:rebuild
(from project root folder)

# List all registered routes:
drupal router:debug

# Find specific route using wildcard:
drupal router:debug | grep '{keyword}'
e.g. drupal router:debug | grep 'ajax'

# Find detailed information about specific route:
drupal router:debug {route machine name}
e.g. drupal router:debug views.ajax
