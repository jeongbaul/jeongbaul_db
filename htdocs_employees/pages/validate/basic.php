<h1>인풋한개 값체크</h1>

<label for="id">id:</label><br>
<input type="text" id="id" name="idid" required><br>

<input type="button" onclick="goCheck()" value="login">

<input type="button" onclick="check()" value="confirm테스트">
<script>
    function goCheck(){
        id = document.getElementById('id').value;
        if(id == ''){
            alert('아이디를 입력해주세요.')
        } else {
            alert(id)
        }
    }
    function check(){
        if(confirm("정말로 삭제하시겠습니까?")){
            alert("삭제");
        } else {
            alert("취소");
        }

    }
</script>