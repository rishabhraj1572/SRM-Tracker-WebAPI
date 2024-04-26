<?php
// Function to increment download count
function incrementDownloadCount() {
    $downloadFile = 'download_count.txt';
    $count = (int)file_get_contents($downloadFile);
    $count++;
    file_put_contents($downloadFile, $count);
}

// Increment download count
incrementDownloadCount();

header('Content-Type: text/html; charset=utf-8');

// Function to start download after 2 seconds delay
function startDownload() {
    $filePath = 'https://raw.githubusercontent.com/srmapp/srmapp/master/SRMTracker.apk';
    header("Location: $filePath");
}

startDownload();
?>
