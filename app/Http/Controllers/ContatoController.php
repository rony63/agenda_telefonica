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
        $this->tipoTelefones = [1 => 'fixo', 2 => 'celular'];
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
        $categorias = $this->categorias;
        $tipoTelefones = $this->tipoTelefones;

        return view('contatos.form', compact('categorias', 'tipoTelefones'));

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
        // dd($request->all());
        $contato = $this->contatos->create([
            'nome' => $request->nome,

        ]);

        $this->enderecos->create([
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'cidade' => $request->cidade,
            'contato_id' => $contato->id
        ]);

        // dd($request);

        $contato->categoriaRelationship()->attach($request->categoria);

        for ($i = 0; $i < count($request->telefone); $i++)
        {
            $this->telefones->create([
                'numero' => $request->telefone[$i],
                'contato_id' => $contato->id,
                'tipo' => $request->tipoTelefone[$i],
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
        $tipoTelefones = $this->tipoTelefones;

        return view('contatos.form', compact('contato', 'categorias', 'tipoTelefones','form'));
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
        $contato = $this->contatos->find($id);
        $categorias = $this->categorias;
        $tipoTelefones = $this->tipoTelefones;
        return view('contatos.form', compact('contato', 'categorias', 'telefones', 'tipoTelefones'));

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
        $contato = $this->contatos->find($id);
        $endereco = $contato->endereco;

        $endereco->update([
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'cidade' => $request->cidade,

            'contato_id' => tap($contato)->update([
                'nome' => $request->nome,
            ])->id,
        ]);

        $contato->categoriaRelationship()->sync($request->categoria);

        for ($i = 0; $i < count($request->numero); $i++)
        {
            $contato->telefones->get($i)->update([
                'numero' => $request->numero[$i],
                'contato_id' => $contato->id,
                'tipo' => $request->tipo[$i]
            ]);
        }

        return redirect()->route('contatos.show', $contato->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contato = $this->contatos->find($id);
        $contato->endereco->delete();
        $contato->telefoneRelationship()->delete();
        $contato->categoriaRelationship()->detach();
        $contato->delete();
        return redirect()->route('contatos.index');
    }
}
