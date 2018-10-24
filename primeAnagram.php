<?php
    /**
    * 
    * Purpose: to check the number which are prime and anagram
    * 
    *  @author  Akshansh Verma
    *  @version 1.0
    *  @since   22-10-2018
    */
    require("/home/pc/AkshanshPhp/AlgorithmPrograms/util.php");
    //arr which hold all prime number in array
    $arr = Util::primeNumber();
    //2d array to hold anagram and non anagram prime number 
    $arr2d = array(array(),array());
    //for loop to check all prime number whiche are anagram
    for ($i=0; $i < sizeof($arr); $i++) { 
        //hold boolean value 
        $b = false;
        //access prine number
        for ($j=0; $j < sizeof($arr); $j++) { 
           if ($i != $j) {
               //check anagram
               $b = Util::anagram($arr[$i],$arr[$j]);
               //is yes then puch in the array 1
               if ($b) {
                   array_push($arr2d[0],$arr[$i]);
                   break;
               }
           }
        }
        //if false then prime number in array 2
        if (!$b) {
            array_push($arr2d[1],$arr[$i]);
        } 
    }

    //print both array
    for ($i=0; $i < sizeof($arr2d); $i++) { 
        for ($j=0; $j < sizeof($arr2d[$i]); $j++) { 
            echo $arr2d[$i][$j]." ";
        }
        echo "\n"."prime"."\n";
    }
?>