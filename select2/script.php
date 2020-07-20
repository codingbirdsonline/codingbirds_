<?php

include "config.php";
include_once "Common.php";
$obj = new Common();

$oldCategoryArray =explode(',',$_POST['oldCategory']);

$tmpCategoryArray =  explode(',', trim($_POST['tokenfield']));

$selectedCategories =  $tmpCategoryArray;

foreach ($oldCategoryArray as $cat) {
    $pos = array_search($cat, $selectedCategories);
    unset($selectedCategories[$pos]);
}

/*foreach ($oldCategoryArray as $cat) {
    $pos = array_search($cat, $selectedCategories);
    unset($selectedCategories[$pos]);
}*/

foreach ($selectedCategories as $newCat) {
    $categoryId = $obj->saveCategory($connection,$newCat);
    array_push($tmpCategoryArray,$categoryId);

}

print_r(array_diff($tmpCategoryArray, $selectedCategories));

