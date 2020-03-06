<?php

namespace Dinosaur;


class File
{
    public function fileOpen($type)
    {
        $handle = fopen("dataset" . $type . ".csv", "r");

        $dinosaurs = [];
        $row = 0;
        while ($line = fgetcsv($handle, 0, ",")) {
            if ($row++ == 0) {
                continue;
            }

            if ($type == "1") {
                $dinosaurs[$line[0]] = [
                    'NAME' => $line[0],
                    'LEG_LENGTH' => $line[1],
                    'DIET' => $line[2],
                ];
            } else {
                $dinosaurs[$line[0]] = [
                    'NAME' => $line[0],
                    'STRIDE_LENGTH' => $line[1],
                    'STANCE' => $line[2],
                ];
            }

        }
        fclose($handle);
        return $dinosaurs;
    }


    public function writeFile($dinosaurs)
    {
        $delimiter = ',';
        $fence = '"';

        $data = [];

        foreach ($dinosaurs as $key => $value) {
            array_push($data, array($value['NAME'][0]));
            print('<pre>');
            print_r($value['NAME'][0]);
        }

        $fw = fopen('dinosaurs.txt', 'w');
        if ($fw) {
            foreach ($data as $line) {
                fputcsv($fw, $line, $delimiter, $fence);
            }
            fclose($fw);
        }
    }
}