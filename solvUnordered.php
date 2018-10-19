<?php
    require("unOrderedList.php");
    $ls = new UnOrderedList();
    $str = Utility::readFl("test.txt");
    $sArr = explode(" ",$str);
    foreach ($sArr as $key) {
        $ls->add($key);
    }
    $ls->show();
    echo "enter word\n";
    $check = trim(fgets(STDIN));
    if ($ls->search($check)) {
        $ls->remove($check);
        $str = $ls->getStr();
        Utility::writeFl($str,"test.txt");
    } else {
        $ls->add($check);
        $str = $ls->getStr();
        Utility::writeFl($str,"test.txt");
    }
?>