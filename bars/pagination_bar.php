<div class="pagination">
    <?php
        $totalPages = ceil($totalCount / $resultsPerPage); // 전체 페이지 수 계산
        $numLinks = 5; // 한 그룹당 표시할 페이지 링크 개수

        if ($totalPages > 1) {
            $currentGroup = ceil($currentPage / $numLinks); // 현재 페이지가 속한 그룹 번호 계산
            $startPage = ($currentGroup - 1) * $numLinks + 1; // 현재 그룹의 시작 페이지 번호
            $endPage = min($startPage + $numLinks - 1, $totalPages); // 현재 그룹의 마지막 페이지 번호

            if ($currentPage > 1) {
                echo "<a href='?page=1'>&laquo; 처음</a>"; // 첫 페이지 링크
                echo "<a href='?page=" . ($currentPage - 1) . "'>&lsaquo; 이전</a>"; // 이전 페이지 링크
            }

            // 페이지 링크 출력
            for ($i = $startPage; $i <= $endPage; $i++) {
                echo "<a href='?page=" . $i . "'" . ($currentPage == $i ? "class='active'" : "") . ">" . $i . "</a>"; // 페이지 번호 링크
            }

            if ($currentPage < $totalPages) {
                echo "<a href='?page=" . ($currentPage + 1) . "'>다음 &rsaquo;</a>"; // 다음 페이지 링크
                echo "<a href='?page=" . $totalPages . "'>마지막 &raquo;</a>"; // 마지막 페이지 링크
            }

        }
    echo '</div>';
    echo "<span class='current-pagination'>현재 페이지: " . $currentPage . "</span>"; // 현재 페이지 표시
    ?>