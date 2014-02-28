<?php

foreach ($data as $value) {
    var_dump($value->getId());
    var_dump($value->getText()->getText());
}
