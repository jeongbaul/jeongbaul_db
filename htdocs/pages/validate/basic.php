<h1>인풋한개 값체크</h1>

<label for="id">id:</label><br>
<input type="text" id="id" name="idid" required><br>

<input type="button" onclick="goCheck()" value="login">

<script>
    function goCheck(){
        id = document.getElementById('id').value;
        if(id == ''){
            alert('아이디를 입력해주세요.')
        } else {
            alert(id)
        }
    }

</script>