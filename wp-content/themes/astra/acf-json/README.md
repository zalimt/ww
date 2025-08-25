# ACF JSON Sync Directory

This directory is used by Advanced Custom Fields (ACF) to store field group definitions as JSON files for version control and synchronization between environments.

## Purpose
- **Backup**: Field groups are automatically saved here when modified in the admin
- **Version Control**: JSON files can be committed to git for team collaboration
- **Sync**: Field groups are automatically loaded from these files on other environments

## How it works
- When you save a field group in the admin, ACF creates/updates a JSON file here
- When you deploy to another environment, ACF loads the field groups from these JSON files
- This ensures field group consistency across development, staging, and production

## File naming
ACF automatically names files using the pattern: `group_[unique_id].json`

## Note
This directory was created for the Astra parent theme as part of the Wise Wolves child theme ACF integration.
