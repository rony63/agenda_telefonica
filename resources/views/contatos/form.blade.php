<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <form action="{{route('contatos.store')}}" method="post">
            @csrf
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">

            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone">

            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone">

            <label for="logradouro">Logradouro</label>
            <input type="logradouro" name="logradouro" id="logradouro">

            <label for="cidade">Cidade</label>
            <input type="cidade" name="cidade" id="cidade">

            <label for="numero">Número</label>
            <input type="text" name="numero" id="numero">

            <button type="submit">Salvar</button>
        </form>
    </body>
</html>
