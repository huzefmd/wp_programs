<?php

function prime_no($max_no)
{
    echo "prime number upto $max_no:<br>";
    for ($no = 2; $no <= $max_no; $no++) {
        $isprime = true;

        for ($i = 2; $i <= sqrt($no); $i++) {
            if ($no % $i == 0) {
                $isprime = false;
                break;
            }
        }

        if ($isprime) {
            echo $no . " ";
        }
    }
    echo "<br>";
    echo "<br>";
}


function fs($num){
    $first=0;
    $secound=1;

    echo("Febonacii series for ($num Terms)");


    for($i=0; $i<=$num; $i++){

        echo $first . " ";
        $next= $first+$secound;
        $first=$secound;
        $secound=$next;
    }

}
prime_no(50);
fs(10); 

?>
