<?php 
class Planning 
{
    private $startHours ;
    private $startMinutes;
    private $endHours ;
    private $endMinutes;

    

    public function __construct($startH,$startM, $endH, $endM)
    {
        if($startH < 0  || $startH > 23 || $endH < 0  || $endH > 23){
            echo "invalid time";
           return false;
        }
        if($startM < 0 || $startM > 60 || $endM < 0 || $endM > 60){
           echo "invalid time";
           return false;
        }
        if($startH == null)
        {
            $this->startHours = 8;
        }else{
            $this->startHours = $startH;
        }

        if($endH == null)
        {
            $this->endHours = 17;
        }else{
            $this->endHours = $endH;
        }


        if($startM == null)
        {
            $this->startMinutes = 0;
        }else{
            $this->startMinutes = $startM;
        }


        if($endM == null)
        {
            $this->endMinutes = 30;
        }else{
            $this->endMinutes = $endM;
        }
    }

    public function getPlanning()
    {
        $html = '<table><tr><th id="hour"></th><th id="available"></th></tr>';
        
        for($h = $this->startHours, $m = $this->startMinutes ; $h < $this->endHours; $m+=15)
        {
            
            if($m == 60){
                $m = 0;
                $h += 1;
            }

            if($h <= 13  || $h >= 15)
            {
                $time = $this->formatTime($h,$m);
                $html.= '<tr><td class="time-label">'.$time.'</td>';
                $html.= '<td class="planning-time" data-time="'.$time.'"></td></tr>';

            }

        }

        $html.= "</table>";

        return $html;
    }

    public function formatTime($startH = null, $startM = null)
    {
        $startH = ($startH < 10) ? "0".$startH : $startH;
        $startM = ($startM < 10) ? "0".$startM : $startM;
        return $startH.":".$startM.":00";
    }

    

}

















