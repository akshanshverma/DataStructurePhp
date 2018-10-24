<?php

    require("unOrderedList.php");
    $ls = new UnOrderedList();
    //get string from file
    $str = Utility::readFl("test.txt");
    //store each element in array
    $sArr = explode(" ",$str);
    //add in orderd link list
    foreach ($sArr as $key) {
        $ls->add($key);
    }
    $ls->show();
    //user input
    echo "enter word\n";
    $check = trim(fgets(STDIN));
    //search and if get then remove elemente from list and write file
    if ($ls->search($check)) {
        $ls->remove($check);
        $str = $ls->getStr();
        Utility::writeFl($str,"test.txt");
    } 
    //else add elemenet and write file
    else {
        $ls->add($check);
        $str = $ls->getStr();
        Utility::writeFl($str,"test.txt");
    }
?>