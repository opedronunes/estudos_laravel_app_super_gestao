TRABALHANDO COM FORMULÁRIOS

Request:
    Para trabalharmos com os envios de dados através de formulários, podemos simplesmente colocar no controlador
responsável pela rota o parâmetro $request.
    Podemos recuperar os dados da request com o método all(), ou recuperando cada valor específico com o método input().
Exemplo:
```
echo '<pre>';
print_r($request->all());
echo '</pre>';

echo $request->input('nome');
echo '<br>';
echo $request->input('email');
```

Salvar dados no bando de dados:<br>
    Para inserir de fato os dados no banco existem algumas maneiras, mas que tem mesmo objetivo. 
- Primeira alternativa:<br>
    Através do método request atribuimos os valores à variável a cada input individualmente.
    ```
    $contato = new SiteContato();

    $contato->nome = $request->input('nome');
    $contato->telefone = $request->input('telefone');
    $contato->email = $request->input('email');
    $contato->motivo_contato = $request->input('motivo_contato');
    $contato->mensagem = $request->input('mensagem');

    $contato->save();
    ```
- Segunda alternativa:<br>
    Através do método fill(), preenchendo os atributos com base em um array associativo com o request->all().
    ```
    $contato = new SiteContato();
    $contato->fill($request->all());
    $contato->save();
    ```
- Terceira alternativa:<br>
    Ao invés do método fill, usamos o método create(), que cria um objeto com base na request.
    ```
    $contato = new SiteContato();
    $contato->create($request->all());
    ```
Validação de campos obrigatórios: <br>
    No Laravel ja temos uma variável de error embutida nas views que será afetada através dos controladores
para validação de formulários.
    basta chamar um método chamado validate(), ele espera uma variável do tipo associativo, ou seja inserir como parâmetros os 
campos que são obrigatórios e precisam ser tratados, portanto a chave deste array é o nome do input.
```
//Validação de dados antes da inserção de dados.
$request->validate([
    'nome' => 'required',
    'telefone' => 'required',
    'email' => 'required',
    'motivo_contato' => 'required'
]);
```

Validação de dados com MAX e MIN: <br>
- MIN:
    Consiste em exigir no mínimo uma quantidade x de caracteres. Colocando esta regra no métdo validate() pode fazer
    parte de um conjunto de regras para validação, basta utilizar o pipe '|' para separar os métodos de validação.
- MAX:
    Consiste em exigir uma quatidade máxima de caracteres.
```
$request->validate([
    'nome' => 'required|min:3|max:40',
    'telefone' => 'required',
    'email' => 'required',
    'motivo_contato' => 'required|max:2000'

]);
```
Repopular o formulário:<br>
    Consiste em manter os inputs corretos preenchidos no form depois de um erro. O próprio Blade do Laravel tem um recurso
chamado old() que recebe como parâmetro os inputs, basta colocar este método na view na chamada value do input.
```
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input type="text" value="{{ old('nome') }}" placeholder="Nome" class="{{ $classe }}" name="nome">
    <br>
    <input type="text" value="{{ old('telefone') }}" placeholder="Telefone" class="{{ $classe }}" name="telefone">
    <br>
    <input type="text" value="{{ old('email') }}" placeholder="E-mail" class="{{ $classe }}" name="email">
    <br>
    <select class="{{ $classe }}" name="motivo_contato">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $item => $motivo_contato)
            <option value="{{$item}}" {{ old('motivo_contato') == $item ? 'selected' : '' }}>{{$motivo_contato}}</option>
        @endforeach
    </select>
    <br>
    <textarea class="{{ $classe }}" name="mensagem">{{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>
```
