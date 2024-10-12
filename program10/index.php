<!-- write a php program to remove duplicate elements from the list -->
 <?php
function remove_duplicate($array){
    $result=array_values(array_unique($array));
    return $result;
}

$sorted_list=[1,1,2,3,5,6,5,4,6,4,5,6,4,5,8,7,9,2,5,6];
$unique_list=remove_duplicate(($sorted_list));

echo "orginal list:  ";
print($sorted_list);
echo " <br> Unique list:";
print($unique_list);



?>