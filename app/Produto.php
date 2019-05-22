<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{   
    //tabelas criadas ja
    //indicar que a tabela a ser referenciada é a PRODUTOS (Produto já vai isso não colocando o s)
    protected $table = 'produtos';
    
    //não criar tabela com as colunas de datas
    public $timestamps = false;

    //massassignment erro
    //questão de seguranca como preencher uma senha no update (abre espaço para outros campos serem atualizados tambbem)
    //aqui só deixa prencher os campos[deliitar os campos que sejam atribuidos em massa]
    protected $fillable = array('nome', 'descricao', 'valor', 'quantidade', 'tamanho', 'categoria_id');

    //indicar que o produto está contido na categoria (RELACIONAMENTOS)
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }
}


