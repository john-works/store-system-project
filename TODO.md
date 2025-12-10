# Fix Page Refresh Errors

## Issues Identified
1. **Duplicate 'table1' declaration** in multiple index.blade.php files - two script blocks declare the same variable.
2. **Duplicate 'sidebarItems' declaration** - main.js loaded multiple times.
3. **Duplicate <div id="app">** in multiple index.blade.php files, conflicting with layout.
4. **Dashboard.js errors** - trying to render charts on non-existent elements.
5. **Duplicate script inclusions** in multiple index.blade.php files.

## Tasks
- [x] Remove duplicate <div id="app"> from contracts/index.blade.php
- [x] Remove duplicate <div id="app"> from home.blade.php
- [x] Remove duplicate script blocks in contracts/index.blade.php
- [x] Remove duplicate <div id="app"> from items/index.blade.php
- [x] Remove duplicate script blocks in items/index.blade.php
- [x] Remove duplicate <div id="app"> from borrowings/index.blade.php
- [x] Remove duplicate script blocks in borrowings/index.blade.php
- [x] Remove duplicate <div id="app"> from disposals/index.blade.php
- [x] Remove duplicate script blocks in disposals/index.blade.php
- [x] Modify dashboard.js to check for element existence before rendering
- [x] Ensure scripts are loaded only once per page
