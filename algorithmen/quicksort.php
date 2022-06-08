<?php

$numbers = [7, 3, 1, 5, 2];
printArray($numbers);

$sorted = quicksort($numbers);
printArray($sorted);

function quicksort($array)
{
    // Abbruchbedingung der Rekursion
    if(count($array) <= 1){
        return $array;
    }
    
    // Wähle Pivotelement
    $pivotIndex = (int)(count($array) / 2);

    $left = [];
    $right = [];

    for($i = 0; $i < count($array); $i++)
    {
        // Pivotelement muss nicht links, rechts eingeordnet werden
        if($i == $pivotIndex){
            continue;
        }
        // wenn das Element < Pivot --> $left
        // ansonsten --> $right 
        if($array[$i] < $array[$pivotIndex])
        {
            $left[] = $array[$i];
        } else {
            $right[] = $array[$i];
        }
    }

    //
    return array_merge(quicksort($left), 
                [$array[$pivotIndex]], 
                quicksort($right));
}


function printArray($array)
{
    // Array mit Beistrich getrennt ausgeben
    echo implode(',', $array);
    echo '<br>';
}

?>