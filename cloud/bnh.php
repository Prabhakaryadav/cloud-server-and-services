<?php

    $audioFile = "hjk.mp3";
    $fileName = $_GET['$audioFile'];
    // Fetch the file info.
    $filePath = 'C:\xampp\htdocs\loginl' . $audioFile;

    if(file_exists($filePath)) {
        $fileName = basename($filePath);
        $fileSize = filesize($filePath);

        // Output headers.
        header("Cache-Control: private");
        header("Content-Type: audio/mpeg, audio/x-mpeg, audio/x-mpeg-3, audio/mpeg3");
        header("Content-Length: ".$fileSize);
        header("Content-Disposition: attachment; filename=".$fileName);

        // Output file.
        readfile ($filePath);                   
        exit();
    }
    else {
        die('The provided file path is not valid.');
    }

?>
<html>
<body>
<table>
  <tr>
    <td>Off the Grid</td>
    <td><a href="hjk.mp3">Download</a></td>
  </tr>
  <tr>
    <td>Far-Sighted</td>
    <td><a href="Far_Sighted.mp3">Download</a></td>
  </tr>
</table>
</body></html>