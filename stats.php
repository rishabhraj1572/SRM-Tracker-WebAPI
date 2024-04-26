<?php
// Define the reset function
function resetCounts() {
    $visitFile = 'visit_count.txt';
    file_put_contents($visitFile, 0);

    $downloadFile = 'download_count.txt';
    file_put_contents($downloadFile, 0);
}

// Function to get download count
function getDownloadCount() {
    $downloadFile = 'download_count.txt';
    return file_get_contents($downloadFile);
}

// Function to get visit count
function getVisitCount() {
    $visitFile = 'visit_count.txt';
    return file_get_contents($visitFile);
}

// Check if form is submitted for resetting counts
if (isset($_POST['download'])) {
    resetCounts(); // Reset counts
    // Redirect back to the current page to avoid form resubmission
    header("Location: {$_SERVER['REQUEST_URI']}");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="ic_icon.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        p {
            text-align: center;
            color: #666;
        }
        button {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="ic_icon.png" width="200px" height="200px" class="center">
        <h1>Statistics</h1>
        <p>Number of downloads: <?php echo getDownloadCount(); ?></p>
        <p>Number of visits: <?php echo getVisitCount(); ?></p>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <button type="submit" name="download">Reset Counts</button>
        </form>
    </div>
</body>
</html>
