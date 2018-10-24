<?php
     /**
    * 
    * Purpose: prime anagram value store in the queue and dequeue and print anagram value
    * 
    *  @author  Akshansh Verma
    *  @version 1.0
    *  @since   22-10-2018
    */
    require("/home/pc/AkshanshPhp/AlgorithmPrograms/util.php");
    require("queue.php");
    //get prime number
    $arr = Util::primeNumber();
    $queue = new Queue();
    //access each value of prime number 
    for ($i=0; $i < sizeof($arr); $i++) { 
        for ($j=0; $j < sizeof($arr); $j++) { 
           if ($i != $j) {
               //store anagram in queue
               if (Util::anagram($arr[$i],$arr[$j])) {
                   $queue->enqueue($arr[$i]);
                   break;
               }
           }
        }
    }
    //dequeue all anagram from the queue
    while (!$queue->isEmpty()) {
        echo $queue->dequeue()."\n";
    }
?>