<?php
/*
    to find minimum sum and maximum sum in 4 of 5 elements array you can do steps like this :
    1. check if array is empty or array length is not equalized to 5 if so return message "Invalid Array"
    2. make variable to total all of the sum of the array,
        make variable to store the minimum value in array,
        make variable to store the maximum value in array
    3. do a looping of array
    4. sum all of value in array
    5. check if minimum value now is greater than of value in array, if so change to that value
    6. check if maximum value now is less than of value in array, if so change to that value
    7. make variable to subtract total sum with minimum value to get maximum sum
    8. make variable to subtract total sum with maximum value to get minimum sum
    9. return minimum sum and maximum sum
*/

function minMaxSum($array) {
    // 1. check if array is empty or array length is not equalized to 5 if so return message "Invalid Array"
    if(empty($array) || count($array) != 5) {
        return "Invalid Array";
    }

    /* 2. make variable to total all of the sum of the array,
            make variable to store the minimum value in array,
            make variable to store the maximum value in array
    */
    $sum = 0;
    $min = $array[0];
    $max = $array[0];

    // 3. do a looping of array
    foreach($array as $value) {
        // 4. sum all of value in array
        $sum += $value;
        // 5. check if minimum value now is greater than of value in array, if so change to that value
        if($min > $value) {
            $min = $value;
        }
        // 6. check if maximum value now is less than of value in array, if so change to that value
        if($max < $value) {
            $max = $value;
        }
    }

    // 7. make variable to subtract total sum with minimum value to get maximum sum
    $maxSum = $sum - $min;

    // 8. make variable to subtract total sum with maximum value to get minimum sum
    $minSum = $sum - $max;

    // 9. return minimum sum and maximum sum
    return $minSum . " " . $maxSum;

}

echo minMaxSum([1, 3, 5, 7, 9]);
