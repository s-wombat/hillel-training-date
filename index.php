<?php
require __DIR__ . "/vendor/autoload.php";
use App\Date;

try {
    $d = new Date('2723-01-10');
    echo $d->getYear(), "<pre>";
    echo $d->getMonth(), "<pre>";
    echo $d->getDay(), "<pre>";
    echo $d->dateComparison(), "<pre>";
    echo $d->dateFormat('Y:m:d'), "<pre>";
    echo $d->dateDifference(), "<pre>";
} catch (\InvalidArgumentException $e) {
    echo 'Error: ', $e->getMessage(), "\n";
}
