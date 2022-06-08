<?php

// Diese Daten sollen sortiert werden
$arr = [7, 3, 1, 5, 2];
printArray($arr);

// Bubblesort
// bubbleSort(Array A)
//   for (n=A.size; n>1; --n){
//     for (i=0; i<n-1; ++i){
//       if (A[i] > A[i+1]){
//         A.swap(i, i+1)
//       } // Ende if
//     } // Ende innere for-Schleife
//   } // Ende äußere for-Schleife

// verringert schrittweise die rechte Grenze für die Bubble-Phase
for($n = count($arr); $n > 1; --$n)
{
    // der nicht sortierte Teil des Feldes wird durchlaufen
    for($i = 0; $i < $n - 1; ++$i)
    {
        // zwei benachbarte Elemente vergleichen
        if($arr[$i] > $arr[$i + 1])
        {
            //swap
            $tmp = $arr[$i];
            $arr[$i] = $arr[$i + 1];
            $arr[$i + 1] = $tmp;
        }
    }
}

printArray($arr);

function printArray($array)
{
    // Array mit Beistrich getrennt ausgeben
    echo implode(',', $array);
    echo '<br>';
}




?>