<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class BannersController extends Controller
{
    //
    public function getbanners(){

    	$banners = Banners::where('estado','=',1)->get();

    	return $banners;

    }

    public function showabanner(){

        return Banners::all();
    }

    public function store(Request $request){

        if(is_object($request->banner)){

            if($request->bannerold){
                Storage::disk('public')->delete($request->bannerold);
            }

            $banner = Storage::disk('public')->putFile('/banner', new file($request->banner));

        }else{

            if($request->bannerold){

                $banner = $request->bannerold;
            }

        }

        if(is_object($request->banner_movil)){

            if($request->banner_movilold){
                Storage::disk('public')->delete($request->banner_movilold);
            }

            $banner_movil = Storage::disk('public')->putFile('/banner', new file($request->banner_movil));

        }else{

            if($request->banner_movilold){

                $banner_movil = $request->banner_movilold;
            }

        }


        $bannernew = Banners::updateOrCreate(['id_banner' => $request->id_banner],[
            'banner' => $banner,
            'banner_movil' => $banner_movil,
            'link' => $request->link,
            'title' => $request->title,
            'alt' => $request->alt,
            'estado' => 1,
            'titulo' => $request->titulo,
            'texto' => $request->texto,
            'posicion' => $request->posicion
            ]);

        return $bannernew;

    }

    public function destroy(Banners $banner){

        Storage::disk('public')->delete($banner->banner);
        Storage::disk('public')->delete($banner->banner_movil);
        return $banner->delete();

    }

    public function actbanner($id_banner, $estado){

        return Banners::where('id_banner', $id_banner)->update([
            'estado' => $estado
        ]);

    }
}
