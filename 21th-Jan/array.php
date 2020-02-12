<?php
echo "<pre>";
$arr1 = array(0, 1, 2, 3, 4, 5);
print_r($arr1);

$arr2 = array("Darshan", "Roshni", "Pragnesh", "Mihir");
print_r($arr2);

$arr3 = array("name" => "Darshan", "age" => 26, "city" => "Navsari");
print_r($arr3);

$arr4 = array("160160107100" => array("name"=>"Darshan Tandel", "age"=>22), 
            "160160107090" => array("name"=>"Vraj Shah", "age"=>21), 
            "160160107104" => array("name"=>"Parmeet Vaghela", "age"=>20), 
            "160160107110" => array("name"=>"Saurabh Verma", "age"=>22));
print_r($arr4);

$arr5 = array("name" => "Darshan", "age" => 26, "city" => "Navsari");
foreach($arr5 as $key => $value) {
    echo ucfirst($key) . ": " . $value . "<br>";
}
echo "</pre>";
?>