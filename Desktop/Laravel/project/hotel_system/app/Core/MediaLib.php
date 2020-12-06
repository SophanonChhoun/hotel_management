<?php

namespace App\Core;
use App\Models\admin\Media;
use App\Models\admin\MediaFile;
use File;
use Intervention\Image\ImageManagerStatic as Image;
use DB;

class MediaLib
{

    // Generate image with quality
    public static function generateImage($img){
        $files = [];
        $media_id = null;
        try{
            $image_size = config('mediacon.default');
            foreach ($image_size as $size) {
                $path = public_path('uploads/'. $size['size']);
                $filename  = md5(microtime()) . '.' . $img->getClientOriginalExtension();
                if(!File::exists($path)) {
                    File::makeDirectory($path);
                }
                $path = $path .'/' . $filename;

                Image::make($img->getRealPath())->save($path, $size['value']);
                $files[] = [
                    'size' 		=> $size['size'],
                    'url'		=> 'uploads/'. $size['size'].'/' . $filename,
                    'file_name'	=> $filename
                ];
            }
            if(count($files) > 0){
                $media = Media::create([
                    'media_type'      => 'image'
                ]);
                $media_id = $media['id'];
                foreach($files as $file){
                    MediaFile::create([
                        'media_id' 	=> $media['id'],
                        'file_url'	=> $file['url'],
                        'file_name'	=> $file['file_name'],
                        'size'		=> $file['size']
                    ]);
                }
            }

            return $media_id;

        }catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public static function generateImageBase64($data, $type = 'png'){
        $files = [];
        $media_id = null;
        try{
            $filename  = md5(microtime()) . '.' . $type;
            $temp = public_path('uploads/images/');
            if($type == 'svg'){
                file_put_contents($temp. $filename,base64_decode(str_replace('data:image/svg+xml;base64,','' , $data)));
            } else {
                file_put_contents($temp. $filename, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data)));
            }
            $media = Media::create([
                'media_type'      => 'image'
            ]);
            $media_id = $media['id'];
            MediaFile::create([
                'media_id' 	=> $media['id'],
                'file_url'	=> '/uploads/images/'. $filename,
                'file_name'	=> $filename,
                'size'		=> 'Original'
            ]);

            return $media_id;
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public static function resizeImage($file_name, $width, $heigh, $quality=50){
        try{
            if(!file_exists(public_path() . '/uploads/original/' . $file_name)){
                return null;
            }
            return Image::make(public_path() . '/uploads/original/' . $file_name)->resize($width, $heigh, function($constraint) {
                $constraint->aspectRatio();
            })->response('png', (int)$quality );
        }catch(Exception $e) {
            return null;
        }
    }

    public static function qualityImage($file_name, $quality){
        try{
            if(!file_exsiting(public_path() . '/uploads/original/' . $file_name)){
                return null;
            }
            return Image::make(public_path() . '/uploads/original/' . $file_name)->response('jpg', (int)$quality );
        }catch(Exception $e) {
            return null;
        }
    }

    public static function generateFileBase64($data, $ext, $name, $file_type = 'file')
    {
        $name = isset($name)? $name : DateLib::getNow()->timestamp;
        $media_id = null;
        try {
            $filename = md5(microtime()).'-'.$name . '.' . $ext;
            $temp = public_path('/uploads/original/');

            file_put_contents($temp.$filename, base64_decode(preg_replace('#^data:\w+/\w+;base64,#i', '', $data)));

            $media = Media::create(
                [
                    'media_type' => $file_type,
                ]
            );
            $media_id = $media['id'];

            MediaFile::create(
                [
                    'media_id' => $media['id'],
                    'file_url' => '/uploads/original/'.$filename,
                    'file_name' => $name,
                    'file_type' => $file_type,
                    'width' => 0,
                    'height' => 0,
                    'size' => 'original',
                ]
            );

            return $media_id;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function generateImageFromBinary($data, $type = 'png'){
        $files = [];
        $media_id = null;
        try{
            $filename  = md5(microtime()) . '.' . $type;
            $temp = public_path('uploads/images/');

            file_put_contents($temp. $filename, $data);

            $media = Media::create([
                'media_type'      => 'image'
            ]);
            $media_id = $media['id'];
            MediaFile::create([
                'media_id' 	=> $media['id'],
                'file_url'	=> '/uploads/images/'. $filename,
                'file_name'	=> $filename,
                'size'		=> 'Original'
            ]);

            return $media_id;
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
