<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>소설 찾기</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/search_keyword.css">
    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="js/search_keyword.js"></script>
</head>
<body>
    <header>
        <div class="page_title">키워드 검색</div>
    </header>
    <main>
        <section class="keywords">
            <div class="keyword_list_wrap">
                <div class="keyword_list">
                    <div class="desc">장르</div>
                    <ul>
                        <li onclick="keyword_selected(this)">판타지</li>
                        <li onclick="keyword_selected(this)">현판</li>
                        <li onclick="keyword_selected(this)">무협</li>
                        <li onclick="keyword_selected(this)">로판</li>
                        <li onclick="keyword_selected(this)">로맨스</li>
                    </ul>
                </div>
            </div>
            <div class="keyword_list_wrap">
                <div class="keyword_list">
                    <div class="desc">스토리</div>
                    <ul>
                        <li onclick="keyword_selected(this)">회귀</li>
                        <li onclick="keyword_selected(this)">빙의</li>
                        <li onclick="keyword_selected(this)">환생</li>
                        <li onclick="keyword_selected(this)">레이드</li>
                        <li onclick="keyword_selected(this)">성장</li>
                        <li onclick="keyword_selected(this)">복수</li>
                        <li onclick="keyword_selected(this)">전쟁</li>
                    </ul>
                </div>
            </div>
            <div class="keyword_list_wrap">
                <div class="keyword_list">
                    <div class="desc">소재</div>
                    <ul>
                        <li onclick="keyword_selected(this)">이능력</li>
                        <li onclick="keyword_selected(this)">게임시스템</li>
                        <li onclick="keyword_selected(this)">기사</li>
                        <li onclick="keyword_selected(this)">연예계</li>
                        <li onclick="keyword_selected(this)">학원물</li>
                    </ul>
                </div>
            </div>
            <div class="keyword_list_wrap">
                <div class="keyword_list">
                    <div class="desc">분위기</div>
                    <ul>
                        <li onclick="keyword_selected(this)">유쾌함</li>
                        <li onclick="keyword_selected(this)">비장함</li>
                        <li onclick="keyword_selected(this)">잔잔함</li>
                        <li onclick="keyword_selected(this)">통쾌함</li>
                        <li onclick="keyword_selected(this)">아련함</li>
                    </ul>
                </div>
            </div>
            <div class="selected_keywords_wrap">
                <div class="selected_keywords">
                    <ul>
                    </ul>
                </div>
            </div>
        </section>
        <section class="result">
            <div class="result_info">
                <p></p>
                <select class="align">
                    <option value="최신순">최신순</option>
                    <option value="최신순">인기순</option>
                </select>
            </div>
            <div class="novels">
                <ul>
                </ul>
            </div>
        </section>
    </main>
    <?php include "inc/bnb.html" ?>
</body>
</html>