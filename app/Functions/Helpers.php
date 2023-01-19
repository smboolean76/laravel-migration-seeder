<?php
namespace App\Functions;

class Helpers {    
    /**
     * getCsvContent return the csv content.
     *
     * @param  string $path the file path.
     * @return array
     */
    public static function getCsvContent(string $path): array
    {
        $data = [];
        $file_stream = fopen($path, 'r');
        while( ( $row = fgetcsv($file_stream, null, ';') ) !== false ) {
            $data[] = $row;
        }
        fclose($file_stream);
        return $data;
    }
}