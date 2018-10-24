<?php
    require("OrderedList.php");
    $os = new OrderedList();
    //get string from file
    $str = Utility::readFl("test.txt");
    //store each element in array
    $sArr = explode(" ",$str);
    //add in orderd link list
    foreach ($sArr as $key) {
         $os->add($key);
    }
    $os->show();
    //user input
    echo "enter number\n";
    $check = Utility::getInt();
    //search and if get then remove elemente from list and write file
    if ($os->search($check)) {
        $os->remove($check);
        $str = $os->getStr();
        Utility::writeFl($str,"test.txt");
    } 
    //else add elemenet and write file
    else {
        $os->add($check);
        $str = $os->getStr();
        Utility::writeFl($str,"test.txt");
    }
    //14523
?>