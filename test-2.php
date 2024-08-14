<?php
/*
    to find ratios of elements that are positive, negative and zero you can do steps like this :
    1. check if array is empty or not if so return message "Invalid Array"
    2. make variable to store the positive value in array,
        make variable to store the negative value in array,
        make variable to store the zero value in array
        make variable to store the total length of array
    3. do a looping of array
    4. check if value now is positive, if so add 1 to positive variable
    5. check if value now is negative, if so add 1 to negative variable
    6. check if value now is zero, if so add 1 to zero variable
    7. devide every variable with total length of array
    8. return ratios of positive, negative and zero
*/

function plusMinus($arr) {
    // 1. check if array is empty or not if so return message "Invalid Array"
    if(empty($arr)) {
        return "Invalid Array";
    }
    // 2. make variable to store the positive value in array,
    //    make variable to store the negative value in array,
    //    make variable to store the zero value in array
    //    make variable to store the total length of array
    $positive = 0;
    $negative = 0;
    $zero = 0;
    $length = count($arr);
    // 3. do a looping of array
    foreach($arr as $value) {
        // 4. check if value now is positive, if so add 1 to positive variable
        if($value > 0) {
            $positive++;
        }
        // 5. check if value now is negative, if so add 1 to negative variable
        if($value < 0) {
            $negative++;
        }
        // 6. check if value now is zero, if so add 1 to zero variable
        if($value == 0) {
            $zero++;
        }
    }
    // 7. devide every variable with total length of array
    $positive = $positive / $length;
    $negative = $negative / $length;
    $zero = $zero / $length;
    // 8. return ratios of positive, negative and zero
    return [$positive, $negative, $zero];
}

print (implode("\n", plusMinus([-4, 3, -9, 0, 4, 1])));
