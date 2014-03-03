<?php
foreach ( $data as $history){
    echo($history->getId())."&nbsp";
    echo($history->getText()->getText());
    echo "<br />";
}
