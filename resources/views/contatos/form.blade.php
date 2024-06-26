<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        @isset($contato)
            <form action="{{route('contatos.update', $contato->id)}}" method="POST">
            @method("PUT")
        @else
            <form action="{{route('contatos.store')}}" method="post">
        @endisset
            {{-- {{dd($contato->telefone)}} --}}
            @csrf
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="{{isset($contato) ? $contato->nome : null}}" {{isset($form) ? $form : null}}>
            @for ($i = 0; $i < 2; $i++)
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone[]" id="telefone" value="{{isset($contato) && isset($contato->telefone[$i]) ? $contato->telefone[$i]->numero : null}}" {{isset($form) ? $form : null}}>
                <select name="tipoTelefone[]" {{isset($form) ? $form : null}}>
                    @foreach ($tipoTelefones as $key => $tipoTelefone)
                    <option value={{$key}} {{isset($contato) && isset($contato->telefone[$i]) &&  $contato->telefone[$i]->tipo == $key ? 'selected' : null }}>{{$tipoTelefone}}</option>
                    @endforeach
                </select>
            @endfor

            <label for="logradouro">Logradouro</label>
            <input type="logradouro" name="logradouro" id="logradouro" value="{{isset($contato) && isset($contato->endereco->logradouro) ? $contato->endereco->logradouro : null}}" {{isset($form) ? $form : null}}>

            <label for="cidade">Cidade</label>
            <input type="cidade" name="cidade" id="cidade" value="{{isset($contato) && isset($contato->endereco->cidade) ? $contato->endereco->cidade : null}}" {{isset($form) ? $form : null}}>

            <label for="numero">Número</label>
            <input type="text" name="numero" id="numero" value="{{isset($contato) && isset($contato->endereco->numero) ? $contato->endereco->numero : null}}" {{isset($form) ? $form : null}}>
            {{-- {{dd($contato->categoria->contains(2))}} --}}
            <p>Categoria</p>
            @foreach ( $categorias as $key => $categoria )
                <label>{{$categoria}}
                    <input type="checkbox" value="{{$key}}" name="categoria[]" {{isset($contato) && $contato->categoria->contains($key) ? 'checked' : null}} {{isset($form) ? $form : null}}>
                    <span class="checkmark"></span>
                </label>
            @endforeach

            @if(empty($form))
                <button type="submit">Salvar</button>
            @endif
        </form>
    </body>
</html>
