<?php
    /**
    * 
    * Purpose:  BankingCashCounter Panel to add People to Queue to Deposit or 
    * Withdraw Money and dequeue
    *
    *  @author  Akshansh Verma
    *  @version 1.0
    *  @since   22-10-2018
    */
    require("queue.php");
    //object of queue
    $q = new Queue();
    //amount bank have
    $bankCash = 100000;
    /**
     * function to enter people in the queue
     *  @param $num it take number of people in the queue
     */
    function name($num)
    {   
        // to access object of queue
        global $q;
        //for loop tu enter number of people in queue
        for ($i=0; $i < $num; $i++) { 
            echo "enter name\n";
            $name = trim(fgets(STDIN));
            //enqueue the people
            $q->enqueue($name);
        }
        // call action function to perform action in the queue
        action();
    }

    /**
     * function action is to perfrom action on the queue that user want to deposit
     * or withdraw money
     * 
     */
    function action()
    {
        global $q, $bankCash;
        //loop until queue is empty
        while (!$q->isEmpty()) {
            //access people 
            $name = $q->dequeue();
            echo "\nhello ".$name."\n";
            //ask for amount 
            echo "enter amount\n";
            $amount = Utility::getInt();
            //ask for deposit or withdraw
            echo "press 1 to deposit\npress 2 to withdraw\n";
            $n = Utility::getInt();
            //if deposit the it will add in the bank amount
            if ($n == 1) {
                $bankCash += $amount;
            } 
            //else if withdraw then it will reduce from bank amount;
            elseif ($n == 2) {
                $bankCash += ($amount*(-1));
            }
        }
        // ask if there is more people to perfrom action or want to enqueue
        echo "\nif u want to enter more people\npress 1 else press any number\n";
        if (Utility::getInt()==1) {
            //if yes the again it will call name function for entry
            echo "enter number of people\n";
            name(Utility::getInt());
        }
    }
    echo "enter number of people\n";
    name(Utility::getInt());
    //end of day total bank amount
    echo "amount bank have: ".$bankCash;
?>