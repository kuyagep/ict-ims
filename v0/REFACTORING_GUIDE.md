# v0 Refactoring Guide

## New Directory Structure

```
v0/
├── config/                          # Configuration files
│   ├── database.php                 # Database connection
│   ├── verify.php                   # Authentication logic
│   └── constants.php                # (New) Application constants
│
├── resources/                       # Static/reusable resources
│   ├── layouts/                     # Page layout templates
│   │   ├── header.php
│   │   ├── footer.php
│   │   ├── navbar.php
│   │   ├── sidebar.php
│   │   ├── preloader.php
│   │   └── content_header.php
│   │
│   ├── components/                  # Reusable UI components
│   │   ├── modals.php
│   │   ├── message.php
│   │   └── logo.php
│   │
│   └── menu/                        # Role-based menus
│       ├── admin.php
│       ├── superadmin.php
│       └── user.php
│
├── app/
│   ├── pages/                       # View/Page files
│   │   ├── dashboard.php
│   │   ├── employee.php
│   │   ├── employee_view.php
│   │   ├── employee_edit.php
│   │   ├── category.php
│   │   ├── category_edit.php
│   │   ├── items.php
│   │   ├── item_edit.php
│   │   ├── item_profile.php
│   │   ├── owned_items.php
│   │   ├── owned_items_view.php
│   │   ├── office.php
│   │   ├── office_edit.php
│   │   ├── position.php
│   │   ├── position_edit.php
│   │   ├── role.php
│   │   ├── role_edit.php
│   │   ├── suppliers.php
│   │   ├── supplier_edit.php
│   │   ├── profile.php
│   │   ├── user_dashboard.php
│   │   ├── self_inventory.php
│   │   ├── inventory.php
│   │   ├── ict_edit.php
│   │   ├── print_items.php
│   │   ├── error_404.php
│   │   └── enhance_results.php
│   │
│   ├── actions/                     # AJAX/Action handlers
│   │   ├── advance_search.php
│   │   └── allcode.php
│   │
│   ├── modules/                     # Feature modules (grouped by entity)
│   │   ├── employee/
│   │   │   ├── add.php
│   │   │   ├── edit.php
│   │   │   ├── update.php
│   │   │   ├── delete.php
│   │   │   └── search_result.php
│   │   │
│   │   ├── category/
│   │   │   ├── add.php
│   │   │   ├── edit.php
│   │   │   ├── update.php
│   │   │   └── delete.php
│   │   │
│   │   ├── item/
│   │   │   ├── add.php
│   │   │   ├── edit.php
│   │   │   ├── update.php
│   │   │   ├── delete.php
│   │   │   ├── ict_edit.php
│   │   │   └── remove_photo.php
│   │   │
│   │   ├── office/
│   │   │   ├── add.php
│   │   │   ├── edit.php
│   │   │   ├── update.php
│   │   │   └── delete.php
│   │   │
│   │   ├── position/
│   │   │   ├── add.php
│   │   │   ├── edit.php
│   │   │   ├── update.php
│   │   │   └── delete.php
│   │   │
│   │   ├── role/
│   │   │   ├── add.php
│   │   │   ├── edit.php
│   │   │   ├── update.php
│   │   │   └── delete.php
│   │   │
│   │   ├── supplier/
│   │   │   ├── add.php
│   │   │   ├── edit.php
│   │   │   ├── update.php
│   │   │   └── delete.php
│   │   │
│   │   ├── inventory/
│   │   │   ├── add.php
│   │   │   ├── edit.php
│   │   │   ├── update.php
│   │   │   └── delete.php
│   │   │
│   │   ├── item_status/
│   │   │   ├── add.php
│   │   │   ├── edit.php
│   │   │   ├── update.php
│   │   │   └── delete.php
│   │   │
│   │   └── owned_items/
│   │       ├── edit.php
│   │       └── update.php
│   │
│   ├── profile/                     # User profile management
│   │   ├── view.php
│   │   ├── edit.php
│   │   ├── update_password.php
│   │   └── update_profile.php
│   │
│   ├── reports/                     # Reports functionality
│   │   ├── view.php
│   │   ├── print.php
│   │   └── search_result.php
│   │
│   └── search/                      # Search functionality
│       ├── advance_search.php
│       └── enhance_results.php
│
├── public/                          # Public assets
│   ├── dist/                        # Compiled/static files (JS, CSS, images)
│   ├── plugins/                     # External plugins
│   └── uploads/                     # User-uploaded files
│
├── database/
│   └── ict_ims_db.sql
│
├── index.php                        # Entry point
├── .htaccess                        # Server configuration
└── REFACTORING_GUIDE.md            # This file
```

## Migration Instructions

### Phase 1: Layout Files
Move these files to `resources/layouts/`:
- header.php
- footer.php
- navbar.php
- navbar-user.php
- sidebar.php
- preloader.php
- content_header.php

### Phase 2: Component Files
Move these files to `resources/components/`:
- modals.php
- message.php
- logo.php

### Phase 3: Menu Files
Move these files to `resources/menu/`:
- menu/admin.php
- menu/superadmin.php
- menu/user.php

### Phase 4: Pages
Move all page view files to `app/pages/`:
- dashboard.php
- employee.php → employee.php
- employee-view.php → employee_view.php
- employee-edit.php → employee_edit.php
- category.php
- category-edit.php → category_edit.php
- items.php
- item-edit.php → item_edit.php
- item_profile.php → item_profile.php
- owned-items.php → owned_items.php
- owned-items-view.php → owned_items_view.php
- office.php
- office-edit.php → office_edit.php
- position.php
- position-edit.php → position_edit.php
- role.php
- role-edit.php → role_edit.php
- suppliers.php
- supplier-edit.php → supplier_edit.php
- profile.php
- user-dashboard.php → user_dashboard.php
- self-inventory.php
- inventory.php
- ict-edit.php → ict_edit.php
- print-items.php → print_items.php
- error-404.php → error_404.php
- enhance_results.php

### Phase 5: Action Modules
Reorganize action files into modules:

**Employee Module** (`app/modules/employee/`):
- add-employee.php → add.php
- edit-employee.php → edit.php
- update-employee.php → update.php
- delete-employee.php → delete.php
- delete-employee-item.php → delete_item.php (or keep separate)
- search_result.php

**Category Module** (`app/modules/category/`):
- add-category.php → add.php
- edit-category.php → edit.php
- update-category.php → update.php
- delete-category.php → delete.php

*(Similar pattern for other modules)*

### Phase 6: Search & Reports
**Search** (`app/search/`):
- advance_search.php
- enhance_results.php
- search_result.php
- search_result_navbar.php

**Reports** (`app/reports/`):
- reports.php → view.php
- print.php

**Profile** (`app/profile/`):
- edit-profile.php → edit.php
- update-profile.php → update.php
- update-password.php

## Include Path Updates

After migration, update all include/require paths:

**Old:**
```php
include('config/database.php');
include('app/message.php');
include('app/header.php');
```

**New:**
```php
require_once('../config/database.php');
require_once('../resources/components/message.php');
require_once('../resources/layouts/header.php');
```

## Naming Convention Changes

All hyphens replaced with underscores:
- `category-edit.php` → `category_edit.php`
- `delete-employee.php` → `delete.php` (within module)
- `self-inventory.php` → `self_inventory.php`

## Benefits of New Structure

✅ **Clear Separation of Concerns**: Pages, resources, and logic separated
✅ **Better Organization**: Related files grouped in modules
✅ **Easier Navigation**: Developers can find files more easily
✅ **Scalability**: Adding new modules follows clear pattern
✅ **Maintainability**: Consistent structure and naming conventions
✅ **Reusability**: Resources folder contains reusable components
