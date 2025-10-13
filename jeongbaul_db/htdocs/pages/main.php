<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>예한교회</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url(https://cdn.jsdelivr.net/gh/moonspam/NanumSquare@1.0/nanumsquare.css);
        body {
            font-family: 'NanumSquare', sans-serif;
            font-size: 0.75em;
            background-color: var(--bg-color);
        }
        :root {
            --primary-color: #C17817;
            --bg-color: #FFF8F0;
        }
        .section {
            padding: 15px;
            background-color: white;
        }
        .order-list {
            list-style-type: decimal;
            padding-left: 20px;
        }
        .order-list li {
            margin-bottom: 10px;
        }
        ul > li {
            margin-bottom: 10px;
        }
        .worship-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin: 20px 0;
        }

        .worship-table th {
            background-color: #f8f4e8;
            padding: 12px 15px;
            font-weight: 600;
            color: #8b4513;
            border-bottom: 2px solid #deb887;
        }

        .worship-table td {
            padding: 10px 15px;
            border-bottom: 1px solid #f0e6d2;
            color: #5a4a42;
        }

        .worship-table tr:last-child td {
            border-bottom: none;
        }

        .worship-time {
            color: #996633;
            font-weight: 500;
        }

        .worship-table tr:hover {
            background-color: #fff9f0;
            transition: background-color 0.2s ease;
        }        
        .time-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
        }
        .time-table td {
            padding: 5px;
        }
        .title-box {
            /* border: 2px solid #FFA500; */
            padding: 20px;
            text-align: center;
            position: relative;
            background: white;
        }
        .leaf-frame {
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            border: 2px solid transparent;
            background-image: url('leaves-pattern.png');
            z-index: -1;
        }
        .church-info {
            font-size: 0.9rem;
            margin-top: 20px;
        }
        .map-section {
            margin-top: 20px;
        }
        .map-section img {
            max-width: 100%;
            height: auto;
        }
        dl {
            margin: 0;
            padding-left: 20px;
        }

        dt {
            font-weight: bold;
            margin-top: 15px;
        }

        dd {
            margin-left: 20px;
            margin-bottom: 10px;
            position: relative;
        }

        dd::before {
            content: "♣";
            position: absolute;
            left: -15px;
        }

        .back-color {
            background-color:rgb(212, 212, 212);
        }
        .bold {font-weight: bold;}

        @media (max-width: 768px) {
            .col-md-4 {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body class="bg-light">
    <div class="container-fluid py-4">
        <div class="row">
            <!-- 우측 섹션 -->
            <div class="col-12 col-md-4">
                <div class="section">
                    <div class="title-box">
                        <div class="leaf-frame"></div>
                        <h2 class="mb-0">예한교회</h2>
                        <p class="text-muted mt-2">2025년 1월 12일 통권 8권 2호</p>
                    </div>
                    <div class="church-info text-center">
                        <img src="/img/main.jpg" width="100%"/>
                    </div>


                    <div class="church-info text-center">
                    예수 그리스도 안에서  <br />
                    한 새사람을 지어  <br />
                    화평하게 하시고<br />
                    또 십자가로  <br />
                    이 둘을 한 몸으로<br />
                    하나님과 화목하게 하려 <br />
                    하심이라<br />
                    (엡 2:15-16)
                    </div>
                    <div class="church-info text-center">
                        <p>주소: 인천광역시 미추홀구 OO로 123</p>
                        <p>전화: 02-123-4567</p>
                        <p>이메일: church@example.com</p>
                    </div>
                </div>
            </div>

            <!-- 좌측 섹션 -->
            <div class="col-12 col-md-4">
                <div class="section">
                    <h5 class="mb-1">예배 순서</h5>
                    <table class="worship-table">
                        <tr>
                            <td>찬양</td>
                            <td>김선종 형제</td>
                        </tr>
                        <tr>
                            <td>사도신경</td>
                            <td>다함께</td>
                        </tr>
                        <tr>
                            <td>주기도문</td>
                            <td>다함께</td>
                        </tr>
                        <tr>
                            <td>교리문답</td>
                            <td>다함께</td>
                        </tr>
                        <tr>
                            <td>찬양</td>
                            <td>1장</td>
                        </tr>
                        <tr>
                            <td>기 도</td>
                            <td>김유진 자매</td>
                        </tr>
                        <tr>
                            <td>성경봉독</td>
                            <td>마 13:24-30,36-43</td>
                        </tr>
                        <tr>
                            <td>말씀선포</td>
                            <td>배준석 목사</td>
                        </tr>
                        <tr>
                            <td>합심기도</td>
                            <td>다함께</td>
                        </tr>
                        <tr>
                            <td>찬 양</td>
                            <td>620장</td>
                        </tr>
                        <tr>
                            <td>헌금기도/축도</td>
                            <td>배준석 목사</td>
                        </tr>
                        <tr>
                            <td>교회소식</td>
                            <td>인도자</td>
                        </tr>
                    </table>                    
                    <div class="announcement mt-4">
                        <h6>교회소식 및 공지사항</h6>
                        <dl>
                            <dt>1. 예배에 참석하신 분들을 환영합니다.</dt>
                            
                            <dt>2. 1월 기도위원</dt>
                            <dd>19일(선종) / 26일(다솜)</dd>
                            
                            <dt>3. 1월 축하</dt>
                            <dd>생일 - 수정(9,목) / 선종(16,금) / 아영(26,주일)</dd>
                            
                            <dt>4. 함께 기도해 주셔요.</dt>
                            <dd>대한민국 / 시험 / 예배당 이전 / 지체와 가족의 건강</dd>
                            
                            <dt>5. 1월 행사 (단, 사정에 따라 변경될 수 있습니다.)</dt>
                            <dd>대면기도회(금요일 저녁9시) - 3일, 17일</dd>
                            <dd>리더모임A(토요일 오후2시) - 11일, 25일</dd>
                            <dd>리더모임 B(매주 화요일 오전11시)</dd>
                            
                            <dt>6. 온라인헌금계좌</dt>
                            <dd>국민은행 228-21-0878-817 (예금주:배준석)</dd>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- 중앙 섹션 -->
            <div class="col-12 col-md-4">
                <div class="section">
                <h5 class="mb-1">찬양 가사</h5>
                    <table class="time-table">
                        <tr>
                            <th>꽃들도</th>
                        </tr>
                        <tr>
                            <td>
1.이곳에 생명 샘 솟아나 눈물 골짝 지나갈 때에 <br />
머잖아 열매 맺히고 웃음 소리 넘쳐나리라 <br />
2. 그 날에 하늘이 열리고 모든 이가 보게 되리라 <br />
마침내 꽃들이 피고 영광의 주가 오시리라 <br />
(후렴)꽃들도 구름도 바람도 넓은 바다도 <br />
찬양하라 찬양하라 예수를 <br />
하늘을 울리며 노래해 나의 영혼아 <br />
은혜의 주 은혜의 주 은혜의 주</td>
                        </tr>
                        <tr>
                            <th>하나님의 부르심</th>
                        </tr>
                        <tr>
                            <td>
1. 하나님의 부르심에는 후회하심이 없네 <br />
내가 이 자리에 선 것도 주의 부르심이라 <br />
하나님의 부르심에는 결코 실수가 없네 <br />
나를 부르신 하나님의 신실하심을 믿네 <br />
2. 작은 나를 부르신 뜻을 나는 알 수 없지만 <br />
오직 감사와 순종으로 주의 길을 가리라 <br />
때론 내가 연약해져도 주님 날 도우시니 <br />
주의 놀라운 그 계획을 나는 믿으며 살리 <br />
(후렴) 날 부르신 뜻 내 생각보다 크고 <br />
날 향한 계획 나의 지혜로 측량 못하나 <br />
가장 좋은 길로 가장 완전한 길로 <br />
오늘도 날 이끄심 믿네 </td>
                        </tr>
                    </table>

                    <!-- <table class="time-table mt-4">
                        <tr>
                            <th colspan="2">주중 예배시간</th>
                        </tr>
                        <tr>
                            <td>수요예배</td>
                            <td>19:30</td>
                        </tr>
                        <tr>
                            <td>새벽기도</td>
                            <td>05:30</td>
                        </tr>
                    </table>

                    <div class="map-section">
                        <h6>오시는 길</h6>
                        <div class="map-placeholder" style="width: 100%; height: 150px; background-color: #f8f9fa;">
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <br />
        <div class="row">
            <!-- 우측 섹션 -->
            <div class="col-12 col-md-4">
                <div class="section">
                <h5 class="mb-1">사도신경</h5>
                    <table class="time-table">
                        <colgroup>
                            <col style="width: 20%">
                            <col style="width: 80%">
                        </colgroup>
                        <tr>
                            <th colspan="2">우리가 믿는 바가 무엇인지 고백하는 시간입니다.  </th>
                        </tr>
                        <tr class="back-color">
                            <td class="">인도자</td>
                            <td>당신은 성부 하나님을 믿습니까?</td>
                        </tr>
                        <tr class="bold">
                            <td>성  도</td>
                            <td>나는 전능하신 아버지 하나님,
                            천지의 창조주를 믿습니다. </td>
                        </tr>
                        <tr class="back-color">
                            <td>인도자</td>
                            <td>당신은 성자 예수님을 믿습니까?  </td>
                        </tr>
                        <tr class="bold">
                            <td>성  도</td>
                            <td>나는 그의 유일하신 아들, 
                            우리 주 예수 그리스도를  믿습니다. </td>
                        </tr>
                        <tr class="back-color">
                            <td>인도자</td>
                            <td>당신은 성자 예수님이 무엇을 하셨음을 믿습니까?  </td>
                        </tr>
                        <tr class="bold">
                            <td>성  도</td>
                            <td>성자 예수님은
성령으로 잉태되어 동정녀 마리아에게 나시고                
본디오 빌라도에게  
고난을 받아 십자가에 못박혀 죽으시고  
장사된 지 사흘 만에 죽은 자 가운데서  
다시 살아나셨으며  
하늘에 오르시어  
전능하신 아버지 하나님 우편에 앉아 계시다가,  
거기로부터  
살아 있는 자와 죽은 자를 심판하러  
오시는 것을 믿습니다.  </td>
                        </tr>
                        <tr class="back-color">
                            <td>인도자</td>
                            <td>당신은 성령 하나님을 믿습니까? </td>
                        </tr>
                        <tr class="bold">
                            <td>성  도</td>
                            <td>나는 성령을 믿으며,  
          거룩한 공교회와 성도의 교제와   
          죄를 용서받는 것과  
          몸의 부활과 영생을 믿습니다.아멘. </td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- 좌측 섹션 -->
            <div class="col-12 col-md-4">
                <div class="section">
                <h5 class="mb-4">주기도문(개역한글)</h5>
                    <div class="">
                    하늘에 계신 우리 아버지여 <br />
                    이름이 거룩히 여김을 받으시오며 <br />
                    나라이 임하옵시며 <br />
                    뜻이 하늘에서 이룬 것 같이 <br />
                    땅에서도 이루어지이다. <br />
                    <br /> 
                    오늘날 <br /> 
                    우리에게 일용할 양식을 주옵시고 <br />
                    <br />
                    우리가 우리에게 <br />
                    죄 지은 자를 사하여 준 것 같이 <br />
                    우리의 죄를 <br />
                    사하여 주옵시고 <br />
                    <br />
                    우리를 <br />
                    시험에 들게 하지 마옵시고,  <br />
                    <br />
                    다만 악에서 구하옵소서 <br />
                    <br />
                    대개  <br />
                    나라와 권세와 영광이 <br />
                    아버지께 영원히 있사옵나이다.  <br />
                    아멘<br />
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="section">
                <h5 class="mb-4">하이델베르크요리문답</h5>
                <h6>우리의 구속에 관하여 (제 2주일 3~5문)</h6>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
