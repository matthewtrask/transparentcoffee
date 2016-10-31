<?php
/**
 * Created by PhpStorm.
 * User: trask
 * Date: 10/30/16
 * Time: 10:52 AM
 */

namespace controllers\admin\csv;

class AbstractWriter
{
    /**
     * @param $fileName
     * @param $headers
     * @param $data
     * @return bool|string
     */
    public function write($fileName, $headers, $data)
    {
        $time = time();

        $filename = $fileName . '-' . date('m-d-Y-h-i', $time) . '.csv';

        $filepath = '/var/www/public/app/downloads/csv/'.$filename;

        $coffees = [];

        $coffees[] = $data;

        if (($handle = fopen($filepath, 'w'))) {
            fputcsv($handle, (array) $headers);
            foreach ($coffees as $key => $ttc) {
                fputcsv($handle, $ttc, ',', '"');
            }
            fclose($handle);
        } else {
            return "Error downloading file, please try after some time.";
        }
        if (file_exists($filepath)) {
            $report_file = array($filepath);
            $zipfilename = $fileName . '-' . date('m-d-Y-h-i', $time) . '.zip';
            $zipfilepath = "/var/www/public/app/downloads/csv/$zipfilename";

            unlink($filepath);

            if (file_exists($zipfilepath)) {
                return $zipfilename;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}