## ESTUDOS -  FRAMEWORK LARAVEL

<h3>Abaixo segue anotações para fixação de conteúdo durante os estudos</h3><br>

Comando Artisan: 
- php artisan lista : lista todos os comandos
- php artisan make:controller + nome do controlador (no caso: PrinciapalControler)

<hr>

Existem duas técnicas de criação de uma aplicação Web: a tradicional que é criado as views no servidor do backend. Esta ainda é uma técnica bastante utilizada por conta de muitas aplicações legadas exigirem manutenção em seus sistemas criados nesse modelo.
Já o modelo Moderno de criação é baseado na separação da aplicação frontend da aplicação backend, exigindo um conhecimento mais apurado do desenvedor para conectar estes dois lados através de uma API.

<hr>

VIEWS:

Para renderizar uma view, basta colocar no return do controller uma funcção chamada view(), o próprio laravel entende que dentro das views basta colocar no nome da pasta seguido de um ponto ’ . ’ junto ao nome do arquivo da view.

<hr>

PARÂMETROS NA ROTA:

Estes parâmetros passado para a rota diferencia das outras que não espera nenhum parâmetro. São enviadas dentro de chaves {}. Para deixar o parâmetro opcional basta colocar um ? Depois do parâmetro. Sendo que temos uma limitação, devemos passar a opção da direita para esquerda. 

<hr>

EXPRESSÃO REGULAR:

São condições pré estabelecidas para definir um tipo de dado a ser inserido como parâmetro, por exemplo, definir a entrada apenas de inteiros, ou definir formato de string. Para definir uma expressão regular, deve chamar o método →where(‘’ , ‘’) com dois parâmetros dentro dele, o primeiro é o parâmetro definido na chave da rota e o outro é a expressão regular.

<hr>

AGRUPAMENTO DE ROTAS:

O agrupamento de rotas é indicado para as aplicações web em que haverá uma visualização geral para todos e outra visualização apenas para pessoas autorizadas através de um login. Para definir um grupo de rota, define-se um prefixo, depois um método chamado group.

<hr>

ROTA DE FALLBACK:

Ou rota de contingência é utilizada sempre nas aplicações para caso o usuário acesse uma rota não encontrada não apareça um mensagem de erro mas sim um redirecionamento de rota através de uma página customizada, mais amigável.

<hr>

BLADE:

O blade é o motor de renderização de views do PHP. Serve para acelerar a criação de páginas, repleto de recursos.

Comentário – Para utilizar um comentário basta abrir chaves duplas com dois traços = {{-- --}},  sem espaços.

Para abrir blocos de PHP puros coloca-se a sintaxe do blade, @php (abrir) e @endphp (fechar).

HELP ASSET:

É a maneira mais apropriada no laravel para referenciar os ativos (imagens, css, js) as paginas html da aplicação. Por padrão o help asset busca automaticamente o diretorio public, mas podemos mostrar para o laravel na variavel de ambiente qual o diretório raiz onde esta os assets.

TEMPLATES:

Um template é uma ótima opção para reutilizar codigos sem a necessidade de reescrever novamente aquilo que em todas as views precisa. Neste sentido para fazer a utilização de layouts é através do método extands() na views que indicara ao layout qual view deve renderizar. Após a declaração do método extands() precisamos encapsular o código html da view em uma @section() - @endsection indicando o nome do bloco de código relacionado a essa sessão, podendo também definir parâmetros dentro da section() por exemplo o nome do title da página.
	Depois no layout passagem dentro do método @yeld(‘’) o nome da section que deverá ser renderizada.

- @extends(): determina o template a ser utilizado na view.
- @section() @endsection: envio do bloco de código html para o template estendido.
- @yeld(): indicar no template extendido onde os blocos html devem ser renderizados.
- @includ(): determina onde deve ser incluído certo conteúdo HTML que se repete nas views.

<hr>

FORMULÁRIO:

Por padrão os formulários usa o method GET para envio de dados. Este método expõe na URL os dados enviado via formulário.
O method POST já não deixa visível os dados na URL, mas para usar esse método no laravel é necessário a utilização de uma método chamado @csrf no formulário.

- @csrf: Cross-site request forgery (falsificação de solicitação entre sites), é um token exclusivo usado no formulário legítimo da aplicação, esta prática é comum em muitos frameworks de mercado que tem o objetivo de minimizar a falsa requisição de sites maliciosos, evitando dessa forma a vulnerabilidade da aplicação. Estes sites maliciosos são chamados de Cross-site, no entanto usando essa prática de token as aplicações maliciosas não conseguem recuperar esses token impedindo significamente os ataques maliciosos para recuperar dados sigilosos.

<hr>

COMPONENTS:

Muito parecido com os includs, mas com os components podemos incluir views em outras views de forma mais simples, basta declarar dentro da view onde queremos renderizar uma views dentro do diretório components o método @components(‘caminho da view’) e fechando-o @endcomponents.
Dentro do método @components() podemos colocar códigos html para que sejam renderizados na view, ou seja, onde declaramos este métodos escrevemos todo html necessário e para renderizar devemos utilizar uma variável chamada $slot dentro do component no local em que desejamos que ele aparareça.
Outra forma de renderizar conteúdo é definindo dentro de parentêses do @components() um array associativo com chave e valor. Dessa forma também podemos definir estilos css.

<hr>

MODEL:
- php artisan make:model nome do modelo no singular -m

Para cada modelo é importante criar uma migration por utiliza o -m ao final do comando de criação de um model.
Para simplificar uma migration, ela serve para criar uma tabela ao ao banco de dados diretamente no php e framework laravel, ou seja, não precisamos criar na mão o banco de dados e tabelas referente a aplicação no SGBD(no estudo estamos utilizando o Mysql Workbanch).<br>
Para criar novas colunas em uma tabela podemos fazer de duas formas, uma é diretamente no banco de dados, mas podemos ter problemas com essa prática. O ideal seria realizar diretamente com o framework laravel através das migrations.<br>
O certo então seria criar uma nova migration reponsável pela criação de novas colunas em uma tabela já existente no banco de dados. Basta executar o seguinte comando no terminal:
- php artisan make:migration alter_fornecedores_novas_colunas
É importante sempre, colocar nomes nas migrations que evidencie a sua real função. Logo após, dentro da migration de criação de novas colunas criar o seguinte script:
```
- Schema::table('fornecedores', function(Blueprint $table){
	$table->string('uf', 2);
	$table->string('email', 150);
});
```
<hr>

Método UP e DOWN:
```
No método up(){
	Tudo que estiver dentro é executado com a instrução php artisan migrate, verificando todas as migrations que ainda não foram executadas. É executado do inicio até o fim.
};
```
```
No método down(){
	Este método é responsável por desfazer tudo aquilo que foi feito no método up. É executado do fonal até o inicio, de forma contrária.
};
```
Ou seja, sempre que for criado uma migration deve implementar os dois métodos, up e down. E para utilizar o método down de Rollback, basta executar o seguinte comenado:
- php artisan migrate:rollback
Podemos também definir quantos staps voltar.

<hr>

Modificadores de colunas NULLABLE e DEFAULT:

Por padrão a criação das colunas não aceita valores nulos e default, precisando assim declarar a aceitação desses valores como o exemplo a seguir:
- $table->integer('peso')->nullable();
- $table->float('preco_venda', 8, 2)→default(0.01);

<hr>

CHAVES ESTRANGEIRAS:

- Relacionamento 1 para 1<br>
	No relacionamento de 1 para 1 é indicado que a chave primária apareça como chave estrangeira na tabela mais fraca do relacionamento. Por convenção do laravel indica-se a nomeação da chave estrangeira com o primeiro nome no singular seguido de id, definindo também o tipo igual o da chave primária, exemplo:
- $table->unsignedBigInteger('produto_id');

	Após essa declaração deve definir a constraint, que é a definição da chave estrangeira no banco de dados com a seguindo declaração:
- $table->foreign('produto_id')->references('id')->on('produtos');
	
	Outro detalhe é a declaração do método unique para relacionamentos 1 para 1, caso não defina esse método o relacionamento passa a ser de 1 para n. Exemplo:
- $table->unique('produto_id');

- Relacionamento 1 para n (muitos)<br>
	A chave de cardinalidade 1 aparece como chave estrangeira nas outras tabelas. Dentro dessa mesma migration definimos os relacionamentos com a outras tabelas que receberá a chave estrangeira. 
	Já que é relacionamento 1 para muitos não precisamos declarar a unique, pois poderá receber vários dados das outras tabelas. Exemplo:
- Schema::table('produtos', function(Blueprint $table){
	$table->unsignedBigInteger('unidade_id');
	$table->foreign('unidade_id')->references('id')->on('unidades');
});
	No método down() dessa migration devemos definir a remoção das contraints antes da exclusão da tabela, caso não defina acontecerá um erro. Exemplo:
- //Remover o relacionamento com a tabela produto_detalhes
Schema::table('produto_detalhes', function(Blueprint $table){
	//remove a fk
	$table>dropForeign('produto_detalhes_unidade_id_foreign');
	//remover a coluna unidade_id
	$table->dropColumn('unidade_id');
});

- Relacionamento n para n (muitos para muitos)<br>
	Neste relacionamento sempre envolve outra outra tabela, onde receberá as chaves da tabelas relacionadas nessa relação n para n. 

<hr>

MODIFICADOR AFTER:

Este método determina uma posição específica de uma coluna, ou seja, após criar uma coluna ela aparecerá à direita, mas com este método podemos posicioná-la em um lugar específico, ajudando a estética do banco de dados, deixando-o mais organizado.

<hr>

COMANDOS MIGRATE (Status, Reset, Refresh, Fresh):

- Status: Lista todas as migration que foram executadas ou ainda pendentes.
- Reset: Reseta todas as migrations, fazendo rollbacks até zerar o banco.
- Refresh: Recria novamente o banco de dados executando o método down e após o up.
- Frash: Dropa todos os objetos e na sequência executa o migrate

<hr>

ELOQUENT ORM:

ORM(Object Relation Map) ou Mapeamento Objeto Relacional. Essas bibliotecas ORM servem para mapear os dados entre o banco de dados e a aplicação orientada a objetos, fornecendo recursos para gravação, seleção, atualização e remoção registros (CRUD). Com isso, diminui significamente o tempo de desenvolvimento de uma aplicação. Ressaltando que estes ORM são independentes de linguagem de programação, e atualmente dois padrões se destacam no mercado as ele:
- DATA MAPPER
- ACTIVE RECORD
No Laravel, o framework Eloquet segue o padrão Active record.

<hr>

Tinker:

É uma ferramenta nativa do Laravel, um console interativo que acessa as classes do projeto através da linha de comando. Através dele podemos manipular as classes relativas aos models, podendo por exemplo instanciar essas classes e executar os métodos, também podemos testar o mapeamento objeto relacional entre as classes dos models e o banco de dados relacional. Ou seja, com o Tinker não precisamos de uma plicação front para testar essa relação, funciona como um atalho no Laravel para realizar essa tarefa.

No Eloquent temos algumas limitações, como por exemplo a nomeação das classes nos model. Ou seja, automaticamente o Eloquent tem a inteligência de identificar o nome das tabelas no banco de dados colocando a letra ‘s’ no final do nome da classe. Mas por conta disso, teremos um erro em algum momento quando o Eloquent não pluraliza corretamente o nome da tabela.
Nesses casos podemos definir na classe a sobreposição do nome da tabela para que não aconteça esse tipo de erro usando o atributo $table, conforme descrito abaixo:

```
protected $table = ‘fornecedores’;
```

Podemos inserir dados no banco pela instancia dos objetos e adicionando atributos a esses objetos e por fim executava o método save():
```
>>> $f2 = new App\Models\Fornecedor();
=> App\Models\Fornecedor {#3556}

>>> $f2->nome = 'Fornecedor XYZ';
=> "Fornecedor XYZ"

>>> $f2->site = 'fornecedorxyz.com.br';
=> "fornecedorxyz.com.br"

>>> $f2->uf = 'SP';
=> "SP"

>>> $f2->email = 'contato@fornecedorxyz.com.br';
=> "contato@fornecedorxyz.com.br"

>>> print_r($f2→getAttributes());
```

Porém podemos utilizar também um método estático para inserção de dados, com uma sintaxe mais enxuta que não depende da instância do objeto. Basta chamar o método recuperando a classe no tinker seguido de dois ponto ‘::’ e em seguida o método estático create([]).
Para não haver erro, é necessário incluir o método $fillable na classe, passando um array de objetos, que são na verdade as colunas da tabela.

<br>
Com o método ::all() podemos recuperar todos os registros realizados no banco:

```
>>> use \App\Models\Fornecedor;
>>> $fornecedores = Fornecedor::all();
=> Illuminate\Database\Eloquent\Collection {#3570
     all: [
       App\Models\Fornecedor {#3572
         id: 1,
         nome: "Fornecedor XYZ",
         site: "fornecedorxyz.com.br",
         created_at: "2022-06-14 00:01:11",
         updated_at: "2022-06-14 00:01:11",
         uf: "SP",
         email: "contato@fornecedorxyz.com.br",
       },
     ],
   }
```

Com o método ::find() também podemos recuperar dados do banco, mas esse método estático necessita de parâmetros, mais especificamente o parâmetro ‘id’.
```
>>> $fornecedores2 = Fornecedor::find(1);
```

<br>
Com o método ::where()->get() podemos recuperar dados passando uma query adequada a busca, podendo colocar regras específicas para buscar registros mais detalhados.

```
>>> use \App\Models\SiteContato;
>>> $contatos = SiteContato::where('id', '>', 1)->get();
=> Illuminate\Database\Eloquent\Collection {#4250
     all: [
       App\Models\SiteContato {#3890
         id: 2,
         created_at: "2022-06-13 23:12:45",
         updated_at: "2022-06-13 23:12:45",
         nome: "Maria",
         telefone: "(11) 93333-4444",
         email: "maria@contato.com.br",
         motivo_contato: 2,
         mensagem: "Estou gostando muito do Super Usuario",
       },
     ],
   }

```
<br>
Método whereIn():

Este método espera dois parâmetros, o primeiro é o campo a ser comparado por igualdade e o segundo é o conjunto de parâmetros. Esses parâmetros podem ser valores numéricos, strings e datas, podendo passar quantos forem necessários, basta separá-los por vírgula.
```
>>> use \App\Models\SiteContato;
>>> $contatos = SiteContato::whereIn('motivo_contato', [1, 3])→get();
```

Método whereNotIn():

Este método, diferente do acima explicado faz uma comparação por diferente aos parâmetros passados.

```
>>> use \App\Models\SiteContato;
>>> $contatos = SiteContato::whereNotIn('motivo_contato', [1, 3])→get();
```
Método AND:

com esse operador podemos conectar mais query na busca de resultados. Mas no tinker ao invés de escrever a palavra ‘and’ declaramos uma nova pesquisa com ‘→’. Para retornar resultado todas a operações devem ser verdadeiras.

Método OR:
	
Para a junção das operações utilizamos a palavra or antes do método a esquerda. Para retornar valor apenas uma das operações precisa ser verdadeira.
```
orwhere() - orwhereIn() - orwhereBetween()
```

<hr>

COLLECTION: First, Last, Reverse, toArray, toJson, Pluck

First – Este método retorna apenas o primeiro registro da collection.

```
>>> $contatos->first();
=> App\Models\SiteContato {#4492
     id: 4,
     created_at: null,
     updated_at: null,
     nome: "Rosa",
     telefone: "(33) 92222-3333",
     email: "rosa@contato.com.br",
     motivo_contato: 1,
     mensagem: "Quando custa essa aplicação?",
   }

```

Last – Este método retorna apenas o ultimo elemento do array da collection.

```
>>> $contatos->last();
=> App\Models\SiteContato {#4496
     id: 8,
     created_at: null,
     updated_at: null,
     nome: "Helena",
     telefone: "(11) 97777-8888",
     email: "helena@contato.com.br",
     motivo_contato: 2,
     mensagem: "Consigo controlar toda a minha empresa de modo fácil e prático.",
   }
```

Reverse – Retorna a ordem inversa do array.
```
>>> $contatos->reverse();
=> Illuminate\Database\Eloquent\Collection {#4501
     all: [
       4 => App\Models\SiteContato {#4496
         id: 8,
         created_at: null,
         updated_at: null,
         nome: "Helena",
         telefone: "(11) 97777-8888",
         email: "helena@contato.com.br",
         motivo_contato: 2,
         mensagem: "Consigo controlar toda a minha empresa de modo fácil e prático.",
       },
       3 => App\Models\SiteContato {#4495
         id: 7,
         created_at: null,
         updated_at: null,
         nome: "Ana",
         telefone: "(33) 96666-7777",
         email: "ana@contato.com.br",
         motivo_contato: 3,
         mensagem: "Não gostei muito das cores, consigo mudar de tema?",
       },
```

toArray - Com este método a colletion é convertida para um array.
```
>>> SiteContato::all()->toArray();
=> [
     [
       "id" => 1,
       "created_at" => "2022-06-13T23:06:01.000000Z",
       "updated_at" => "2022-06-13T23:06:01.000000Z",
       "nome" => "JOrge",
       "telefone" => "(11) 98888-4444",
       "email" => "jorge@contato.com.br",
       "motivo_contato" => 1,
       "mensagem" => "Olá, gostaria de mias detalhes sobre o Super Gestão",
     ],
```
toJson – Com este método a collection é convertida para uma string do tipo json.
```
>>> SiteContato::all()->toJson();
=> "[{"id":1,"created_at":"2022-06-13T23:06:01.000000Z","updated_at":"2022-06-13T23:06:01.000000Z","nome":"JOrge","telefone":"(11) 98888-4444","email":"jorge@contato.com.br","motivo_contato":1,"mensagem":"Ol\u00e1, gostaria de mias detalhes sobre o Super Gest\u00e3o"},{"id":2,"created_at":"2022-06-13T23:12:45.000000Z","updated_at":"2022-06-13T23:12:45.000000Z","nome":"Maria","telefone":"(11) 93333-4444","email":"maria@contato.com.br","motivo_contato":2,"mensagem":"Estou gostando muito do Super Usuario"},{"id":3,"created_at":null,"updated_at":null,"nome":"Jo\u00e3o","telefone":"(88) 91111-2222","email":"joao@contato.com.br","motivo_contato":3,"mensagem":"\u00c9 muito dif\u00edcil localizar a op\u00e7\u00e3o de listar todos os produtos"},{"id":4,"created_at":null,"updated_at":null,"nome":"Rosa","telefone":"(33) 92222-3333","email":"rosa@contato.com.br","motivo_contato":1,"mensagem":"Quando custa essa aplica\u00e7\u00e3o?"},{"id":5,"created_at":null,"updated_at":null,"nome":"Fernando","telefone":"(11) 94444-5555","email":"fernando@contato.com.br","motivo_contato":1,"mensagem":"Como consigo criar multiplos usu\u00e1rios para minha empresa?"},{"id":6,"created_at":null,"updated_at":null,"nome":"Andr\u00e9","telefone":"(88) 95555-6666","email":"andre@contato.com.br","motivo_contato":2,"mensagem":"Parab\u00e9ns pela ferramenta, estou obtendo \u00f3timos resultados!"},{"id":7,"created_at":null,"updated_at":null,"nome":"Ana","telefone":"(33) 96666-7777","email":"ana@contato.com.br","motivo_contato":3,"mensagem":"N\u00e3o gostei muito das cores, consigo mudar de tema?"},{"id":8,"created_at":null,"updated_at":null,"nome":"Helena","telefone":"(11) 97777-8888","email":"helena@contato.com.br","motivo_contato":2,"mensagem":"Consigo controlar toda a minha empresa de modo f\u00e1cil e pr\u00e1tico."}]"

>>>
```

pluck – Este método permite retornar todos os valores de uma determinada chave. E com segundo parâmetro retornarmos um array associativo.
```
>>> SiteContato::all()->pluck('email');
=> Illuminate\Support\Collection {#4516
     all: [
       "jorge@contato.com.br",
       "maria@contato.com.br",
       "joao@contato.com.br",
       "rosa@contato.com.br",
       "fernando@contato.com.br",
       "andre@contato.com.br",
       "ana@contato.com.br",
       "helena@contato.com.br",
     ],
   }

>>> 
<br>
>>> SiteContato::all()->pluck('email', 'nome');
=> Illuminate\Support\Collection {#4520
     all: [
       "JOrge" => "jorge@contato.com.br",
       "Maria" => "maria@contato.com.br",
       "João" => "joao@contato.com.br",
       "Rosa" => "rosa@contato.com.br",
       "Fernando" => "fernando@contato.com.br",
       "André" => "andre@contato.com.br",
       "Ana" => "ana@contato.com.br",
       "Helena" => "helena@contato.com.br",
     ],
   }

>>> 
```

Método delete():
Para deletar um registro no banco de dados basta recuperar o id e em seguida usar o método como exemplo abaixo.
```
>>> $contato = SiteContato::find(4);
=> App\Models\SiteContato {#3892
     id: 4,
     created_at: null,
     updated_at: null,
     nome: "Rosa",
     telefone: "(33) 92222-3333",
     email: "rosa@contato.com.br",
     motivo_contato: 1,
     mensagem: "Quando custa essa aplicação?",
   }

>>> $contato→delete();
```

```
Método destroy(): Para apagar registros basta executar este método podendo passar vários id’s.
>>> SiteContato::destroy(5);
=> 1
```
<br>

Método delete():
Para deletar um registro no banco de dados basta recuperar o id e em seguida usar o método como exemplo abaixo.

```
>>> $contato = SiteContato::find(4);
=> App\Models\SiteContato {#3892
     id: 4,
     created_at: null,
     updated_at: null,
     nome: "Rosa",
     telefone: "(33) 92222-3333",
     email: "rosa@contato.com.br",
     motivo_contato: 1,
     mensagem: "Quando custa essa aplicação?",
   }

>>> $contato→delete();
```

Método destroy(): Para apagar registros basta executar este método podendo passar vários id’s.
```
>>> SiteContato::destroy(5);
=> 1
```

SoftDeletes:

Método utilizado para controle de registros excluídos do banco de dados, a fim de ter ainda a possibilidade de recuperar esses dados. Para usá-lo precisamos chamar este método na classe em questão e também na migration incluir o método na criação da tabela.
Para recuperar os registros excluídos e ativos utilizamos o método withTrashed() ou apenas os excluido usando onlyTrashed().

```
>>> Fornecedor::withTrashed()->get();
=> Illuminate\Database\Eloquent\Collection {#3588
     all: [
       App\Models\Fornecedor {#3589
         id: 1,
         nome: "Fornecedor 123",
         site: "fornecedor123.com.br",
         created_at: "2022-06-14 00:01:11",
         updated_at: "2022-06-16 01:44:21",
         uf: "SP",
         email: "contato@fornecedor123.com.br",
         deleted_at: "2022-06-16 01:44:21",
       },
     ],
   }
```

Para recuperar um registro basta utilizar o método restore().
```
$fornecedores[0]->restore();

```
<hr>

SEEDERS:

São responsáveis por semear o banco de dados com os dados iniciais de configuração atracés de classes. Para entender melhor na prática para criar uma classe seeders:
```
php artisan make:seeder FornecedorSeeder
```
Existem três formas de inserir dados através da classe semeadora:
- Instanciando o objeto
```
//instaciando o objeto
$fornecedor = new Fornecedor();
$fornecedor->nome = 'Fornecedor 100';
$fornecedor->site = 'fornecedor100.com .br';
$fornecedor->uf = 'CE';
$fornecedor->email = 'cotato@fornecedor100.com.br';
$fornecedor->save();
```
- Método create com método fillable declarado no model
```
//Método create - definir método fillable no model
Fornecedor::create([
    'nome'=> 'Fornecedor 200',
    'site'=> 'fornecedor200.com.br',
    'uf'=> 'DF',
    'email'=> 'contato@fornecedor200.com.br',
]);
```
- insert com DB
```
//insert
DB::table('fornecedores')->insert([
    'nome'=> 'Fornecedor 300',
    'site'=> 'fornecedor300.com.br',
    'uf'=> 'RS',
    'email'=> 'contato@fornecedor300.com.br',
]);
```

Após a criação da classe e seu método de inclusão de registros no banco podemos chamar o método a seguir para de fato inserir os registros:
```
php artisan db:seed
```
Para não inserir novamente os dados de uma seeder ja executada podemos comentar a classe na DatabaseSeeder ou simplesmente informar na chamada
qual seeder deverá ser execudada para inserir os dados.
```
php artisan db:seed --class=SiteContatoSeeder
```

FACTORIES:

Basecamente uma factory permite através de uma seeder semear em massa uma tabela no banco de dados utilizando uma bilbioteca chama Faker.
Para criar uma factory devemos indicar o model que será utilizado como modelo:
```
php artisan make:fatory SiteContatoFactory --model=SiteContato
```
Após criação da factory e sua estrutura utilizando os métodos da biblioteca Faker, devemos incluir a factory na Seeder em questão da seguinte forma:
```
SiteContato::factory()->count(100)->create();
```

Para excutar de fato a inseçao fake no banco basta chamar novamente o método php artisan db:seed --class=SiteContatoSeeder

<hr>

**Trabalhando com formulários**<br>
O framework tem a inteligência de recuperar os dados do formulários no backend, mais epecificamente na Controller, através do método REQUEST.
- validações:<br>
Utliza-se o método validate() para realizar as validações, em que os names dos inputs são a chave da validação e no valor deve-se declarar as regras. Dentro da docuemntação do Laravel existe diversos métodos e regras para usar na validação.<br>
Ex.:

```
'nome' => 'required|min:3|max:40',
'telefone' => 'required',
'email' => 'email',
'motivo_contatos_id' => 'required',
'mensagem' => 'required|max:2000'
```

Para recuperar valor dentro dos inputs caso o form não seja enviado por causa de algum erro na validação, usamos o método old na view dentro do input no value.
<br>Ex.:<br>
```
input type="text" value="{{ old('telefone') }}" placeholder="Telefone" class="{{ $classe }}" name="telefone">
```
<hr>

**Middlewares**<br>
Muito utilizado em frameworks, os middlewares são basicamente um intermediador de comunicação de entrada e saída de aplicações distintas. Atua no Request e Response da aplicação, interceptando esses dados antes de terem acesso ao conteúdo da aplicação, podendo ser tomada decisões e ações entre a requisição e resposta com o client.

- Atribuir middlewares às rotas:<br>
```
Route::middleware(LogAcessoMiddleware::class)
    ->get('/', [PrincipalController::class, 'principal'])
    ->name('site.index');
```
- Atribuir middlewares aos controllers:<br>
```
class SobreNosController extends Controller
{
    public function __construct()
    {
        $this->middleware(LogAcessoMiddleware::class);
    }
    
    public function sobreNos() {
        return view('site.sobre-nos');
    }
}
```
- Adicionar os middlewares a todas as rotas:<br>
```
protected $middlewareGroups = [
    'web' => [
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        -> Adicionamos em kernel.php o Middleware para ser adicionado as rotas contidas em web.php
        \App\Http\Middleware\LogAcessoMiddleware::class,
    ],
```
- Apelidar os Middlewares:<br>
```
protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
    'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
    'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
    'can' => \Illuminate\Auth\Middleware\Authorize::class,
    'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
    'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
    'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
    'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    'log.acesso' => \App\Http\Middleware\LogAcessoMiddleware::class,
];
```
- Encadiamento de middlewares:<br>
```
Route::middleware('log.acesso','autenticacao')
        ->get('/clientes', function(){ return 'Clientes'; })
        ->name('app.clientes');
```

  


<br><br>

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
