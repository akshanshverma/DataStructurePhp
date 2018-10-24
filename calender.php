<?php
    /**
    * 
    * Purpose:  calender is to print the calender of any month
    *
    *  @author  Akshansh Verma
    *  @version 1.0
    *  @since   22-10-2018
    */
    require("utility.php");

    /**
     * function saveCal is to store data in 2d array 
     * 
     * @param $month month which we want to show
     * @param $year year of month which we want to check
     * @return $priArr 2d array which hold value of month
     */
    function saveCal($month,$year)
    {
        //array to check the total number of day month have
        $monthArr = array(31,28,31,30,31,30,31,31,30,31,30,31);
        //if year is leap year then is will increase one day ne 2nd month
        if (Utility::leapYear($year)) {
            $monthArr[1] = 29;
        }
       
        //array which hold all day and date of month
        $priArr = array(array(" s "," m "," t "," w "," th"," f "," s "));
        //printDay is to get 1st day of month 
        $firstDay = Utility::printDay(1,$month,$year);
        
        //$j will hold 1st day and start loop from 1st day 
        $j = $firstDay; 
        //$date is to store date in the array
        $date = 1;


        //for loop to store every week in the array
        for ($i=1; $i < 7; $i++) { 
            //array which hold the date of week and is there is no date then it
            //hold empty string
            $iArr = array_fill(0,7,"   ");
            //for loop to store date in week 
            for ($j ; $j < 7; $j++) { 
                //if for last day of month 
                if ($date <= $monthArr[$month-1]) {
                    if ($date < 10) {
                        $iArr[$j] = " ".$date++." ";
                    } else {
                        $iArr[$j] = " ".$date++;
                    }
                }
                
            }
            $j = 0;
            //push array in month array
            array_push($priArr,$iArr);
            
        }
        return $priArr;
    }
    
    /**
     * function print cal is to print calender
     * 
     * @param #priArr 2D array to print 
     */
    function printCal($priArr)
    {
        for ($i=0; $i < 7; $i++) { 
            for ($j=0; $j < 7; $j++) { 
                echo $priArr[$i][$j];
            }
            echo "\n";
        }
    }

    //user input of month and year
    echo "enter month\n";
    $month = Utility::getInt();
    while($month > 12 || $month < 1){
        echo "enter value 1 to 12\n";
        $month = Utility::getInt();
    }
    echo "enter year\n";
    $year = Utility::getInt();
    printCal(saveCal($month,$year));
?>