<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/6
 * Time: 11:06
 */

namespace App\Handlers;


class ImageUploaderHandler
{
    protected $allowed_ext = ['jpeg','bmp','png','gif'];
    public function save($file,$folder,$file_prefix,$width=false)
    {
        //定义保存图片的文件夹路径
        $folder_name = "uploads/images/$folder/".date("Y/md",time());
        //定义上传的物理路径
        $upload_path = public_path()."/".$folder_name;
        //粘贴时，图片一般不带后缀名
        $extension = strtolower($file->getClientOriginalExtension()) ?:'png';
        //定义文件名字
        $filename = $file_prefix."_".time()."_".str_random(10)."_".".".$extension;
        //如果上传的不是图片将终止操作
        if(!in_array($extension,$this->allowed_ext)){
            return false;
        }
        //将图片移动到我们的目标存储路径中
        $file->move($upload_path,$filename);

        return [
            'path'=>config('app_url')."/$folder_name/$filename"
        ];
    }
}
























