<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';
ob_start();

if (isset($_POST['insertBaristaBtn'])) {

    $query = insertBarista($pdo, $_POST['barista_name'], 
        $_POST['experience_level'], $_POST['contact_number']);

    if ($query) {
        header("Location: ../index.php");
    }
    else {
        echo "Insertion failed";
    }

}
if (isset($_POST['addProductBtn'])) {
    $barista_id = $_POST['barista_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];

    $query = addProduct($pdo, $barista_id, $product_name, $price);

    if ($query) {
        header("Location: ../viewproduct.php?barista_id=$barista_id");
    } else {
        echo "Failed to add coffee";
    }
}


if (isset($_POST['editBaristaBtn'])) {
    $query = updateBarista($pdo, $_POST['barista_name'], 
        $_POST['experience_level'], $_POST['contact_number'], $_GET['barista_id']);

    if ($query) {
        header("Location: ../index.php");
    }

    else {
        echo "Edit failed";;
    }

}

if (isset($_POST['editProductBtn'])) {
    $query = updateProduct($pdo, $_POST['product_name'], $_POST['price'], $_GET['product_id']);
    $barista_id = $_POST['barista_id'];

    if ($query) {
        header("Location: ../viewproduct.php?product_id=$product_id");
    }

    else {
        echo "Edit failed";;
    }

}

if (isset($_POST['deleteProductBtn'])) {
    $product_id = $_GET['product_id'];
    $barista_id = $_POST['barista_id'];
    $query = deleteProduct($pdo, $product_id);

    if ($query) {
         header("Location: ../viewproduct.php?barista_id=$barista_id");
    } else {
         echo "Deletion failed";
    }
}




if (isset($_POST['deleteBaristaBtn'])) {
    $query = deleteBarista($pdo, $_GET['barista_id']);

    if ($query) {
        header("Location: ../index.php");
    }

    else {
        echo "Deletion failed";
    }
}


?>