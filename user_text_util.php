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



reat_csv();
// print_r($arr);
echo '<hr>';
var_dump($arr);
