<?php
// Function to increment download count
function incrementDownloadCount() {
    $downloadFile = 'download_count.txt'; // Use absolute path
    $count = (int)file_get_contents($downloadFile);
    $count++;
    file_put_contents($downloadFile, $count);
}

function incrementVisitCount() {
    $downloadFile = 'visit_count.txt'; // Use absolute path
    $count = (int)file_get_contents($downloadFile);
    $count++;
    file_put_contents($downloadFile, $count);
}

// Call the function to increment download count
incrementDownloadCount();
incrementVisitCount();

// File path to the APK file
$filePath = 'https://raw.githubusercontent.com/srmapp/srmapp/master/SRMTracker.apk';

// Redirect the user to download the APK file
header("Location: $filePath");
exit;
?>
