<ul class="menu">
    <li>HOME
        <ul>
            <li>사원관리
                <ul>
                    <li>사원 등록</li>
                    <li>사원목록</li>
                </ul>
            </li>
            <li>하이델베르크
                <ul>
                    <li>하이델베르크 등록</li>
                </ul>
            </li>
            <li>금주의 하이델베르크
                <ul></ul>
            </li>
            <li>사진관리
                <ul>
                    <li>사진 등록</li>
                </ul>
            </li>
        </ul>
    </li>
</ul>

<style>
.menu,
.menu ul {
  list-style: none;
  padding: 0;
  margin: 0;
  position: relative;
}

.menu > li {
  position: relative;
  float: left;
  background: #3498db;
  color: #fff;
  padding: 12px 24px;
  cursor: pointer;
}

.menu > li:hover {
  background: #2980b9;
}

/* 2depth: 가로로 펼침 */
.menu > li > ul {
  display: none;
  position: absolute;
  left: 0;
  top: 100%;
  background: #2980b9;
  min-width: 160px;
  white-space: nowrap;
}

.menu > li:hover > ul {
  display: flex; /* 가로로 펼침 */
}

.menu > li > ul > li {
  position: relative;
  background: #2980b9;
  color: #fff;
  padding: 10px 20px;
  cursor: pointer;
  float: none;
}

.menu > li > ul > li:hover {
  background: #1abc9c;
}

/* 3depth: 하단 드롭다운 (세로) */
.menu > li > ul > li > ul {
  display: none;
  position: absolute;
  left: 0;
  top: 100%;
  background: #1abc9c;
  min-width: 160px;
  flex-direction: column;
}

.menu > li > ul > li:hover > ul {
  display: block;
}

.menu > li > ul > li > ul > li {
  background: #1abc9c;
  color: #fff;
  padding: 10px 20px;
}

.menu > li > ul > li > ul > li:hover {
  background: #16a085;
}

</style>
