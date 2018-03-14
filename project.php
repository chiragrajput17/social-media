<?php
include("database.php");
extract($_POST);
if(isset($sub))
{
    //sql injection
    $a=mysqli_real_escape_string($link,htmlentities(trim($a)));

    $sel=mysqli_query($link,"select `$a` from tagging where fname='$a'");

    $sel1=mysqli_query($link,"select location from tagging where fname='$sid' AND (p1='$a' OR p2='$a' OR p3='$a'OR p4='$a') ");
    $arr=mysqli_fetch_assoc($sel1);

    $s=mysqli_num_rows($sel1);
    $sel2=mysqli_query($link,"select hcity from admin where fname='$sid'");
    $sel3=mysqli_query($link,"select hcity from admin where fname='$a'");
    // $arr1=mysqli_fetch_assoc($sel1);
    $arr2=mysqli_fetch_assoc($sel2);
    $arr3=mysqli_fetch_assoc($sel3);
    $i=1;
    ini_set('max_execution_time',0);
    $td=0;
    $y=6;
    $td=0;
    while($i<=$s)
    {
    //$sel1=mysqli_query($link,"select location from activity where fname='$sid'");
    
    $r1=0;
    if(($arr['location']!=$arr2['hcity'] || $arr['location']!=$arr3['hcity']) && $arr2['hcity']!=$arr3['hcity'] )
    {
        $f=$arr['location'];
        $d1=mysqli_query($link,"select `$f` from distance where fname='$sid'");
        $dc1=mysqli_fetch_assoc($d1);
        
        $d2=mysqli_query($link,"select `$f` from distance where fname='$a'");
        $dc2=mysqli_fetch_assoc($d2);
        $s1=array_pop($dc1);
        $s2=array_pop($dc2);
        
       // $dh1=100;
        //$dh2=120;
    
        $alpha=($s1+$s2)/2;
        if($alpha<500)
            $r=1.28+0.0009*($alpha);
        if($alpha>500 && $alpha<1000)
            $r=2.29+0.001*($alpha);
        if($alpha>1000)
            $r=2.79+0.001*($alpha);

        if($r>=1 && $r<=$y)
            $b=$y;
        else
            $b=$r;
        
       // $pl=$arr1['location'];
       // $pd=$arr1['date'];
        $i++;
         //$sel4=mysqli_query($link,"select location,date from events where id='$i'");
        // $arr4=mysqli_fetch_assoc($sel4);
        // $nl=$arr4['location'];
        // $nd=$arr4['date'];
        /* if($pl==$nl)
         {
            do{
                $d=$nd-$pd;
                if($d<=$b)
                {
                    $r1=$r1+$d;
                     $pl=$arr4['location'];
                      $pd=$arr4['date'];
                        $i++;
                        $sel5=mysqli_query($link,"select location,date from events where id='$i'");
                        $arr5=mysqli_fetch_assoc($sel5);
                        $nl=$arr5['location'];
                     $nd=$arr5['date'];
                }
                else break;

                }while($pl!=$nl && $i<3);

            }

           // $re=max($r,$r1);
         */



    }

    else {
        $r=1;
        $i++;
    }
    
    $td=$td+$r;

    }
    
}    


?>
<form method="post" enctype="multipart/form-data">
                        <input  size="40" type="text" name="a" placeholder="enter friend's name"></br></br>

                        </br></br>  
                        <label> calculate DST :&nbsp;</label><input type="submit" name="sub" class="btn btn-info btn-sm "></br>
                  
               </form>
<h3>Total Days Spent Togethor:<?=floor($td)?></h3>