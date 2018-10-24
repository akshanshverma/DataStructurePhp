<?php
    class Utility
    {
        /**
        * function getInt is method which take user input and 
        * check the input is numeric or not
        * @return $n int type value
        */
        function getInt()
        {
            fscanf(STDIN,"%d\n",$n);
            while(!is_numeric($n))
            {
                echo "enter numeric value"."\n";
                fscanf(STDIN,"%d\n",$n);
            }
            return $n;     
        }

        /**
         * function read file is to read file and return in the form of string
         * 
         * @param file path
         * @return string data of file
         */
        static function readFl($file)
        {
            $fileC = fopen($file,"r") or die("unable to open");

            return fread($fileC, filesize($file));
        }

        /**
         * function writeFl file is to write file
         * 
         * @param file path
         * @param $data to store in file
         */
        static function writeFl($data,$file)
        {
            $filec = fopen($file,"w") or die("unable to open");
            fwrite($filec,$data);
        }

        /**function leapYear is use to check the year is leap year or not it 
        * take input form use and print year is leap or not 
        *
        * @param $n is year which we want ot check leap year or not  
        */
        static function leapYear($n)
        {
                if (strlen((string)$n)==4) 
                {
                    //check year is leap or not
                    if ((($n % 4 == 0) && ($n % 100 != 0)) || ($n % 400 == 0)) 
                    {
                    return true;
                    } 
                    else 
                    {
                        return false;
                    }   
                }  
                else
                {
                    return false;
                }                                
        }
        /**
         * function prin day is to take date form user and return the day of that day 
         * 
         * @param $d day 
         * @param $m month 
         * @param $y year
         * @return $d0 day between 0 to 6 
         */
        function printDay($d,$m,$y)
        {
            
            $y0 = $y - (int)((14 - $m) / 12);
            $x = $y0 + (int)($y0/4) - (int)($y0/100) + (int)($y0/400);
            $m0 = $m + 12 * (int)((14 - $m) / 12) - 2;
            $d0 = ($d + $x + (int)((31*$m0) / 12)) % 7;
            return $d0;
        }
    }

    /**
     * Node class is a Node type class which hold data and the address of next value
     */
    class Node
    {
        //data on node
        public $data;
        //hold address of next node or null 
        public $next = null;

        public function Node($data)
        {
            $this->data = $data;
        }
    }
?>