<?php

/**
 * Status resource
 *
 * @param $status
 * @return Response
 */
function status($status){
    if ($status == 1) {
        $statusText = '<span class="badge badge-sm bg-success">Approved</span>';
    }
    else{
        $statusText = '<span class="badge badge-sm bg-danger">Pending</span>';
    }

    return $statusText;
}


/**
 * Status resource
 *
 * @param $status
 * @return Response
 */
function imageShow($imagePath){
    if (file_exists($imagePath)) {
        $image = '<img src="'.$imagePath.'" width="100" height="100" alt="thumbnail">';
    }
    else{
        $image = '<img src="" width="100" height="100" alt="thumbnail">';
    }

    return $image;
}



