<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <!--등록화면
        method : GET, POST
        data:
            'emp_no' => '500000',
            'birth_date' => '1955-11-20',
            'first_name' => 'joonhyeok',
            'last_name' => 'lim',z
            'gender' => 'M' ,
            'hire_date' => '2025-01-22'        
    -->

    <form action="insert-ok" method="post" onsubmit="return validateForm()">
    FirstName:<input type="text" name="first_name" /><br />
    LastName:<input type="text" name="last_name" /><br />
    BirthDate:<input type="text" name="birth_date" /><br />
    Gender:<input type="text" name="gender" /><br />
    HireDate:<input type="text" name="hire_date" /><br />
    <input type="submit" value="등록하기" />
    <input type="button" onclick="validateForm()" value="test" />
    <input type="reset" value="초기화" />
    <input type="button" value="뒤로가기" onclick="location.replace('list')" />
    </form>
</body>
</html>