<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * new image upload from media
     *
     * @param $file
     * @param $folder
     * @param $width
     * @param $heidth\
     * @param \Illuminate\Http\Response
     *
     */
    public function imageUpload($file,$folder,$width,$height){
        // if not have a folder create folder
        !File::exists($folder) ? File::makeDirectory($folder, 0777, true, true) : false;

        if ($file) {
            $imageEx = $file->getClientOriginalExtension();
            $imageName = uniqid(time().rand()).'.'.$imageEx;
            if ($width != null && $height != null) {
                Image::make($file)->resize($width, $height)->save($folder.$imageName);
            }
            else{
                $file->move($folder,$imageName);
            }

            return $folder.$imageName;
        }
    }


    /**
     * image delete
     *
     * @param $imagePath
     * @return \Illuminate\Http\Response
     */
    public function imagedelete($imagePath){
        if (file_exists($imagePath)) {
            return unlink($imagePath);
        }

        return false;
    }

    /**
     * view share obj
     *
     * @param $title
     */
    public function setPageTitle($title,$metaTitle = null,$metaDescription = null){
        view()->share(['title'=>$title,'metaTitle'=>$metaTitle,'metaDescription'=>$metaDescription]);
    }

}
