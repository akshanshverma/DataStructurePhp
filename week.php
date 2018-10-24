<?php
    //require("unOrderedList.php");
    require("queue.php");
    $date = 1;
    class WeekDay
    {
        public $date = " ";
        public $day;

        function WeekDay($date,$day){
            $this->date = $date;
            $this->day = $day;
        }
    }

    class Week
    {
        function Week($firstDay,$lastDay){
            global $date;
            $days = array("s","m","t","w","th","f","s");
            $arr = array_fill(0,7," ");
            
            for ($i=$firstDay; $i <= $lastDay; $i++) { 
                $arr[$i] = new WeekDay($date++,$days[$firstDay]);
            }
        }
    }

    function queueF($month,$year){
        $q = new Queue();
        $monthArr = array(31,28,31,30,31,30,31,31,30,31,30,31);
        if (Utility::leapYear($year)) {
            $monthArr[1] = 29;
        }
        $n = 1;
        //for ($i=0; $i < 6; $i++) { 
            $firstDay = Utility::printDay($n,$month,$year);
            $q->enqueue(new Week($firstDay%7,6-$firstDay));
            $n = $n + (6-$firstDay)+1;
        //}
        
    }
    queueF(10,2018);
?>