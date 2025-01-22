<?php
// Create
function create($table, $data) {
    $conn = getConnection();
    $columns = implode(", ", array_keys($data));
    $placeholders = ":" . implode(", :", array_keys($data));
    $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    $stmt = $conn->prepare($query);
    
    foreach ($data as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }
    
    if ($stmt->execute()) {
        $lastId = $conn->lastInsertId();
        return $lastId !=='0' ? $lastId : true;
    }
    return false;
}

// Read
function read($table, $conditions = [], $orderBy = '', $limit = '') {
    $conn = getConnection();
    $query = "SELECT * FROM $table";
    
    if (!empty($conditions)) {
        $query .= " WHERE " . implode(' AND ', array_map(function($item) {
            return "$item = :$item";
        }, array_keys($conditions)));
    }
    
    if ($orderBy) {
        $query .= " ORDER BY $orderBy";
    }
    
    if ($limit) {
        $query .= " LIMIT $limit";
    }
    
    $stmt = $conn->prepare($query);
    
    foreach ($conditions as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }
    
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function readPaging($table, $conditions = [], $orderBy = '', $page = 1, $perPage = 10) {
    $conn = getConnection();
    $query = "SELECT * FROM $table";
    
    if (!empty($conditions)) {
        $query .= " WHERE " . implode(' AND ', array_map(function($item) {
            return "$item = :$item";
        }, array_keys($conditions)));
    }
    
    if ($orderBy) {
        $query .= " ORDER BY $orderBy";
    }
    
    // �꾩껜 �덉퐫�� �� 怨꾩궛
    $countQuery = "SELECT COUNT(*) as total FROM $table";
    if (!empty($conditions)) {
        $countQuery .= " WHERE " . implode(' AND ', array_map(function($item) {
            return "$item = :$item";
        }, array_keys($conditions)));
    }
    $countStmt = $conn->prepare($countQuery);
    foreach ($conditions as $key => $value) {
        $countStmt->bindValue(":$key", $value);
    }
    $countStmt->execute();
    $totalRecords = $countStmt->fetch(PDO::FETCH_ASSOC)['total'];
    
    // �섏씠吏� �곸슜
    $offset = ($page - 1) * $perPage;
    $query .= " LIMIT :offset, :perPage";
    
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);
    
    foreach ($conditions as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }
    
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return [
        'data' => $results,
        'total' => $totalRecords,
        'page' => $page,
        'perPage' => $perPage,
        'lastPage' => ceil($totalRecords / $perPage)
    ];
}

// Update
function update($table, $data, $conditions) {
    $conn = getConnection();
    $set = implode(', ', array_map(function($item) {
        return "$item = :$item";
    }, array_keys($data)));
    
    $where = implode(' AND ', array_map(function($item) {
        return "$item = :condition_$item";
    }, array_keys($conditions)));
    
    $query = "UPDATE $table SET $set WHERE $where";
    $stmt = $conn->prepare($query);
    
    foreach ($data as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }
    
    foreach ($conditions as $key => $value) {
        $stmt->bindValue(":condition_$key", $value);
    }
    
    return $stmt->execute();
}

// Delete
function delete($table, $conditions) {
    $conn = getConnection();
    $where = implode(' AND ', array_map(function($item) {
        return "$item = :$item";
    }, array_keys($conditions)));
    
    $query = "DELETE FROM $table WHERE $where";
    $stmt = $conn->prepare($query);
    
    foreach ($conditions as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }
    
    return $stmt->execute();
}

?>
