<?php
session_start();

$conn = new mysqli("localhost", "root", "", "employees");
if ($conn->connect_error) {
    die("DB 연결 실패: " . $conn->connect_error);
}

// 로그인 확인 (사용자 삭제 시 필요)
if (!isset($_SESSION['user_id']) || !isset($_SESSION['level'])) {
    echo "<script>alert('로그인이 필요합니다.'); location.href='/user/login';</script>";
    exit;
}

$login_user_id = $_SESSION['user_id'];
$login_user_level = $_SESSION['level'];

// GET 파라미터 받기
$menu_id = $_GET['menu_id'] ?? '';
$target_user_id = $_GET['user_id'] ?? '';

// 사용자 삭제 처리
if ($target_user_id) {
    // 사용자 정보 조회
    $sql = "SELECT level FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $target_user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $target_user = $result->fetch_assoc();
    $stmt->close();

    if (!$target_user) {
        echo "<script>alert('삭제 대상 사용자가 존재하지 않습니다.'); history.back();</script>";
        exit;
    }

    $target_user_level = $target_user['level'];

    // 권한 체크
    if ($login_user_level == 1) {
        if ($target_user_level == 1) {
            echo "<script>alert('관리자는 삭제할 수 없습니다.'); history.back();</script>";
            exit;
        }
    } else {
        if ($login_user_id !== $target_user_id) {
            echo "<script>alert('권한이 없습니다.'); history.back();</script>";
            exit;
        }
    }

    // 삭제 실행
    $sql = "DELETE FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $target_user_id);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();

        if ($login_user_id === $target_user_id) {
            session_destroy();
            echo "<script>alert('회원 탈퇴가 완료되었습니다.'); location.href='/index.php';</script>";
            exit;
        } else {
            echo "<script>alert('사용자가 삭제되었습니다.'); location.href='/admin/user_list.php';</script>";
            exit;
        }
    } else {
        echo "<script>alert('삭제 중 오류가 발생했습니다: " . $conn->error . "'); history.back();</script>";
        $stmt->close();
        $conn->close();
        exit;
    }
}

// 메뉴 삭제 처리
if ($menu_id) {
    $sql = "DELETE FROM MENU WHERE MENU_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $menu_id);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        echo "<script>alert('메뉴가 삭제되었습니다.'); location.href='/menu/list';</script>";
        exit;
    } else {
        echo "삭제 오류: " . $conn->error;
        $stmt->close();
        $conn->close();
        exit;
    }
}

// 파라미터가 없을 때
echo "<script>alert('삭제할 대상이 지정되지 않았습니다.'); history.back();</script>";
$conn->close();
