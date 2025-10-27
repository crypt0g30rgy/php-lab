<?php
/**
 * LEVEL 3: HARD - Multiple Filters (Standalone Version)
 *
 * This is a standalone version for easy testing and debugging.
 * This level implements multiple filters that remove suspicious patterns.
 * However, the filters can still be bypassed using nested patterns.
 *
 * Educational Purpose: Learn advanced filter evasion techniques
 *
 * Usage: hard.php?file=....//....//secrets/flag.txt
 */

// Get file parameter
$file = isset($_GET['file']) ? $_GET['file'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Level 3: Hard - Path Traversal Lab</title>
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
        h1 { color: #333; border-bottom: 3px solid #f44336; padding-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔴 Level 3: Hard - Multiple Filters</h1>

        <div class="warning">
            ⚠️ <strong>WARNING:</strong> This is a deliberately vulnerable application for educational purposes.
            Never deploy this on a public server!
        </div>

        <div class="info">
            <strong>🎯 Vulnerability:</strong> Pattern removal filters (can be bypassed)<br>
            <strong>📝 Protection Level:</strong> Multiple blacklist filters<br>
            <strong>🔓 Exploitation Difficulty:</strong> Medium (requires nested patterns)
        </div>

        <?php
        if (!empty($file)) {
            echo "<h3>Requested File: <code>" . htmlspecialchars($file) . "</code></h3>";

            // LEVEL 3: Multiple filters - More difficult but still bypassable
            $filtered = str_replace(['../', '..\\', '....//'], '', $file);

            if ($filtered !== $file) {
                echo "<div class='warning'>";
                echo "<p>⚠️ <strong>Suspicious patterns detected and removed!</strong></p>";
                echo "<p>Original input: <code>" . htmlspecialchars($file) . "</code></p>";
                echo "<p>Filtered input: <code>" . htmlspecialchars($filtered) . "</code></p>";
                echo "</div>";

                echo "<div class='info'>";
                echo "<strong>🛡️ Filter Information:</strong><br>";
                echo "The following patterns were removed: <code>../</code>, <code>..\\</code>, <code>....//</code><br><br>";
                echo "<strong>💡 Bypass Hints:</strong><br>";
                echo "• Nested patterns: <code>....//....//</code> → After removal becomes <code>../</code><br>";
                echo "• Double writing: <code>..././..././</code> → After removal becomes <code>../../</code><br>";
                echo "• Mixed separators: <code>..\\/..\\/</code><br>";
                echo "• The filter only runs ONCE - it doesn't repeat!";
                echo "</div>";
            }

            // Additional check for absolute paths
            if (strpos($filtered, '/') === 0 || preg_match('/^[a-zA-Z]:/', $filtered)) {
                echo "<div class='error'>Error: Absolute paths not allowed!</div>";
                echo "<div class='info'>";
                echo "<strong>🚫 Blocked:</strong> Absolute paths starting with <code>/</code> or drive letters are not allowed.<br>";
                echo "Try using relative paths with filter bypass techniques.";
                echo "</div>";
            } else {
                echo "<div class='result'>";
                echo "<h4>File Contents:</h4>";
                $target = "pages/" . $filtered;

                if (file_exists($target)) {
                    echo "<pre>" . htmlspecialchars(file_get_contents($target)) . "</pre>";

                    echo "<div class='success'>";
                    echo "<strong>✓ Success! You bypassed the filters!</strong><br>";
                    echo "Original: <code>" . htmlspecialchars($file) . "</code><br>";
                    echo "After filtering: <code>" . htmlspecialchars($filtered) . "</code><br>";
                    echo "Final path: <code>" . htmlspecialchars($target) . "</code>";
                    echo "</div>";
                } else {
                    echo "<p class='error'>File not found: " . htmlspecialchars($target) . "</p>";
                }

                echo "</div>";
            }
        } else {
            echo "<h3>💡 How to use:</h3>";
            echo "<p>Add <code>?file=filename.txt</code> to the URL to include a file.</p>";
            echo "<p>Example: <code>hard.php?file=home.txt</code></p>";

            echo "<h3>📁 Available Files:</h3>";
            echo "<ul>";
            echo "<li><a href='?file=home.txt'>home.txt</a></li>";
            echo "<li><a href='?file=about.txt'>about.txt</a></li>";
            echo "<li><a href='?file=contact.txt'>contact.txt</a></li>";
            echo "<li><a href='?file=services.txt'>services.txt</a></li>";
            echo "</ul>";

            echo "<h3>🎯 Your Goal:</h3>";
            echo "<p>Bypass multiple filters using nested patterns!</p>";

            echo "<h3>💡 Advanced Bypass Techniques:</h3>";

            echo "<p><strong>1. Nested Pattern (....//)</strong></p>";
            echo "<ul>";
            echo "<li><a href='?file=....//....//secrets/flag.txt'><code>....//....//secrets/flag.txt</code></a></li>";
            echo "<li>How it works: <code>....//</code> → (remove <code>....//</code>) → <code>../</code></li>";
            echo "</ul>";

            echo "<p><strong>2. Double Writing (..././)</strong></p>";
            echo "<ul>";
            echo "<li><a href='?file=..././..././secrets/flag.txt'><code>..././..././secrets/flag.txt</code></a></li>";
            echo "<li>How it works: <code>..././</code> → (remove <code>../</code>) → <code>../</code></li>";
            echo "</ul>";

            echo "<p><strong>3. Mixed Separators</strong></p>";
            echo "<ul>";
            echo "<li><code>..\\/..\\/secrets/flag.txt</code></li>";
            echo "</ul>";

            echo "<div class='info'>";
            echo "<h4>📚 Why Is This Still Vulnerable?</h4>";
            echo "<p>Despite multiple filters, the approach is flawed:</p>";
            echo "<ul>";
            echo "<li><strong>Single-pass filtering:</strong> Filters run only once, not recursively</li>";
            echo "<li><strong>String replacement order:</strong> Nested patterns exploit this</li>";
            echo "<li><strong>Blacklist approach:</strong> Still trying to block patterns instead of whitelist</li>";
            echo "<li><strong>No normalization:</strong> Doesn't resolve the final path</li>";
            echo "</ul>";
            echo "<p><strong>Vulnerable Code:</strong></p>";
            echo "<pre style='background: #282c34; color: #abb2bf; padding: 10px;'>";
            echo htmlspecialchars('$filtered = str_replace([\'../\', \'..\\\\\', \'....//\'], \'\', $file);
// Runs only ONCE - nested patterns survive!
$target = "pages/" . $filtered;
echo file_get_contents($target);');
            echo "</pre>";

            echo "<p><strong>Example Attack:</strong></p>";
            echo "<pre style='background: #282c34; color: #abb2bf; padding: 10px;'>";
            echo htmlspecialchars('Input:  "....//....//secrets/flag.txt"
Filter: str_replace("....//", "", input)
Result: "../secrets/flag.txt" (after removing ....// twice)
Final:  "pages/../secrets/flag.txt" → "/var/www/html/secrets/flag.txt"');
            echo "</pre>";
            echo "</div>";
        }
        ?>

        <hr>
        <p>
            <a href="medium.php">← Previous: Medium</a> |
            <a href="vulnerable.php?level=hard">Back to Main Lab</a> |
            <a href="advanced.php">Next Level: Advanced →</a>
        </p>
    </div>
</body>
</html>
