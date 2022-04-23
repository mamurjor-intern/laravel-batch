<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Image;

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
        if ($file) {
            $imageEx = $file->getClientOriginalExtension();
            $imageName = uniqid(time().rand()).'.'.$imageEx;
            $file->move($folder,$imageName);

            if ($width != null && $height != null) {
                Image::make($file)->resize($width, $height)->save($folder.$imageName);
            }
            else{
                $file->move($folder,$imageName);
            }

            return $imageName;
        }
    }

    /**
     * view share obj
     * 
     * @param $title
     */
    public function setPageTitle($title){
        view()->share(['title'=>$title]);
    }
    
}
