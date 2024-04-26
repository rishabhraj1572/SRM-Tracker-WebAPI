<?php
// Reset visit count
$visitFile = 'visit_count.txt';
file_put_contents($visitFile, 0);

// Reset download count
$downloadFile = 'download_count.txt';
file_put_contents($downloadFile, 0);

exit;

?>



