<?php
    if ($units < 50) {
        $cost = $units;
    } else if ($units > 50 && $units < 100) {
        $cost = $units * 2;
    } else if ($units > 100 && $units < 150) {
        $cost = $units * 3;
    } else if ($units > 150) {
        $cost = $units * 4;
    }
?>