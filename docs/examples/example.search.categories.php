<?php

require('../../vendor/autoload.php');

use Attogram\SharedMedia\Api\Category;

$category = new Category();
$category->setLimit(2);
$results = $category->search('Albert Einstein');
foreach ($results as $result) {
    print_r($result);
}

/* RESULT:

Array
(
    [pageid] => 970886
    [ns] => 14
    [title] => Category:Albert Einstein
    [index] => 1
    [categoryinfo.size] => 198
    [categoryinfo.pages] => 3
    [categoryinfo.files] => 177
    [categoryinfo.subcats] => 18
    [categoryinfo.hidden] => 
)
Array
(
    [pageid] => 41480939
    [ns] => 14
    [title] => Category:Albert-Einstein-Schule Laatzen
    [index] => 2
    [categoryinfo.size] => 1
    [categoryinfo.pages] => 0
    [categoryinfo.files] => 1
    [categoryinfo.subcats] => 0
    [categoryinfo.hidden] => 
)
*/