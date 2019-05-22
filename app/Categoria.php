<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //indicar que a categoria tem muitos produtos (RELACIONAMENTO)
    public function categoria(){
        return $this->hasMany('App\Produto');
    }
}
