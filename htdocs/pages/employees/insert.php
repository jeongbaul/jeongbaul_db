<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>사원등록</h1>
    <!--등록화면
        method : GET, POST
        data:
            'emp_no' => '500000',
            'birth_date' => '1955-11-20',
            'first_name' => 'joonhyeok',
            'last_name' => 'lim',
            'gender' => 'M' ,
            'hire_date' => '2025-01-22'        
    -->
    <form action="insert-ok" method="post" id="insertForm">
    FirstName:<input type="text" name="first_name" id="first_name"/><br />
    LastName:<input type="text" name="last_name" id="last_name"/><br />
    BirthDate:<input type="text" name="birth_date" id="birth_date"/><br />
    Gender:<input type="text" name="gender" id="gender"/><br />
    HireDate:<input type="text" name="hire_date" id="hire_date"/><br />
    <input type="button" value="등록하기" onclick="goCheck()" />
    <input type="reset" value="초기화" />
    <input type="button" value="뒤로가기" onclick="location.replace('list')" />
    </form>

    <script>
        function goCheck(){
            form = document.getElementById('insertForm');
            first_name = document.getElementById('first_name').value;
            last_name = document.getElementById('last_name').value;
            birth_date = document.getElementById('birth_date').value;
            gender = document.getElementById('gender').value;
            hire_date = document.getElementById('hire_date').value;
            
            if(first_name == '' ||
                last_name == '' ||
                birth_date == '' ||
                gender == '' ||
                hire_date == ''){
                    alert("비어있는 input 이 존재합니다.");
            } else {
                form.submit();
            }
        }

    </script>
</body>
</html>