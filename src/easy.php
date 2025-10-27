<?php
/**
 * LEVEL 1: EASY - No Protection (Standalone Version)
 *
 * This is a standalone version for easy testing and debugging.
 * This level demonstrates a completely vulnerable path traversal.
 * No input validation or sanitization is performed.
 *
 * Educational Purpose: Learn how basic path traversal works
 *
 * Usage: easy.php?file=../secrets/flag.txt
 */

// Get file parameter
$file = isset($_GET['file']) ? $_GET['file'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Level 1: Easy - Path Traversal Lab</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 50px auto; padding: 20px; }
        .container { border: 1px solid #ddd; padding: 20px; border-radius: 5px; }
        .warning { background: #fff3cd; border: 1px solid #ffc107; padding: 10px; margin: 10px 0; }
        .result { background: #e7f3ff; padding: 15px; margin: 20px 0; border-left: 4px solid #2196F3; }
        .error { background: #ffebee; padding: 15px; margin: 20px 0; border-left: 4px solid #f44336; }
        .info { background: #e7f3ff; padding: 10px; margin: 10px 0; border-left: 4px solid #2196F3; }
        .success { background: #d4edda; padding: 15px; margin: 10px 0; border-left: 4px solid #28a745; }
        code { background: #f4f4f4; padding: 2px 6px; border-radius: 3px; }
        pre { background: #282c34; color: #abb2bf; padding: 15px; border-radius: 5px; overflow-x: auto; }
        a { color: #2196F3; text-decoration: none; }
        a:hover { text-decoration: underline; }
        h1 { color: #333; border-bottom: 3px solid #4caf50; padding-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🟢 Level 1: Easy - No Protection</h1>

        <div class="warning">
            ⚠️ <strong>WARNING:</strong> This is a deliberately vulnerable application for educational purposes.
            Never deploy this on a public server!
        </div>

        <div class="info">
            <strong>🎯 Vulnerability:</strong> Direct file inclusion with no input validation<br>
            <strong>📝 Protection Level:</strong> None<br>
            <strong>🔓 Exploitation Difficulty:</strong> Very Easy
        </div>

        <?php
        if (!empty($file)) {
            echo "<h3>Requested File: <code>" . htmlspecialchars($file) . "</code></h3>";

            // LEVEL 1: No protection - Completely vulnerable
            echo "<div class='result'>";
            echo "<h4>File Contents:</h4>";
            $target = "pages/" . $file;

            if (file_exists($target)) {
                echo "<pre>" . htmlspecialchars(file_get_contents($target)) . "</pre>";

                echo "<div class='success'>";
                echo "<strong>✓ File successfully read!</strong><br>";
                echo "Path used: <code>" . htmlspecialchars($target) . "</code>";
                echo "</div>";
            } else {
                echo "<p class='error'>File not found: " . htmlspecialchars($target) . "</p>";
                echo "<div class='info'>";
                echo "<strong>💡 Tip:</strong> Try using <code>../</code> to go up directories.<br>";
                echo "Example: <code>../secrets/flag.txt</code>";
                echo "</div>";
            }

            echo "</div>";
        } else {
            echo "<h3>💡 How to use:</h3>";
            echo "<p>Add <code>?file=filename.txt</code> to the URL to include a file.</p>";
            echo "<p>Example: <code>easy.php?file=home.txt</code></p>";

            echo "<h3>📁 Available Files:</h3>";
            echo "<ul>";
            echo "<li><a href='?file=home.txt'>home.txt</a></li>";
            echo "<li><a href='?file=about.txt'>about.txt</a></li>";
            echo "<li><a href='?file=contact.txt'>contact.txt</a></li>";
            echo "<li><a href='?file=services.txt'>services.txt</a></li>";
            echo "</ul>";

            echo "<h3>🎯 Your Goal:</h3>";
            echo "<p>Try to read the <code>flag.txt</code> file located in the secrets directory!</p>";

            echo "<h3>💡 Exploitation Examples:</h3>";
            echo "<ul>";
            echo "<li><a href='?file=../secrets/flag.txt'><code>../secrets/flag.txt</code></a> - Read the flag</li>";
            echo "<li><a href='?file=../secrets/database.conf'><code>../secrets/database.conf</code></a> - Read database config</li>";
            echo "<li><a href='?file=../../../../etc/passwd'><code>../../../../etc/passwd</code></a> - Read system file (Linux)</li>";
            echo "<li><a href='?file=../include.php'><code>../include.php</code></a> - Read source code</li>";
            echo "</ul>";

            echo "<div class='info'>";
            echo "<h4>📚 What Makes This Vulnerable?</h4>";
            echo "<p>This level has <strong>NO protection</strong> whatsoever:</p>";
            echo "<ul>";
            echo "<li>User input is directly concatenated to a path</li>";
            echo "<li>No filtering of <code>../</code> sequences</li>";
            echo "<li>No whitelist of allowed files</li>";
            echo "<li>No path validation or sanitization</li>";
            echo "</ul>";
            echo "<p><strong>Vulnerable Code:</strong></p>";
            echo "<pre style='background: #282c34; color: #abb2bf; padding: 10px;'>";
            echo htmlspecialchars('$file = $_GET[\'file\'];
$target = "pages/" . $file;  // VULNERABLE!
echo file_get_contents($target);');
            echo "</pre>";
            echo "</div>";
        }
        ?>

        <hr>
        <p>
            <a href="vulnerable.php?level=easy">← Back to Main Lab</a> |
            <a href="medium.php">Next Level: Medium →</a> |
            <a href="lab_guide.php">📖 View Guide</a>
        </p>
    </div>
</body>
</html>
