<?php


$data = [
    [
        'id' => 1,
        'name' => 'John Doe',
        'age' => 20
    ],
    [
        'id' => 2,
        'name' => 'Jane Smith',
        'age' => 22
    ],
    [
        'id' => 3,
        'name' => 'Alice Johnson',
        'age' => 50
    ],
    [
        'id' => 4,
        'name' => 'Bob Brown',
        'age' => 55
    ],
    [
        'id' => 5,
        'name' => 'Bob ',
        'age' => 50
    ],
    [
        'id' => 6,
        'name' => 'b Brown',
        'age' => 50
    ]
];


function Search_by_criteria($data,$criteria){
    $result=[];
    foreach($data as $entry){
        $match=true;
        foreach ($criteria as $key=>$value){
            if(!isset($entry[$key]) ||$entry[$key]!=$value){
               $match=false;
               break; 
            }
        }
        if($match){
            $result[]=$entry;
        }

    }
    return $result;

}
$criteria=['age'=>50];


$search_result=Search_by_criteria($data,$criteria);

echo "Search Reasults are:<br>";
print_r($search_result);

?>