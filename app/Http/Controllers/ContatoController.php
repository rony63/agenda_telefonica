<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Contato;
use App\Models\Endereco;
use App\Models\Telefone;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    /**
     * Instantiate a new controller instance.
     * @param \App\Models\Contato $contatos
     * @return void
     *
    */
    public function __construct(Contato $contatos)
    {
        $this->tipoTelefones = ['fixo', 'celular'];
        $this->contatos = $contatos;
        $this->enderecos = new Endereco;
        $this->categorias = Categoria::all()->pluck('nome', 'id');
        $this->telefones = new Telefone;


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contatos = $this->contatos->all();

        return view('contatos.index', compact('contatos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $contato = $this->contatos;
        $categorias = $this->categorias;
        $enderecos = $this->enderecos;
        $telefones = $this->telefones;

        return view('contatos.form', compact('categorias', 'enderecos', 'telefones'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $contato = $this->contatos->create([
            'nome' => $request->nome,

        ]);

        $this->enderecos->create([
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'cidade' => $request->cidade,
            'contato_id' => $contato->id
        ]);

        $contato->categoriaRelationship()->attach($request->categoria);

        for ($i = 0; $i < count($request->numero); $i++)
        {
            $this->telefones->create([
                'numero' => $request->numero[$i],
                'contato_id' => $contato->id,
                'tipo' => $request->tipo[$i]
            ]);
        }

        return redirect()->route('contatos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $form = 'disabled';

        $contato = $this->contatos->find($id);
        $categorias = $this->categorias;
        $telefones = $this->telefones;
        $tipoTelefone = $this->tipoTelefones;

        return view('contatos.form', compact('contato', 'categorias', 'telefones', 'tipoTelefone','form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        //
    }
}
