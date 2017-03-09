<?php

/**
*
* Pagination
*/

class Pagination {
        private $limit = 3;
        private $total;


    public function __construct( Array $images) {
        $this->total = count($images);
    }

    public function getPageData( Array $images, $page = 0 ) {
        $page;
        $offset = $page * $this->limit;
        $pageImages = array_slice($images, $offset, $this->limit);
        return $pageImages;
    }

    public function renderPagination($pageActive = 0) {
        $last = ceil( $this->total / $this->limit );
        $html = '<div class="pagination">';
        for ( $i = 0 ; $i < $last; $i++ ) {
            if ($i == $pageActive) {
                $html .= '<a class="active" href="?page='.$i.'">'.$i.'</a>';
            } else {
                $html .= '<a href="?page='.$i.'">'.$i.'</a>';
            }
        }
        $html .= '</div>';
        return $html;
    }
}

?>
