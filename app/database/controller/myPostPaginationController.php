<?php
    // Pagination Code

    function pagination($currentPage= 1, $recordsPerPage=5){

        //find the total number of results stored in the database  
  
        $results = selectAll('posts');  
  
        $number_of_result = count($results);  
        //determine the total number of pages available  
        $numberOfPages = ceil ($number_of_result / $recordsPerPage);  
        //determine which page number visitor is currently on  
        
    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($currentPage-1) * $recordsPerPage;  
  
    //retrieve the selected results from database  
    $result = limit('posts', $page_first_result, $recordsPerPage, ['user_id'=> $_SESSION['id']]);
    return [
        'result' => $result,
        'numofpages' => $numberOfPages,
        'prevPage' => $currentPage > 1 ? $currentPage - 1 : false,
        'nextPage' => $currentPage + 1 <= $numberOfPages ? $currentPage + 1 : false
    ];
    } 
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $pageData = pagination($currentPage);
    $pageNumbers = getPaginationNumbers($currentPage, $pageData['numofpages']);
  
    function getPaginationNumbers($currentPage, $totalNumberOfPages) { 
        $current = $currentPage; 
        $last = $totalNumberOfPages; 
        $delta = 2; 
        $left = $current - $delta; 
        $right = $current + $delta + 1; 
        $range = array(); 
        $rangeWithDots = array(); 
        $l = -1; 
        for ($i = 1; $i <= $last; $i++) { 
            if ($i == 1 || $i == $last || $i >= $left && $i < $right) { 
                array_push($range, $i); 
            } 
        } 
        for($i = 0; $i<count($range); $i++) { 
            if ($l != -1) { 
                if ($range[$i] - $l === 2) { 
                    array_push($rangeWithDots, $l + 1); 
                } else if ($range[$i] - $l !== 1) { 
                    array_push($rangeWithDots, '...'); 
                } 
            } 
            array_push($rangeWithDots, $range[$i]); 
            $l = $range[$i]; 
        } 
        return $rangeWithDots; 
    }
?>