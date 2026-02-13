<?php
/**
 * Global Configuration & Path Helpers
 * Updated for refactored v0 structure
 * 
 * This file provides centralized path management for the refactored application
 */

// ============================================================
// BASE PATHS (Use these instead of hardcoding paths)
// ============================================================

// Get the current script's directory to calculate base path
$_BASE_DIR = dirname(dirname(__FILE__));
$_APP_DIR = $_BASE_DIR . '/app';
$_RESOURCES_DIR = $_BASE_DIR . '/resources';
$_CONFIG_DIR = $_BASE_DIR . '/config';
$_DATABASE_DIR = $_BASE_DIR . '/database';
$_PUBLIC_DIR = $_BASE_DIR . '/public';

// ============================================================
// PATH CONSTANTS (Use these for consistent path references)
// ============================================================

define('BASE_PATH', $_BASE_DIR);
define('APP_PATH', $_APP_DIR);
define('RESOURCES_PATH', $_RESOURCES_DIR);
define('CONFIG_PATH', $_CONFIG_DIR);
define('DATABASE_PATH', $_DATABASE_DIR);
define('PUBLIC_PATH', $_PUBLIC_DIR);

define('LAYOUTS_PATH', RESOURCES_PATH . '/layouts');
define('COMPONENTS_PATH', RESOURCES_PATH . '/components');
define('MENU_PATH', RESOURCES_PATH . '/menu');
define('MODULES_PATH', APP_PATH . '/modules');
define('PAGES_PATH', APP_PATH . '/pages');
define('ACTIONS_PATH', APP_PATH . '/actions');
define('SEARCH_PATH', APP_PATH . '/search');
define('PROFILE_PATH', APP_PATH . '/profile');
define('REPORTS_PATH', APP_PATH . '/reports');

// ============================================================
// HELPER FUNCTIONS
// ============================================================

/**
 * Include a layout file
 * 
 * @param string $filename Layout filename (without path)
 * @return void
 */
function include_layout($filename) {
    $path = LAYOUTS_PATH . '/' . $filename;
    if (file_exists($path)) {
        include $path;
    } else {
        trigger_error("Layout file not found: $filename", E_USER_WARNING);
    }
}

/**
 * Include a component file
 * 
 * @param string $filename Component filename (without path)
 * @return void
 */
function include_component($filename) {
    $path = COMPONENTS_PATH . '/' . $filename;
    if (file_exists($path)) {
        include $path;
    } else {
        trigger_error("Component file not found: $filename", E_USER_WARNING);
    }
}

/**
 * Include a menu file
 * 
 * @param string $role_menu Menu filename (admin.php, user.php, etc.)
 * @return void
 */
function include_menu($role_menu) {
    $path = MENU_PATH . '/' . $role_menu;
    if (file_exists($path)) {
        include $path;
    } else {
        trigger_error("Menu file not found: $role_menu", E_USER_WARNING);
    }
}

/**
 * Include a module action file
 * 
 * @param string $module Module name (e.g., 'employee', 'category')
 * @param string $action Action file (e.g., 'add.php', 'edit.php')
 * @return void
 */
function include_module_action($module, $action) {
    $path = MODULES_PATH . '/' . $module . '/' . $action;
    if (file_exists($path)) {
        include $path;
    } else {
        trigger_error("Module action file not found: $module/$action", E_USER_WARNING);
    }
}

/**
 * Get the full path to a page
 * 
 * @param string $page Page filename (e.g., 'dashboard.php')
 * @return string Full path to page
 */
function get_page_path($page) {
    return PAGES_PATH . '/' . $page;
}

/**
 * Get the full path to a module resource
 * 
 * @param string $module Module name
 * @param string $file File within module
 * @return string Full path
 */
function get_module_path($module, $file) {
    return MODULES_PATH . '/' . $module . '/' . $file;
}
?>
