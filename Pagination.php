<?php

/**
*
* Pagination class
*
*/

class Pagination {
    private $limit;
    private $total;
    public $last;

    public function __construct( Array $images) {
        $this->total = count($images);
    }

    /**
     *
     * Filter data paginated
     *
     * @param    array $imagesList to render
     * @param    integer $page, number
     * @return    Array $pageImages, list images to display
     *
     */
    public function getPageData( Array $images, $limit, $page = 1) {
        $this->limit = $limit;
        $this->last = ceil( $this->total / $limit );
        $page = $page-1; // for human read
        $offset = $page * $limit;
        $pageImages = array_slice($images, $offset, $limit);
        return $pageImages;
    }

    /**
     *
     * Render pagination html
     *
     * @param    integer $pageActive, number
     * @return    Array $pageImages, list images to display
     *
     */
    public function renderPaginationHtml($pageActive = 1) {
        $html = '<div class="pagination">';
        for ( $i = 1 ; $i <= $this->last; $i++ ) {
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
