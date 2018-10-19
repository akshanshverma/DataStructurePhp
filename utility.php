<?php
    class Utility
    {
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

        static function readFl($file)
       {
           $fileC = fopen($file,"r") or die("unable to open");

           return fread($fileC, filesize($file));
       }

       static function writeFl($data,$file)
       {
           $filec = fopen($file,"w") or die("unable to open");
           fwrite($filec,$data);
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