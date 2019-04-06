<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

use App\ImagemImovel;

class ImageController extends Controller
{
    
    public function uploadImagemImovel($pic, $imob){
        $imagem = new ImagemImovel;
        $imagem->nm_imagem = $pic->getClientOriginalName();
        $imagem->cd_imovel = $imob->cd_imovel;
        $imagem->nm_link = $this->saveImage($pic, $imob->cd_imovel, 'lg', 800 );
        $imagem->nm_link_sm = $this->saveImage($pic, $imob->cd_imovel, 'sm', 160 );
        $imagem->nm_link_md = $this->saveImage($pic, $imob->cd_imovel, 'md', 320 );
        $imagem->save();
        return $imagem;
    }
    public function uploadAnuncianteImovel($pic, $imob){
        $imagem = new ImagemImovel;
        $imagem->nm_imagem = $pic->getClientOriginalName();
        $imagem->nm_link = $this->saveImage($pic, $imob->cd_imovel, 'lg', 800 );
        $imagem->nm_link_sm = $this->saveImage($pic, $imob->cd_imovel, 'sm', 160 );
        $imagem->nm_link_md = $this->saveImage($pic, $imob->cd_imovel, 'md', 320 );
        $imagem->save();
        return $imagem;
    }
    
    public function removeImagem($cd_imagem){
        return ImagemImovel::where('cd_imagem',$cd_imagem)->delete();
    }
    
    public function saveImage($image, $id, $type, $size)  {
        if (!is_null($image))
        {
            $file = $image;
            $extension = $image->getClientOriginalExtension();
            $fileName = time() . random_int(100, 999) .'.' . $extension; 
            $destinationPath = public_path('images/'.$type.'/'.$id.'/');
            $url = '/images/'.$type.'/'.$id.'/'.$fileName;
            $fullPath = $destinationPath.$fileName;
            if (!file_exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775);
            }
            $image = Image::make($file)
                ->resize($size, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('jpg');
            $image->save($fullPath, 100);
            return $fileName;
        } else {
            return 'default.jpg';
        }
    }
    
}
