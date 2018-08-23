<?php 

namespace App\Traits;

use Illuminate\Http\Request;

trait Crudable
{
    public function keep($request, string $model,array $requestException = null)
    {
        if($requestException != null){
            return $model::create($request->except($requestException));
        }else{
            return $model::create($request->all()); 
        }
    }

    public function amend($request, $model, int $id)
    {
        return $model::find($id)->update($request->all());
    }

    public function eliminate($request,$model, $id){
        $model::find($id)->delete();
    }

    public function ifExceptionExist($except){
        return $except != null;
    }

    // public function check($request, string $name, int $id, int $age = 50){

    // }
}
