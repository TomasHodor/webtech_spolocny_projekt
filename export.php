<?php
require_once("lib/config.php");
    $people = $db->query('SELECT student_id, `name`, points FROM persons  where 
                      `year` = ? AND 
                      subject = ?',
        [
            '2018',
            'WT2',
        ])->fetchAll();

    // Creates a new csv file and store it in tmp directory
    header("Content-type: text/csv");
    header("Content-disposition: attachment; filename = export.csv");
    $csv = fopen('./export.csv', 'w');
    $line = 'ID;Name;Points
                ';
    fwrite($csv, $line);
    foreach ($people as $person){
        $line = $person['student_id'] . ';' . $person['name'] . ';' . $person['points'] . '
                    ';
        fwrite($csv, $line);
    }
    fclose($csv);

    // output headers so that the file is downloaded rather than displayed
    readfile("./export.csv");

