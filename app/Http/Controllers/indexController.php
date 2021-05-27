<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RsaSet;

class indexController extends Controller
{

    public function generateKey(Request $req){

    	$rsa = new RsaSet($req->all());

    	$rsa->khoitao();

    	return response(["error"=>0,"message" => "Tạo khóa thành công","data" => $rsa->toArray()]);
    }

    public function encrypt(Request $req){

    	$rsa = new RsaSet($req->all());

        $re = $rsa->mahoa();
    	if($re)

		  return response(["error"=>0,"message" => "Mã hóa thành công","data" => $rsa->toArray()]);

	    return response(["error"=>1,"message" => "Mã hóa thất bại","data" => $rsa->toArray()]);

    }

    public function check(Request $req){

    	$rsa = new RsaSet($req->all());

    	if($rsa->check())

    		return response(["error"=>0,"message"=>"Giải mã thành công","data" => $rsa->toArray()]);

    	return response(["error"=>1,"message" => "Giải mã thất bại","data" => $rsa->toArray()]);
    }

    public function index(Request $req){

    	return view('welcome');
    }
}
