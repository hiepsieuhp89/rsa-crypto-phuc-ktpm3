<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;

class RsaSet extends Model
{
    use HasFactory;

    function __construct($input){

        //key set

    	$this->n = isset(json_decode(base64_decode($input['private_key'], true))->n) ? json_decode(base64_decode($input['private_key'], true))->n : '';

    	$this->e =isset(json_decode(base64_decode($input['public_key'], true))->e)? json_decode(base64_decode($input['public_key'], true))->e : '';

        $this->d = isset(json_decode(base64_decode($input['private_key'], true))->d)? json_decode(base64_decode($input['private_key'], true))->d : '';

        $this->private_key = $input['private_key'];
        $this->public_key = $input['public_key'];

        //encrypt and send

        $this->encrypt_doc = $input['encrypt_doc'];

        $this->encrypt_encrypted_doc = $input['encrypt_encrypted_doc']; // ban ma hoa gui di

        $this->decrypt_encrypted_doc = $input['decrypt_encrypted_doc']; // ban ma hoa nhan duoc

        $this->decrypt_decrypted_doc= $input['decrypt_decrypted_doc']; // ban giai ma duoc tu ban ma hoa nhan duoc

    }
    public function kiemtrasonguyento($so){

    	$kiemtra = true;

    	if ($so == 2 || $so == 3){

            return $kiemtra;
        }
        else{
            if ($so == 1 || $so % 2 == 0 || $so % 3 == 0){

                $kiemtra = false;
            }
            else{

                for ($i = 5; $i <= sqrt($so); $i = $i + 6)

                    if ($so % $i == 0 || $so % ($i + 2) == 0){

                        $kiemtra = false;

                        break;
                    }
            }
        }
        return $kiemtra;
    }
    public function nguyentocungnhau($so1, $so2)
        {

            while ($so2 != 0)
            {
                $temp = $so1 % $so2;
                $so1 = $so2;
                $so2 = $temp;
            }

            if ($so1 == 1) 
            	$ktx_ = true;
            else 
            	$ktx_ = false;

            return $ktx_;
        }

    public function RSA_mod ($mx,$ex,$nx){
        if(!is_numeric($mx) || !is_numeric($ex) || !is_numeric($nx)){
                            throw new Exception('Số sai');
                        }
            //bình phương và nhân
            //Chuyển e sang hệ nhị phân
                $a = [];
                $k = 0;
                do{
                    $a[$k] = $ex % 2;
                    $k++;
                    $ex = $ex / 2;
                }while ($ex != 0);
                //Quá trình lấy dư

                $kq = 1;
                for ($i = $k - 1; $i >= 0; $i--){

                    $kq = ($kq * $kq) % $nx;
                    if ($a[$i] == 1){
                        $kq = ($kq * $mx) % $nx;
                    }

                }
                return $kq;
            
    }

    public function taokhoa()
        {
            //Tinh n=p*q
            $this->n = $this->p * $this->q;

            //Tính Phi(n)=(p-1)*(q-1)
            $this->eule = ($this->p - 1) * ($this->q - 1);

            //Tính e là một số ngẫu nhiên có giá trị 0< e <phi(n) và là số nguyên tố cùng nhau với Phi(n)
            do{

                $this->e = rand(2, $this->eule);

            } while (!$this->nguyentocungnhau($this->e, $this->eule));

            //Tính d = 1 mod eule
            $this->d = 0;
            $i = 2;
            while (((1 + $i * $this->eule) % $this->e) != 0 || $this->d <= 0)
            {
                $i++;
                $this->d = (1 + $i * $this->eule) / $this->e;
            }
            $this->private_key = [
                'd' => $this->d,
                'n' => $this->n,
            ];
            $this->public_key = [
                'e' => $this->e,
                'n' => $this->n,
            ];
            $this->private_key = base64_encode(json_encode($this->private_key));
            $this->public_key = base64_encode(json_encode($this->public_key));
        }   

    public function khoitao(){

    	do{

    		$this->p = rand(7, 101);
    		
			$this->q = rand(7, 101);

    	}while($this->p == $this->q || !$this->kiemtrasonguyento($this->p) || !$this->kiemtrasonguyento($this->q));

    	$this->taokhoa();
    }

    public function mahoa()
        {
            try{
                if ($this->d == NULL || $this->d == "")

                    return false; // chua nhap khoa

                else
                {
                        $base64 = $this->encrypt_doc;

                        $mh_temp2 = [];

                        for ($i = 0; $i < strlen($base64); $i++)
                        {
                            $mh_temp2[$i] = ord($base64[$i]); //return integer
                        }

                        

                        $mh_temp3 = [];

                        for ($i = 0; $i < count($mh_temp2); $i++)
                        {

                            $mh_temp3[$i] = $this->RSA_mod($mh_temp2[$i], $this->e, $this->n); // mã hóa
                            if($mh_temp3[$i] < 0) return false;
                        }
                        //dd($mh_temp3);

                        $data = implode(',',$mh_temp3);

                        $this->encrypt_encrypted_doc = base64_encode($data);
                }
                return true;


            }catch(Exception $e){

                return false;
            }
    }
    public function check()
        {
            try{

                if ($this->d == NULL || $this->d == "")

                    return false; // chua nhap khoa

                else{

                    $giaima = base64_decode($this->decrypt_encrypted_doc);

                    $b = explode(',',$giaima);           

                    $c = [];

                    for ($i = 0; $i < count($b); $i++)
                    {
                        $c[$i] = $this->RSA_mod($b[$i], $this->d, $this->n);

                        if($c[$i] < 0) {
                            $this->decrypt_decrypted_doc = "";
                            return false;

                        }
                    }

                    $str = "";

                    for ($i = 0; $i < count($c); $i++)

                    {
                        $str .= chr($c[$i]);
                    }
                

                    $this->decrypt_decrypted_doc = $str;

                    return true;
                }
            }catch(Exception $e){

                $this->decrypt_decrypted_doc = "";
                return false;

            }
        }
}
