<?php

    function outputOrderRow($file, $title, $quantity, $price) {
        $amount=intval($quantity*$price);
        echo "<tr>";
        //TODO
        echo "<td><img src='images/books/tinysquare/$file' alt='$file'></td>";
        echo "<td>$title</td>";
        echo "<td>$quantity</td>";
        echo "<td>$price</td>";
        echo "<td>$amount</td>";
        echo "</tr>";
    }
?>