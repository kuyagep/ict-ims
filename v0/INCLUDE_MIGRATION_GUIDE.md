# Include Path Migration Guide

## Quick Reference: New Include Patterns

After the v0 refactoring, update all include/require statements. Use the new `config/paths.php` file for consistent path management.

### OLD vs NEW Pattern

#### Method 1: Using Helper Functions (Recommended)

```php
// OLD (avoid)
include('app/header.php');
include('app/footer.php');
include('app/message.php');

// NEW (recommended)
require_once('../../config/paths.php');  // Include once in your page
include_layout('header.php');
include_layout('footer.php');
include_component('message.php');
```

#### Method 2: Using Path Constants

```php
// OLD
include('app/navbar.php');

// NEW
require_once('../../config/paths.php');
include(LAYOUTS_PATH . '/navbar.php');
```

## File Structure Mapping

### Layout Files (Resources → Layouts)
| Old Path | New Path |
|----------|----------|
| `app/header.php` | `resources/layouts/header.php` |
| `app/footer.php` | `resources/layouts/footer.php` |
| `app/navbar.php` | `resources/layouts/navbar.php` |
| `app/navbar-user.php` | `resources/layouts/navbar_user.php` |
| `app/sidebar.php` | `resources/layouts/sidebar.php` |
| `app/preloader.php` | `resources/layouts/preloader.php` |
| `app/content_header.php` | `resources/layouts/content_header.php` |

### Component Files (Resources → Components)
| Old Path | New Path |
|----------|----------|
| `app/modals.php` | `resources/components/modals.php` |
| `app/message.php` | `resources/components/message.php` |
| `app/logo.php` | `resources/components/logo.php` |

### Menu Files (Resources → Menu)
| Old Path | New Path |
|----------|----------|
| `app/menu/admin.php` | `resources/menu/admin.php` |
| `app/menu/superadmin.php` | `resources/menu/superadmin.php` |
| `app/menu/user.php` | `resources/menu/user.php` |

### Page Files (App → Pages)
All page view files now use underscores instead of hyphens:

| Old Path | New Path |
|----------|----------|
| `app/dashboard.php` | `app/pages/dashboard.php` |
| `app/employee.php` | `app/pages/employee.php` |
| `app/employee-view.php` | `app/pages/employee_view.php` |
| `app/employee-edit.php` | `app/pages/employee_edit.php` |
| `app/category-edit.php` | `app/pages/category_edit.php` |
| `app/item-edit.php` | `app/pages/item_edit.php` |
| `app/user-dashboard.php` | `app/pages/user_dashboard.php` |
| `app/self-inventory.php` | `app/pages/self_inventory.php` |
| `app/ict-edit.php` | `app/pages/ict_edit.php` |
| `app/print-items.php` | `app/pages/print_items.php` |
| `app/error-404.php` | `app/pages/error_404.php` |

### Module Action Files

Example: Employee Module
```
Old:
app/action/admin/add-employee.php
app/action/admin/edit-employee.php
app/action/admin/update-employee.php
app/action/admin/delete-employee.php

New:
app/modules/employee/add.php
app/modules/employee/edit.php
app/modules/employee/update.php
app/modules/employee/delete.php
```

Similar structure for: category, item, office, position, role, supplier, item_status

## Complete Include Path Conversion Examples

### Example 1: Dashboard Page

```php
<?php
// OLD CODE (before refactoring)
session_start();
include('../config/database.php');
include('../app/header.php');
include('../app/navbar.php');
include('../app/sidebar.php');
include('../app/message.php');

// Dashboard content...

include('../app/footer.php');
?>
```

```php
<?php
// NEW CODE (after refactoring)
session_start();
require_once('../config/database.php');
require_once('../config/paths.php');  // Centralized paths

include_layout('header.php');
include_layout('navbar.php');
include_layout('sidebar.php');
include_component('message.php');

// Dashboard content...

include_layout('footer.php');
?>
```

### Example 2: Page with Module Actions

```php
<?php
// OLD
include('../config/database.php');
include('../app/action/admin/add-employee.php');

// NEW
require_once('../config/database.php');
require_once('../config/paths.php');
include_module_action('employee', 'add.php');
// OR
include(get_module_path('employee', 'add.php'));
```

### Example 3: Menu Based on Role

```php
<?php
// OLD
if($_SESSION['role_id'] == 1) {
    include('../app/menu/admin.php');
} elseif($_SESSION['role_id'] == 3) {
    include('../app/menu/user.php');
}

// NEW
require_once('../config/paths.php');
$menu_file = $_SESSION['role_id'] == 1 ? 'admin.php' : 'user.php';
include_menu($menu_file);
```

## Path Constants Available (from config/paths.php)

```php
BASE_PATH              // /v0
APP_PATH              // /v0/app
RESOURCES_PATH        // /v0/resources
CONFIG_PATH           // /v0/config
DATABASE_PATH         // /v0/database
PUBLIC_PATH           // /v0/public
LAYOUTS_PATH          // /v0/resources/layouts
COMPONENTS_PATH       // /v0/resources/components
MENU_PATH             // /v0/resources/menu
MODULES_PATH          // /v0/app/modules
PAGES_PATH            // /v0/app/pages
ACTIONS_PATH          // /v0/app/actions
SEARCH_PATH           // /v0/app/search
PROFILE_PATH          // /v0/app/profile
REPORTS_PATH          // /v0/app/reports
```

## Helper Functions Available

```php
// Include layout files
include_layout('header.php');
include_layout('navbar.php');

// Include components
include_component('modals.php');
include_component('message.php');

// Include menus
include_menu('admin.php');
include_menu('user.php');

// Include module actions
include_module_action('employee', 'add.php');

// Get paths
get_page_path('dashboard.php');           // Returns full path
get_module_path('employee', 'edit.php');  // Returns full path
```

## Migration Checklist

- [ ] Add `require_once('../config/paths.php');` to the top of files
- [ ] Replace all `include('app/header.php')` with `include_layout('header.php')`
- [ ] Replace all `include('app/message.php')` with `include_component('message.php')`
- [ ] Replace all `include('app/menu/...')` with `include_menu('...')`
- [ ] Update links to pages: `pages/employee.php` not `employee.php`
- [ ] Update links to actions: Point to module directories
- [ ] Test all page loads and form submissions

## Testing Include Changes

After updating includes, verify:
1. Pages load without errors
2. Layouts render correctly (headers, footers)
3. Menus display based on user role
4. Form submissions work and redirect to correct modules
5. Styling and assets load properly
