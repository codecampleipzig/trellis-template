<?php
/**
 * Configuration overrides for WP_ENV === 'staging'
 */

use Roots\WPConfig\Config;

/**
 * You should try to keep staging as close to production as possible. However,
 * should you need to, you can always override production configuration values
 * with `Config::define`.
 *
 * Example: `Config::define('WP_DEBUG', true);`
 * Example: `Config::define('DISALLOW_FILE_MODS', false);`
 */

Config::define('WP_DEBUG', true);
Config::define('WPCACHEHOME', getenv('WPCACHEHOME'));
Config::define('WP_CACHE', true);

define('DISABLED_PLUGINS', serialize([
    'google-sitemap-generator/sitemap.php',
    'redirection/redirection.php',
    'wp-statistics/wp-statistics.php'
]));

define('ENABLED_PLUGINS', serialize([
    'autoptimize/autoptimize.php',
    'simple-history/index.php',
    'wp-super-cache/wp-cache.php'
]));
