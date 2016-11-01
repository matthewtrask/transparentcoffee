<?php

namespace controllers\admin\csv;

use helpers\ZipArchive;

class AbstractWriter
{

    /**
     * @param $fileName
     * @param $headers
     * @param $data
     * @return bool|string
     */
    public function write($fileName, $headers, $coffee)
    {
        $zip = new ZipArchive();

        $time = time();

        $filename = $fileName . '-' . date('m-d-Y-h-i', $time) . '.csv';

        $filepath = '/var/www/public/app/downloads/csv/'.$filename;


        if (($handle = fopen($filepath, 'w'))) {
            fputcsv($handle, $headers);
            foreach ($coffee as $key => $ttc) {
                fputcsv($handle, (array) $ttc, ',', '"');
            }
            fclose($handle);
        } else {
            return "Error downloading file, please try after some time.";
        }
        if (file_exists($filepath)) {
            $report_file = array($filepath);
            $zipfilename = $fileName . '-' . date('m-d-Y-h-i', $time) . '.zip';
            $zipfilepath = "/var/www/public/app/downloads/csv/$zipfilename";

            $zip->setFiles($report_file)->write($zipfilepath);

            unlink($filepath);

            if (file_exists($zipfilepath)) {
                return $zipfilepath;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function downloader($file)
    {
        if ($fd = fopen($file, "r")) {
            $fsize = filesize($file);
            $path_parts = pathinfo($file);
            $ext = strtolower($path_parts["extension"]);
            switch ($ext) {
                case "xls":
                    header("Content-type: application/xls");
                    header("Content-Disposition: attachment; filename=\"" . $path_parts["basename"] . "\"");
                    break;
                default:
                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: filename=\"" . $path_parts["basename"] . "\"");
                    break;
            }
            header("Content-length: $fsize");
            header("Cache-control: private");
            while (!feof($fd)) {
                $buffer = fread($fd, 888888);
                echo $buffer;
            }
        }
        fclose($fd);
    }
}