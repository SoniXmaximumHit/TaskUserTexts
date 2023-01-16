<pre>
<?php 
    echo "Hello,  kek <br>\n ";

echo '<pre>';

function reat_csv(){
    // Открывает .csv файл и считывает 
    // id(int) и name(str) построчно
    // в лист словаря
    // CSV файл в массив:
    global $arr;$arr=[];
    //$f_csv= 'people.csv'
    $lines = file('people.csv');    
    foreach($lines as $line)
    {   
        $arr_i=[];
        echo($line);        
        $index_i=explode(";", $line)[0];
        $name_i=explode(";", $line)[1];
        $arr_i+=['index'=>$index_i];
        $arr_i+=['name'=>$name_i];
        array_push($arr, $arr_i);
        // var_dump($arr);
        echo '<hr>';
    }
}


function read_texts()
{
    /*     Открывает папку texts/ и считывает 
    вложенные строки в лист массива */
    global $arr;
    reat_csv();
    echo "<br>\n";
    $a = [];
    $dir = './texts/';
    if ($handle = opendir($dir)) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $filename1 = $dir . $entry;
                $ffile3 = fopen($filename1, 'r');
                $contens = fread($ffile3, filesize($filename1));
                fclose($ffile3);
                $a+=[$entry=>$contens];
            }            
        }
        closedir($handle);
    }
    // var_dump($a);
    for ($i = 1; $i <= count($arr); $i++) {
        $b = [];
        foreach ($a as $key => $value) {
            $mykey = explode("-", $key)[0];
            if ($mykey==$i ){
                array_push($b, $value);
            }
        }
        $arr[$i-1]+=['texts'=>$b];
    }
}


read_texts();
print_r($arr);
