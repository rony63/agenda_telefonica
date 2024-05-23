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
            <select>
                <option value="1">Celular</option>
                <option value="2">Fixo</option>
            </select>

            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone">
            <select>
                <option value="1">Celular</option>
                <option value="2">Fixo</option>
            </select>

            <label for="logradouro">Logradouro</label>
            <input type="logradouro" name="logradouro" id="logradouro">

            <label for="cidade">Cidade</label>
            <input type="cidade" name="cidade" id="cidade">

            <label for="numero">Número</label>
            <input type="text" name="numero" id="numero">

            <p>Grau de parentesco</p>
            <label>Pais
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
            <label>Irmão(ã)
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
            <label>Primo(a)
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
            <label>Tio(a)
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
            <label>Avô(ó)
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
            <label>Amigo(a)
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
            <label>Outro
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
            
            <button type="submit">Salvar</button>
        </form>
    </body>
</html>
