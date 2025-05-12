<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>사원 등록</title>
    <script>
        function validateForm() {
            const first = document.querySelector('input[name="first_name"]').value.trim();
            const last = document.querySelector('input[name="last_name"]').value.trim();
            const gender = document.querySelector('input[name="gender"]').value.trim();
            if (first.length < 2 || last.length < 2) {
                alert("이름과 성은 2자 이상 입력해주세요.");
                return false;
            }
            if (gender !== 'M' && gender !== 'F') {
                alert("성별은 M 또는 F만 선택해주세요.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h1>사원등록</h1>

    <!-- 직원 등록 폼 -->
    <form action="insert-ok" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
        FirstName: <input type="text" name="first_name" required /><br />
        LastName: <input type="text" name="last_name" required /><br />
        BirthDate: <input type="date" name="birth_date" required /><br />
        Gender: 
        <input type="radio" name="gender" value="M" id="genderM" required />
        <label for="genderM">남성</label>
        <input type="radio" name="gender" value="F" id="genderF" />
        <label for="genderF">여성</label><br />
        HireDate: <input type="date" name="hire_date" required /><br />
        Profile Picture: <input type="file" name="photo" accept="image/*" /><br />

        <input type="submit" value="등록하기" />
        <input type="reset" value="초기화" />
        <input type="button" value="뒤로가기" onclick="location.replace('list')" />
    </form>
</body>
</html>
