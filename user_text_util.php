<?php 
    echo "Hello,  kek <br>\n ";

echo '<pre>';
if (($file =fopen(filename:'ab.csv',mode:'r'))!==false){
    while (($data=fgetcsv($file,length:1000))!==false){
        // print_r($data);
        $out = '';
        $list = [];
        $my_arr = [];
        for ($i = 0; $i < count($data);$i++){
            $out .= $data[$i] . " "; 
            // $my_arr[$i] = $data[$i];
        //    $list += preg_split("/[\s;]+/",$data[$i]);
        }
        echo $out;
        // echo $my_arr;
        echo '<hr>';
    }
    fclose($file);
}

// CSV файл в массив:
$ref=[];
if (($file =fopen(filename:'ab.csv',mode:'r'))!==false){
    while (($data=fgetcsv($file,length:1000))!==false){
        $ref[]=$data;
    }
    fclose($file);
}
// var_dump($ref);
print_r($ref);
