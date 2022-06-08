<?php

// Diese Daten sollen sortiert werden
$arr = [7, 3, 1, 5, 2];
printArray($arr);

// Insertion sort 
// INSERTIONSORT(A)

// for i = 1 to (Länge(A)-1) do
//      einzusortierender_wert = A[i]
//      j = i
//      while (j > 0) and (A[j-1] > einzusortierender_wert) do
//           A[j] = A[j - 1]
//           j = j − 1
//      end while
//      A[j] = einzusortierender_wert
// end for

// das erste Element am Index 0 wird übersprungen (schließlich kann links
// davon nichts sein wo es eingefügt werden könnte)
for($i = 1; $i < count($arr); $i++)
{
    $einzusortierenderWert = $arr[$i];
    $j = $i;
    // verschiebe die Array-Elemente nach rechts solange der einzufügende
    // Wert kleiner oder gleich das aktuell betrachtete Element $j ist 
    while($j > 0 && $arr[$j - 1] > $einzusortierenderWert)
    {
        $arr[$j] = $arr[$j - 1];
        $j--;
    }
    $arr[$j] = $einzusortierenderWert;
}

printArray($arr);


function printArray($array)
{
    // Array mit Beistrich getrennt ausgeben
    echo implode(',', $array);
    echo '<br>';
}

?>