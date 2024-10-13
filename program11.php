<?php
$n=5;
for($i=$n;$i>0;$i--){

    for($j=$n-$i;$j>0;$j--){
        echo "&nbsp;";
    }

    for($k=0;$k<$i;$k++){
        echo "*";
    }

    echo "<br>";


}

?>


<!-- n = 5  # Number of rows

for i in range(n, 0, -1):  # Outer loop: controls the rows (starts from n down to 1)
    
    # Print spaces (n - i spaces in each row)
    for j in range(n - i):
        print(" ", end="")  # Use 'end=""' to stay on the same line

    # Print stars (i stars in each row)
    for k in range(i):
        print("*", end="")  # Stay on the same line

    print()  # Move to the next line after each row -->