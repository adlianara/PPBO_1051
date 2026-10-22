<?php

require_once "models/Product.php";

$product = new Product();

$id = $_GET["id"] ?? null;

if (!$id) {
    header("Location: index.php");
    exit;
}

$product->delete($id);

header("Location: index.php");
exit;