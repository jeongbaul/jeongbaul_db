
    <h1>사진등록</h1>
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

    <form id="captchaForm" action="photo-ok" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
        select file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <canvas id="captchaCanvas" width="160" height="50"></canvas>
        <button id="refreshBtn">새로고침</button>
        <input type="text" id="captchaInput" maxlength="6" placeholder="캡차 입력">
        <button type="submit">확인</button>
        <div id="result"></div>
        <input type="submit" value="등록하기" />
    </form>

    
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
    // 캡차 값 저장 변수
    let captchaValue = '';


    // 새로고침 버튼 이벤트
    document.getElementById('refreshBtn').onclick = function() {
      captchaValue = drawCaptcha();
    };

    // 폼 제출 이벤트
    document.getElementById('captchaForm').onsubmit = function(e) {
      e.preventDefault();
      
      const userInput = document.getElementById('captchaInput').value.trim().toUpperCase();
      
      if (userInput === captchaValue) {
        // document.getElementById('result').textContent = '정답입니다!';
        this.submit();
      } else {
        document.getElementById('result').textContent = '틀렸습니다. 다시 시도하세요.';
        captchaValue = drawCaptcha();
      }
      document.getElementById('captchaInput').value = '';
    };

    // 페이지 로드시 캡차 그리기
    captchaValue = drawCaptcha();
  </script>
</body>
</html>