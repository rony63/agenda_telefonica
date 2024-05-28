<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div>
            <h1>Contatos</h1>
            <h1 class="text-3xl font-bold underline">
                Hello world!
              </h1>
                <table >
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Logradouro</th>
                            <th>Cidade</th>
                            <th>Número</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    {{-- {{dd($contatos[3]->endereco->logradouro)}} --}}
                @foreach ( $contatos as $contato)
                    <tr>
                        <td>{{$contato->nome}}</td>
                        <td>
                            @foreach ( $contato->telefone as $telefone)
                                {{$telefone->numero}}
                                {{$telefone->tipo}}
                            @endforeach
                        </td>

                        <td>{{$contato->endereco->logradouro}}</td>
                        <td>{{$contato->endereco->cidade}}</td>
                        <td>{{$contato->endereco->numero}}</td>
                        <td>
                            @foreach ( $contato->categoria as $categoria )
                                {{$categoria->nome}}
                            @endforeach
                        </td>
                        <td><a href="{{route('contatos.show', $contato->id)}}">Visualizar</a></td>
                        <td>
                            <form action="/destroy/{{ $contato->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Deletar</button>
                            </form>
                        </td>

                        <td><a href="{{route('contatos.edit', $contato->id)}}">Editar</a></td>

                    </tr>
                @endforeach

            </table>
        </div>
        <button><a href="{{route('contatos.create')}}">Novo</a></button>
    </body>
</html>
