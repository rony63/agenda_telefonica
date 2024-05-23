<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <table>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Logradouro</th>
                <th>Cidade</th>
                <th>Número</th>
                <th>Categoria</th>
            </tr>
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

                </tr>
            @endforeach

        </table>
    </body>
</html>
