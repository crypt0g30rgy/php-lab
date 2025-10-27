<?php
/**
 * Example source code file
 * Demonstrates reading source code via PHP filters
 */

// Simulated database credentials
$db_config = [
    'host' => 'localhost',
    'username' => 'app_user',
    'password' => 'MyS3cr3tP@ssw0rd!',
    'database' => 'production_db'
];

// Simulated API key
define('API_SECRET_KEY', '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');

// Function with sensitive logic
function authenticate($username, $password) {
    // Hardcoded credentials (bad practice!)
    if ($username === 'admin' && $password === 'admin123') {
        return true;
    }
    return false;
}

// Secret token for admin access
$admin_token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkFkbWluIFVzZXIiLCJpYXQiOjE1MTYyMzkwMjJ9.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c';

echo "This is the source code. You shouldn't see this!";
?>
