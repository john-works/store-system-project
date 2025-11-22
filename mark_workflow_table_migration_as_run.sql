-- SQL script to manually mark the migration '2025_10_30_080436_create_workflow_table' as run
-- Execute this script on your MySQL database to avoid migration conflicts

INSERT INTO migrations (migration, batch) 
SELECT '2025_10_30_080436_create_workflow_table', 
       COALESCE(MAX(batch), 0) + 1 
FROM migrations;
