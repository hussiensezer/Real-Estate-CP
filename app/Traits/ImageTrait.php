<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait ImageTrait
{
    /**
     * Store Image And In Update Can Delete The Old One
     * @param  $photo -> Accept Request Of File
     * @param  $storageName -> the file in config -> file
     * @param  $fileName -> the file will stored in
     * @param  $deleteImageSource -> in update u have to delete old one and replace the new one
     * @return string
     */
  public function imageStore ($photo,$storageName,$fileName,$deleteImageSource = "") {

      $input_file =  $photo->getClientOriginalName();
      $file_Extensions =  $photo->getClientOriginalExtension();
        if(!empty($deleteImageSource)){
            Storage::disk($storageName)->delete($fileName . '/' . $deleteImageSource);
        }
        //End If
      $hashPath = md5($input_file .  now()) . "." . $file_Extensions ;
      $dataPath = Storage::disk($storageName)->putFileAs($fileName, $photo, $hashPath);
      return $hashPath;
  }// End ImageStore

    public function imageDestroy($storageName,$fileName,$deleteImageSource) {
      return  Storage::disk($storageName)->delete($fileName . '/' . $deleteImageSource);
    }

}
