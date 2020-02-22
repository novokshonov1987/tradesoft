<?php

$all_files = [];
$dir_path = 'd://temp';

getListFiles($dir_path, $all_files);
copy_files($dir_path, $all_files);

$php_files = [];
$dir_cache_path = 'd://temp/_cache';
foreach (getListFiles($dir_cache_path, $php_files) as $php_file){
    read_files($dir_cache_path, $php_file);
}

function read_files($dir_cache_path, $file){
    $lines = file($file);
    foreach ($lines as $line_num => $line) {
        if (strpos($line, 'include') !== false) {
            echo 'в файле ' . $file . ' найден  ' .  $line . ' строка №' . ($line_num+1) . '<br>';

            //находим файл, на который ссылается include
            $file_include_name = explode(" ", $line);
            $file_include_name = str_replace('"', '', $file_include_name[1]);
            $file_include_name = str_replace(';', '', $file_include_name);
            $file_include_name = trim($file_include_name);
            $file_include_name = $dir_cache_path . '/' . $file_include_name;

            $_file = file($file_include_name);
            foreach ($_file as $_file_line_num => $_file_line) {
                echo "Строка #{$_file_line_num} : " . htmlspecialchars($_file_line) . "<br />\n";
            }
        }
    }
}

function deleteLines($filename) {
    $num_stroka = 0;
    $file = file($filename);

    for($i = 0; $i < sizeof($file); $i++)
        if($i == $num_stroka) unset($file[$i]);

    $fp = fopen($filename, "w");
    fputs($fp, implode("", $file));
    fclose($fp);
}

function getExtension($filename) {
    $path_parts = pathinfo($filename);
    return $path_parts['extension'];
}

function getListFiles($folder, &$all_files)
{
    $path = opendir($folder);

    while (false !== ($file_name = readdir($path))) {
        if (is_file($folder . "/" . $file_name)) {
            $all_files[] = $folder . "/" . $file_name;
        } elseif ($file_name != "." && $file_name != ".." && is_dir($folder . "/" . $file_name)) {
            GetListFiles($folder . "/" . $file_name, $all_files);
        }
    }
    closedir($path);
    return $all_files;
}

function copy_files($dir_path, &$all_files){
    foreach ($all_files as $file){
        if (getExtension($file) == 'php') {
            $dstfile = $dir_path . '/_cache/' . basename($file);
            if (!file_exists(dirname($dstfile))) {
                mkdir(dirname($dstfile), 0777, true);
            }
            if (!copy($file, $dstfile)) {
                echo "файл уже есть / не удалось скопировать" . '<br>';
            }
        }
    }
}
