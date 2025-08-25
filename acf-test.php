<?php
/**
 * ACF JSON Sync Test Script
 * 
 * This file helps verify that ACF JSON sync is properly configured.
 * Access this file via your browser: yoursite.com/acf-test.php
 * 
 * IMPORTANT: Delete this file after testing for security reasons.
 */

// Load WordPress
require_once( __DIR__ . '/wp-load.php' );

// Check if user is logged in and has admin privileges
if ( ! is_user_logged_in() || ! current_user_can( 'manage_options' ) ) {
    wp_die( 'You must be logged in as an administrator to view this page.' );
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>ACF JSON Sync Test</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .success { color: green; font-weight: bold; }
        .error { color: red; font-weight: bold; }
        .info { color: blue; }
        .code { background: #f4f4f4; padding: 10px; border-left: 4px solid #ccc; margin: 10px 0; }
        .warning { background: #fff3cd; border: 1px solid #ffeaa7; padding: 10px; margin: 10px 0; }
    </style>
</head>
<body>
    <h1>ACF JSON Sync Configuration Test</h1>
    
    <?php
    
    // Check if ACF is active
    if ( ! function_exists( 'acf' ) ) {
        echo '<p class="error">❌ Advanced Custom Fields plugin is NOT active!</p>';
        echo '<p>Please activate the ACF plugin first.</p>';
    } else {
        echo '<p class="success">✅ Advanced Custom Fields plugin is active</p>';
        
        // Get ACF settings
        $save_path = acf_get_setting('save_json');
        $load_paths = acf_get_setting('load_json');
        
        echo '<h2>ACF JSON Configuration:</h2>';
        
        // Check save path
        echo '<h3>Save Path:</h3>';
        if ( $save_path ) {
            echo '<div class="code">' . esc_html( $save_path ) . '</div>';
            
            if ( is_dir( $save_path ) ) {
                echo '<p class="success">✅ Save directory exists</p>';
                
                if ( is_writable( $save_path ) ) {
                    echo '<p class="success">✅ Save directory is writable</p>';
                } else {
                    echo '<p class="error">❌ Save directory is NOT writable</p>';
                    echo '<p>You may need to adjust file permissions.</p>';
                }
            } else {
                echo '<p class="error">❌ Save directory does NOT exist</p>';
                echo '<p>The directory will be created automatically when you save your first field group.</p>';
            }
        } else {
            echo '<p class="error">❌ No save path configured</p>';
        }
        
        // Check load paths
        echo '<h3>Load Paths:</h3>';
        if ( $load_paths && is_array( $load_paths ) ) {
            foreach ( $load_paths as $load_path ) {
                echo '<div class="code">' . esc_html( $load_path ) . '</div>';
                
                if ( is_dir( $load_path ) ) {
                    echo '<p class="success">✅ Load directory exists</p>';
                    
                    // Check for JSON files
                    $json_files = glob( $load_path . '/*.json' );
                    if ( $json_files ) {
                        echo '<p class="info">📄 Found ' . count( $json_files ) . ' JSON file(s) in this directory</p>';
                        foreach ( $json_files as $file ) {
                            echo '<div class="code">' . basename( $file ) . '</div>';
                        }
                    } else {
                        echo '<p class="info">ℹ️ No JSON files found yet (this is normal for a fresh setup)</p>';
                    }
                } else {
                    echo '<p class="error">❌ Load directory does NOT exist</p>';
                }
            }
        } else {
            echo '<p class="error">❌ No load paths configured</p>';
        }
        
        // Check current theme
        $current_theme = wp_get_theme();
        echo '<h3>Current Theme:</h3>';
        echo '<div class="code">' . $current_theme->get('Name') . ' (' . $current_theme->get_stylesheet() . ')</div>';
        
        // Instructions
        echo '<div class="warning">';
        echo '<h3>📋 Next Steps:</h3>';
        echo '<ol>';
        echo '<li>Go to WordPress Admin → Custom Fields → Field Groups</li>';
        echo '<li>Create a new field group or edit an existing one</li>';
        echo '<li>Save the field group</li>';
        echo '<li>Check if a JSON file was created in the save directory above</li>';
        echo '<li>The JSON file should automatically be tracked by Git</li>';
        echo '</ol>';
        echo '<p><strong>Remember:</strong> Delete this test file (acf-test.php) after testing!</p>';
        echo '</div>';
    }
    
    ?>
    
    <hr>
    <p><em>Generated at: <?php echo date('Y-m-d H:i:s'); ?></em></p>
</body>
</html>
