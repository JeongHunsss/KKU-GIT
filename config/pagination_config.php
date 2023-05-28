<?php
        // 페이지네이션 변수
        $resultsPerPage = 10; // 페이지당 표시할 결과 수
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 현재 페이지 번호
        $startIndex = ($currentPage - 1) * $resultsPerPage; // 시작 인덱스
?>