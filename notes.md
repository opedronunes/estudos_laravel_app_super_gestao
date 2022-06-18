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