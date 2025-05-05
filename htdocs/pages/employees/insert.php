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
            'last_name' => 'lim',z
            'gender' => 'M' ,
            'hire_date' => '2025-01-22'        
    -->
    <form action="insert-ok" method="post">
    FirstName:<input type="text" name="first_name" /><br />
    LastName:<input type="text" name="last_name" /><br />
    BirthDate:<input type="text" name="birth_date" /><br />
    Gender:<input type="text" name="gender" /><br />
    HireDate:<input type="text" name="hire_date" /><br />
    <input type="submit" value="등록하기" />
    <input type="reset" value="초기화" />
    <input type="button" value="뒤로가기" onclick="location.replace('list')" />
    </form>
</body>
</html>