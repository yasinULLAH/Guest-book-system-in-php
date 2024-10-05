<?php
// guestbook.php

// Path to the CSV file
$csvFile = 'guestbook.csv';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Simple validation
    if ($name !== '' && $message !== '') {
        // Sanitize input
        $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
        $timestamp = date('Y-m-d H:i:s');

        // Prepare the data
        $data = [$name, $message, $timestamp];

        // Open the CSV file for appending
        if (($handle = fopen($csvFile, 'a')) !== false) {
            fputcsv($handle, $data);
            fclose($handle);
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        } else {
            $error = "Unable to write to the guestbook.";
        }
    } else {
        $error = "Please enter both name and message.";
    }
}

// Read entries from the CSV file
$entries = [];
if (file_exists($csvFile)) {
    if (($handle = fopen($csvFile, 'r')) !== false) {
        while (($data = fgetcsv($handle)) !== false) {
            if (count($data) === 3) {
                $entries[] = [
                    'name' => htmlspecialchars($data[0], ENT_QUOTES, 'UTF-8'),
                    'message' => htmlspecialchars($data[1], ENT_QUOTES, 'UTF-8'),
                    'timestamp' => htmlspecialchars($data[2], ENT_QUOTES, 'UTF-8'),
                ];
            }
        }
        fclose($handle);
    }
}

// Sort entries by timestamp descending
usort($entries, function($a, $b) {
    return strtotime($b['timestamp']) - strtotime($a['timestamp']);
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guestbook Application</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        /* Container */
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
        }

        /* Heading */
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Form Styling */
        .guestbook-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 30px;
        }

        .guestbook-form input[type="text"],
        .guestbook-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .guestbook-form textarea {
            resize: vertical;
            height: 100px;
        }

        .guestbook-form button {
            padding: 10px;
            border: none;
            background: #28a745;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        .guestbook-form button:hover {
            background: #218838;
        }

        /* Error Message */
        .error {
            color: #dc3545;
            margin-bottom: 15px;
            text-align: center;
        }

        /* Entries */
        .entries {
            margin-top: 20px;
        }

        .entry {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 10px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .entry-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .entry-name {
            font-weight: bold;
            color: #343a40;
        }

        .entry-timestamp {
            font-size: 12px;
            color: #6c757d;
        }

        .entry-message {
            font-size: 16px;
            color: #495057;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .guestbook-form button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Guestbook</h1>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form class="guestbook-form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <input type="text" name="name" placeholder="Your Name" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit">Sign Guestbook</button>
        </form>
        <div class="entries">
            <?php if (count($entries) > 0): ?>
                <?php foreach ($entries as $entry): ?>
                    <div class="entry">
                        <div class="entry-header">
                            <div class="entry-name"><?php echo $entry['name']; ?></div>
                            <div class="entry-timestamp"><?php echo $entry['timestamp']; ?></div>
                        </div>
                        <div class="entry-message"><?php echo nl2br($entry['message']); ?></div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No entries yet. Be the first to sign the guestbook!</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
