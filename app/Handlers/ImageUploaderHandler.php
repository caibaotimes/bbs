<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/6
 * Time: 11:06
 */

namespace App\Handlers;
use Image;

class ImageUploaderHandler
{
    protected $allowed_ext = ['jpeg','jpg','png','gif'];
    public function save($file,$folder,$file_prefix,$max_width=false)
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
        //如果限制了图片宽度，就进行裁剪
        if($max_width && $extension != 'gif'){
            //裁切图片
            $this->reduceSize($upload_path.'/'.$filename,$max_width);
        }

        return [
            'path'=>config('app_url')."/$folder_name/$filename"
        ];
    }
    
    public function reduceSize($file_path,$max_width)
    {
        //先实例化，传参为文件的磁盘物理路径
        $image = Image::make($file_path);
        //进行大小调整的操作
        $image->resize($max_width,null,function ($constraint){
            //设定宽度是$max_width,高度等比缩放
            $constraint->aspectRatio();
            //防止裁图时图片尺寸变大
            $constraint->upsize();
        });
        //对图片修改后进行保存
        $image->save();
    }
}
























