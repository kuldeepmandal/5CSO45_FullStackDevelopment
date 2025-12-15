<?php
    $file = fopen("note.txt", "w");

    fwrite($file, "Line one.\n");
    fwrite($file, "Line two.\n");

    fclose($file);
?>