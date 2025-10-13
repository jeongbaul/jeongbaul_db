<?php
// DB 연결
function getConnection() {
    $conn = new mysqli("localhost", "root", "", "employees");
    if ($conn->connect_error) {
        die("DB 연결 실패: " . $conn->connect_error);
    }
    $conn->set_charset("utf8");
    return $conn;
}

// Create
function create($table, $data) {
    $conn = getConnection();
    $columns = implode(", ", array_keys($data));
    $placeholders = implode(", ", array_fill(0, count($data), '?'));
    $types = str_repeat('s', count($data)); // 모든 값을 문자열로 처리

    $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    $stmt = $conn->prepare($query);
    if (!$stmt) return false;

    $stmt->bind_param($types, ...array_values($data));

    $result = $stmt->execute();
    $insertId = $stmt->insert_id;

    $stmt->close();
    $conn->close();

    return $result ? ($insertId ?: true) : false;
}

// Read
function read($table, $conditions = [], $orderBy = '', $limit = '') {
    $conn = getConnection();
    $query = "SELECT * FROM $table";
    $params = [];
    $types = '';

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", array_map(fn($k) => "$k = ?", array_keys($conditions)));
        $params = array_values($conditions);
        $types = str_repeat('s', count($params));
    }

    if ($orderBy) $query .= " ORDER BY $orderBy";
    if ($limit) $query .= " LIMIT $limit";

    $stmt = $conn->prepare($query);
    if (!$stmt) return [];

    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $conn->close();

    return $rows;
}

// ReadPaging
function readPaging($table, $conditions = [], $orderBy = '', $page = 1, $perPage = 10) {
    $conn = getConnection();
    $params = [];
    $types = '';
    $whereSql = '';

    if (!empty($conditions)) {
        $whereSql = " WHERE " . implode(" AND ", array_map(fn($k) => "$k = ?", array_keys($conditions)));
        $params = array_values($conditions);
        $types = str_repeat('s', count($params));
    }

    // 총 레코드 수
    $countQuery = "SELECT COUNT(*) as total FROM $table $whereSql";
    $countStmt = $conn->prepare($countQuery);
    if (!empty($params)) {
        $countStmt->bind_param($types, ...$params);
    }
    $countStmt->execute();
    $countResult = $countStmt->get_result()->fetch_assoc();
    $totalRecords = $countResult['total'];
    $countStmt->close();

    // 데이터 가져오기
    $offset = ($page - 1) * $perPage;
    $dataQuery = "SELECT * FROM $table $whereSql";
    if ($orderBy) $dataQuery .= " ORDER BY $orderBy";
    $dataQuery .= " LIMIT ?, ?";

    $stmt = $conn->prepare($dataQuery);
    $allParams = $params;
    $typesWithPaging = $types . 'ii';
    $allParams[] = $offset;
    $allParams[] = $perPage;

    $stmt->bind_param($typesWithPaging, ...$allParams);
    $stmt->execute();
    $result = $stmt->get_result();

    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    $conn->close();

    return [
        'data' => $rows,
        'total' => $totalRecords,
        'page' => $page,
        'perPage' => $perPage,
        'lastPage' => ceil($totalRecords / $perPage)
    ];
}

// Update
function update($table, $data, $conditions) {
    $conn = getConnection();
    $setPart = implode(", ", array_map(fn($k) => "$k = ?", array_keys($data)));
    $wherePart = implode(" AND ", array_map(fn($k) => "$k = ?", array_keys($conditions)));

    $query = "UPDATE $table SET $setPart WHERE $wherePart";
    $stmt = $conn->prepare($query);

    $allData = array_merge(array_values($data), array_values($conditions));
    $types = str_repeat('s', count($allData));

    $stmt->bind_param($types, ...$allData);
    $result = $stmt->execute();

    $stmt->close();
    $conn->close();

    return $result;
}

// Delete
function delete($table, $conditions) {
    $conn = getConnection();
    $wherePart = implode(" AND ", array_map(fn($k) => "$k = ?", array_keys($conditions)));
    $query = "DELETE FROM $table WHERE $wherePart";

    $stmt = $conn->prepare($query);
    $types = str_repeat('s', count($conditions));
    $stmt->bind_param($types, ...array_values($conditions));

    $result = $stmt->execute();

    $stmt->close();
    $conn->close();

    return $result;
}
?>