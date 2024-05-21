<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = 'contatos';
    protected $hidden = [
        'categoriaRelationship',
        'enderecoRelationship',
        'telefoneRelationship',
        'created_at',
        'updated_at'
    ];


    protected $appends = [
        'categoria',
        'endereco',
        'telefone'
    ];

    public function getEnderecoAttribute()
    {
        return $this->enderecoRelationship;
    }

    public function getTelefoneAttribute()
    {
        return $this->telefoneRelationship;
    }

    public function getCategoriaAttribute()
    {
        return $this->categoriaRelationship;
    }

    public function setCategoriaAttribute($value)
    {
        $this->categoriaRelationship()->sync($value);
    }

    public function setEnderecoAttribute($value)
    {
        if(isset($value))
        {
            $this->atributes['endereco_id'] = Endereco::where('id', $value)->first()->id;
        }
    }

    public function setTelefoneAttrubute($value)
    {
        if(isset($value))
        {
            $this->atributes['contato_id'] = Endereco::where('id', $value)->first()->id;
        }
    }
    /**
     * Ele retorna o relacionamento com a tabela de endereços
     * @return Endereco
     */
    public function enderecoRelationship()
    {
        return $this->belongsTo(Endereco::class, 'contato_id');
    }
    /**
     * Ele retorna o relacionamento com a tabela de telefones
     * @return Telefone
     */
    public function telefoneRelationship()
    {
        return $this->hasMany(Telefone::class, 'contato_id');
    }
    /**
     * Ele retorna o relacionamento de muitos para muitos da model contato com model categoria.
     * @return Categoria
     */
    public function categoriaRelationship()
    {
        return $this->belongsToMany(Categoria::class, 'contato_has_categoria' , 'categoria_id', 'contato_id');
    }
    /**
     *
     */
}

