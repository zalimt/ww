# SCSS Setup for Wise Wolves Theme

## Overview
The Wise Wolves theme now supports SCSS compilation. The theme will automatically compile `style.scss` to `style.css` when needed.

## File Structure
```
wise-wolves/
├── style.scss          # Main SCSS file (edit this)
├── style.css           # Compiled CSS file (auto-generated)
└── functions.php       # Contains SCSS compilation logic
```

## How It Works

1. **Edit SCSS**: Make changes to `style.scss`
2. **Auto Compilation**: When the page loads, the theme checks if `style.scss` is newer than `style.css`
3. **Compilation**: If needed, SCSS is compiled to CSS automatically
4. **Fallback**: If SCSS compiler isn't available, content is copied as-is

## SCSS Compiler

The theme uses the built-in SCSS compiler if available, or falls back to copying the content directly. This ensures the theme works even without a SCSS compiler installed.

## Development Workflow

1. Edit `style.scss` with your SCSS code
2. Refresh your website - CSS will be automatically compiled
3. Commit both `style.scss` and `style.css` to Git

## Current Styles

Currently includes only:
- Container max-width: 1360px
- Basic container padding

## Adding New Styles

Add all new styles to `style.scss`. The file will be automatically compiled to `style.css` on page load.

## Performance Notes

- SCSS compilation only happens when `style.scss` is newer than `style.css`
- Uses file modification time for cache busting
- Minimal performance impact in production

## Git Workflow

Both files should be committed:
- `style.scss` - Source file for development
- `style.css` - Compiled file for production
