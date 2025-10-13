// 랜덤 6자리 문자열 생성 함수
function generateCaptcha() {
    const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
    let result = '';
    for (let i = 0; i < 6; i++) {
    result += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    return result;
}

// 캔버스에 캡차 그리기
function drawCaptcha() {
    const captchaValue = generateCaptcha();
    const canvas = document.getElementById('captchaCanvas');
    const ctx = canvas.getContext('2d');
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // 배경
    ctx.fillStyle = '#f4f4f4';
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // 노이즈 선
    for (let i = 0; i < 5; i++) {
    ctx.strokeStyle = '#ccc';
    ctx.beginPath();
    ctx.moveTo(Math.random() * canvas.width, Math.random() * canvas.height);
    ctx.lineTo(Math.random() * canvas.width, Math.random() * canvas.height);
    ctx.stroke();
    }

    // 캡차 문자
    ctx.font = '28px Arial';
    ctx.fillStyle = '#333';
    for (let i = 0; i < captchaValue.length; i++) {
        const x = 20 + i * 22 + Math.random() * 4;
        const y = 35 + Math.random() * 4;
        ctx.save();
        ctx.translate(x, y);
        ctx.rotate((Math.random() - 0.5) * 0.3); // 약간 회전
        ctx.fillText(captchaValue[i], 0, 0);
        ctx.restore();
    }
    return captchaValue;
}
