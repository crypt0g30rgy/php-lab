<?php
// phpinfo.php - Target file for wrapper exploitation practice
// This demonstrates why exposing phpinfo() can be dangerous

echo "=== SENSITIVE PHP CONFIGURATION ===\n\n";

echo "PHP Version: " . phpversion() . "\n";
echo "Server Software: " . $_SERVER['SERVER_SOFTWARE'] . "\n";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "\n";
echo "Script Filename: " . __FILE__ . "\n";

echo "\n=== Loaded Extensions ===\n";
$extensions = get_loaded_extensions();
foreach ($extensions as $ext) {
    echo "- $ext\n";
}

echo "\n=== Configuration Settings ===\n";
echo "allow_url_fopen: " . ini_get('allow_url_fopen') . "\n";
echo "allow_url_include: " . ini_get('allow_url_include') . "\n";
echo "file_uploads: " . ini_get('file_uploads') . "\n";
echo "upload_max_filesize: " . ini_get('upload_max_filesize') . "\n";
echo "phar.readonly: " . ini_get('phar.readonly') . "\n";

echo "\n🎯 FLAG: PHPINFO_EXPOSED_VULNERABILITY\n";
?>
