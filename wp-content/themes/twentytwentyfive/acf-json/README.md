# ACF JSON Sync

This directory contains JSON files for Advanced Custom Fields (ACF) field groups.

## What is ACF JSON?

ACF can save and load field groups, fields and other settings as JSON files stored within your theme. This feature allows for version control of your fields and synchronization across different environments.

## How it works

- **Save**: When you save a field group in the WordPress admin, ACF will automatically generate a JSON file in this directory
- **Load**: ACF will automatically load field groups from JSON files found in this directory
- **Sync**: If changes are detected between the database and JSON files, ACF will show a sync notification

## Benefits

- Version control your field configurations with Git
- Sync field groups across development, staging, and production environments
- Share field configurations with team members
- Backup your field configurations in code

## Usage

1. Create or edit field groups in the WordPress admin (Tools > ACF)
2. JSON files will be automatically saved to this directory
3. Commit the JSON files to your Git repository
4. On other environments, ACF will prompt you to sync the field groups

## Important Notes

- Always sync field groups when prompted by ACF
- JSON files take precedence over database settings
- Make sure this directory has write permissions for your web server
