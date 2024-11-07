<?php  

function insertBarista($pdo, $barista_name, $experience_level, $contact_number) {
    $sql = "INSERT INTO Barista (barista_name, experience_level, contact_number) VALUES(?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$barista_name, $experience_level, $contact_number]);

    if ($executeQuery) {
        return true;
    } else {
        return false;
    }
}

function deleteBarista($pdo, $barista_id) {
    try {
        $deleteBaristaProduct = "DELETE FROM product WHERE barista_id = ?";
        $deleteStmt = $pdo->prepare($deleteBaristaProduct);
        $deleteStmt->execute([$barista_id]);

        $sql = "DELETE FROM Barista WHERE barista_id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$barista_id]);
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function deleteProduct($pdo, $product_id) {
    try {
        $deleteProduct = "DELETE FROM Product WHERE product_id = ?";
        $deleteStmt = $pdo->prepare($deleteProduct);
        $deleteStmt->execute([$product_id]);
        return true;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function updateBarista($pdo, $barista_name, $experience_level, $contact_number, $barista_id) {
    $sql = "UPDATE Barista SET barista_name = ?, experience_level = ?, contact_number = ? WHERE barista_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$barista_name, $experience_level, $contact_number, $barista_id]);

    if ($executeQuery) {
        return true;
    }
}

function updateProduct($pdo, $product_name, $price, $product_id) {
    $sql = "UPDATE Product SET product_name = ?, price = ? WHERE product_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$product_name, $price, $product_id]);

    if ($executeQuery) {
        return true;
    }
    return false;
}

function getAllBaristas($pdo) {
    $sql = "SELECT * FROM Barista";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getBaristaByID($pdo, $barista_id) {
    $sql = "SELECT * FROM Barista WHERE barista_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$barista_id]);

    if ($executeQuery) {
        return $stmt->fetch();
    }
}

function getProductByBarista($pdo, $barista_id) {
    $sql = "SELECT * FROM Product WHERE barista_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$barista_id]);
    return $stmt->fetchAll();
}

function getAllproduct($pdo) {
    $sql = "SELECT * FROM Product";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getProductByID($pdo, $product_id) {
    $sql = "SELECT * FROM Product WHERE product_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$product_id]);

    if ($executeQuery) {
        return $stmt->fetch();
    }
}

function addProduct($pdo, $barista_id, $product_name, $price) {
    $sql = "INSERT INTO Product (barista_id, product_name, price) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$barista_id, $product_name, $price]);
}

// Register User
function registerUser($pdo, $username, $password, $email) {
    // Check if username or email exists
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $email]);

    if ($stmt->rowCount() > 0) {
        return false; // User already exists
    }

    // Insert new user
    $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$username, $password, $email]);
}

// Login User
function loginUser($pdo, $username, $password) {
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);

    $user = $stmt->fetch();

    // If user exists, return user data
    if ($user) {
        return $user;
    }

    return false; // User not found
}


function getAllUsers($pdo) {
    $sql = "SELECT * FROM users";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}


function logoutUser() {
    session_start();
    session_unset();
    session_destroy();
}
?>
