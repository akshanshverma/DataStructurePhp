<?php
    /**
    * 
    * Purpose: check the string is palindrome with the help of deque
    * 
    *  @author  Akshansh Verma
    *  @version 1.0
    *  @since   22-10-2018
    */
    require("deque.php");
    //object of deque
    $d = new Deque();
    //get string
    $str = readLine("enter word: ");
    //for loop to add all value in deque
    for ($i=0; $i < strlen($str); $i++) { 
        $d->addRear($str[$i]);
    }
    //b for boolean valure
    $b = true;
    //for loop to check string char
    for ($i=0; $i < strlen($str)/2; $i++) { 
        //pop value from front and rear and check the are equal or not
        if ($d->removeFront() != $d->removeRear()) {
           $b = false;
           break;
        }
    }
    //print true false
    if ($b) {
        echo "true\n";
    }else {
        echo "false\n";
    }

?>