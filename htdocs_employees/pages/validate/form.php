<h1>폼 데이터 체크</h1>

<form id="myForm" action="/validate/form-ok" method="get">
<label for="id">id:</label><br>
<input type="text" id="id" name="idid" required><br>

<input type="button" onclick="goCheck()" value="login">
</form>
<script>
    function goCheck(){
        form = document.getElementById('myForm');
        id = document.getElementById('id').value;
        if(id == ''){
            alert('아이디를 입력해주세요.')
        } else {
            form.submit();
        }
    }

</script>