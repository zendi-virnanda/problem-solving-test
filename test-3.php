<?php
/*
    to convert time from 12 hour format to 24 hour format you can do steps like this :
    1. check if time is empty or is not 12 time format if so return message "Invalid Time"
    2. make variable to store the time in 24 hour format
    3. check if value now is time between 12:00 AM and 12:59 AM, if so substract 12 from time
    4. check if value now is time between 01:00 AM and 12:59 PM, if so return time
    5. check if value now is time between 01:00 PM and 11:59 PM, if so add 12 to time
    6. return time in 24 hour format
*/

function timeConversion($s) {
    // 1. check if time is empty or is not 12 time format if so return message "Invalid Time"
    if(empty($s) || substr($s, 8, 2) != "AM" && substr($s, 8, 2) != "PM") {
        return "Invalid Time";
    }

    // 2. make variable to store the time in 24 hour format
    $time = "";

    // 3. check if value now is time between 12:00 AM and 12:59 AM, if so substract 12 from time
    if(substr($s, 8, 2) == "AM" && substr($s, 0, 2) == "12") {
        $time = "00" . substr($s, 2, 6);
    }

    // 4. check if value now is time between 01:00 AM and 12:59 PM, if so return time
    else if(substr($s, 8, 2) == "AM" && substr($s, 0, 2) != "12") {
        $time = substr($s, 0, 8);
    }

    // 5. check if value now is time between 01:00 PM and 11:59 PM, if so add 12 to time
    else if(substr($s, 8, 2) == "PM" && substr($s, 0, 2) != "12") {
        $time = substr($s, 0, 2) + 12 . substr($s, 2, 6);
    }

    // 6. return time in 24 hour format
    return $time;
}

echo timeConversion("07:05:45PM");
