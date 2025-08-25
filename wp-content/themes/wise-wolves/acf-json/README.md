# ACF JSON Sync - Wise Wolves Child Theme

This directory contains JSON files for Advanced Custom Fields (ACF) field groups specific to the Wise Wolves theme.

## Child Theme ACF Configuration

This child theme is configured to:

1. **Save** new field groups to this directory (`wise-wolves/acf-json/`)
2. **Load** field groups from:
   - Child theme directory (priority: 1st) - `wise-wolves/acf-json/`
   - Parent theme directory (fallback: 2nd) - `twentytwentyfive/acf-json/`

## How it works

- When you create or edit field groups, they'll be saved as JSON files in this child theme directory
- This ensures your custom fields are preserved even when the parent theme is updated
- Field groups in the child theme will override any matching field groups in the parent theme
- This follows WordPress child theme best practices

## Best Practices

- Always create new field groups when using the child theme
- Keep field groups specific to your Wise Wolves project in this directory
- Use descriptive field group names and keys to avoid conflicts
- Commit these JSON files to your Git repository for version control

## Git Integration

These JSON files are automatically tracked by Git, allowing you to:
- Version control your field configurations
- Share field groups with your team
- Deploy field groups across environments
- Maintain a history of field changes
