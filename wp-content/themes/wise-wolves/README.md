# Wise Wolves - WordPress Child Theme

A custom child theme based on Twenty Twenty-Five, designed specifically for the Wise Wolves project.

## Overview

Wise Wolves is a child theme that extends the functionality of the Twenty Twenty-Five WordPress theme while preserving the ability to receive parent theme updates without losing customizations.

## Features

- ✅ **Child Theme Architecture** - Safe from parent theme updates
- ✅ **ACF JSON Sync** - Version controlled custom fields
- ✅ **Custom Styling** - Easy CSS customization without affecting parent theme
- ✅ **Customizer Integration** - Additional theme options in WordPress Customizer
- ✅ **Git Integration** - Full version control support
- ✅ **Performance Optimized** - Proper stylesheet enqueueing
- ✅ **Developer Friendly** - Well-documented and extensible code

## File Structure

```
wise-wolves/
├── style.css           # Child theme stylesheet with theme headers
├── functions.php       # Child theme functions and hooks
├── acf-json/          # ACF field group JSON files
│   └── README.md      # ACF documentation
├── README.md          # This file
└── screenshot.png     # Theme screenshot (1200x900px)
```

## Installation

1. Upload the `wise-wolves` folder to `/wp-content/themes/`
2. Activate the theme in WordPress Admin → Appearance → Themes
3. Ensure the parent theme (Twenty Twenty-Five) is also installed

## Customization

### CSS Customization
Add your custom styles to `style.css` after the theme header comments.

### PHP Customization
Add custom functions to `functions.php` or create additional files in an `/inc/` directory.

### ACF Fields
Create field groups in WordPress Admin → Custom Fields → Field Groups. They will automatically be saved as JSON files in the `acf-json/` directory.

## Development Workflow

1. **Local Development**: Make changes in your local environment
2. **Version Control**: Commit changes to Git (including ACF JSON files)
3. **Deployment**: Deploy code to staging/production environments
4. **ACF Sync**: WordPress will prompt to sync field groups from JSON files

## Parent Theme Compatibility

This child theme is compatible with Twenty Twenty-Five version 1.0 and later. When the parent theme updates:

- Your customizations in this child theme will be preserved
- ACF field groups will remain in the child theme
- Custom functions and styles will continue to work
- You may need to test compatibility with major parent theme updates

## Support

For issues specific to the Wise Wolves child theme, please refer to the project documentation or contact the development team.

## Changelog

### Version 1.0.0
- Initial release
- Child theme setup with Twenty Twenty-Five parent
- ACF JSON sync configuration
- Basic customizer integration
- Git integration setup

## License

This child theme inherits the license of its parent theme (Twenty Twenty-Five) - GPL v2 or later.
