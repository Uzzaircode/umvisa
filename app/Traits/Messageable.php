<?php 

namespace App\Traits;

trait Messageable{


    public function message($name, $email){
        return Mail::send($email);
    }
}