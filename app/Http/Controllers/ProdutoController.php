<?php

namespace App\Http\Controllers;

//usar o servico de requisições e pegar parametros na URL
use Request;

//usar funçoes de SQL
use Illuminate\Support\Facades\DB;

//lembrarrrrrrr
use App\Produto;
use App\Categoria;

//validação ou usar \Validatior no local(igual a Request)
use Validator;

//
use Auth;

use App\Http\Requests\ProdutoRequest;


class ProdutoController extends Controller
{   
    public function __construct()
    {
        $this->middleware('autorizador');
    }

    public function lista(){
        
        //utiliza a classe DB para fazer select e trazer os dados
       /* $produtos = DB::select('select * from produtos');
        return view('listagem')
        ->with('produtos', $produtos);
        */
        
        //utiliza o ORM onde pega uma estrutura do MODEL de tabela
        

        //guest - verificar se o usuario está logado
        //aplicar em todos os controles que tem acesso a views, criar MIDDLAWERE
        //if(Auth::guest()){
        //    return redirect('/login');
        //}


        $produtos = Produto::all();
        return view('listagem')
        ->with('produtos', $produtos);
    }

    public function mostra($id){
        
        /*pega o parametro da requisição  /../?id=1
        // $id = Request::input('id');
        $produto = DB::select('select * from produtos where id = ?', [$id]);
        return view('detalhes')
        ->with('produto', $produto[0]);
        vem um array com outras informações*/

        /*
        //pega o parametro da rota(URL)
         $id = Request::route('id');
        //deixar um valor padrao = 1
        // $id = Request::route('id', 1);
         $produto = DB::select('select * from produtos where id = ?', [$id]);
        return view('detalhes')
        ->with('produto', $produto[0]);
        //vem um array com outras informações (muitos produtos podem ser trazidos na busca(escolha do que está na 1 posicõa do array))
        */

        /*
        metodo nao recebe o parametro, por isso é pego dentro dele $id
        $id = Request::route('id');
        $produto = Produto::find($id);
        //busca por id
        return view('detalhes')
        ->with('produto', $produto);
        //na busca retorna só um produro
        */

        $produto = Produto::find($id);
        return view('detalhes')
        ->with('produto', $produto);

    }
    
    public function novo(){
        return view('formulario')->with('categorias', Categoria::all());
    }

    
    public function adiciona(ProdutoRequest $request){
        /*
         //pegar as informções
         $nome = Request::input('nome');
         $quantidade = Request::input('quantidade');
         $valor = Request::input('valor');
         $descricao = Request::input('descricao');
         
         //esqueci de ajeitar o banco para ser autoincrement então tem que gerar o id
         
         //salvar as informações
         DB::insert('insert into produtos (nome, quantidade, valor, descricao) values (?,?,?,?)',
         array($nome, $quantidade, $valor, $descricao));
         
         //redirecionar para a secão de produtos
         return redirect('/produtos')->withInput();
         
         //quando adicionar ira manda o dado do produto criado para uma nova view (nao fazer isso, melhor ALERT na listagem)
         //return view('adicionado')->with('nome', $produto);
        */
        
        /*
        $produto = new Produto();
        //erro devido ao nao indicar no model quais propriedades serao inseridas
        
        
        $produto->nome = Request::input('nome');
        $produto->quantidade = Request::input('quantidade');
        $produto->valor = Request::input('valor');
        $produto->descricao = Request::input('descricao');
        
        //verificar campos a serem adicionados no MODEL
        $produto->save();

        return redirect('/produtos')->withInput();
        */
         
        /*
        
        //metodo que pega todos os parametros enviados na requisição
        $parans = Request::all();
        $produto = new Produto();
        $produto->save();
        return redirect('/produtos')->withInput();
        */

        //metodo que cria (fabrica)
        //Produto::create(Request::all());
        //return redirect('/produtos')->withInput();

        Produto::create($request->all());
        return redirect('/produtos')->withInput();
        ////(ProdutoRequest $request) vai substituir o metodo request e irá fazer a verificação dos dados validos
        //com o método all ele faz isso

        //--------------------------------------------------------
        
        // chamar classe direto sem usar o USE 
        //           \Validator

        //---------------------------------------=----------------

        //VALIDAÇÃO
        //$nome = Request::input('nome');
        //if(empty($nome)){
        //   return redirect('produtos/novo')
        //}

        //Validação com a Classe Validator
        //$nome = Request::input('nome');
        // $validator = Validator::make(
        //    ['nome' => $nome)],
        //    ['nome' => 'required|min:3']
        //);
        //se a validação falhar ira retornar as mensagens de falha
        //if($validator->fails()){
            //rretornar mensagens 
            //$msgs = $validator->messages();
            //dd($msgs);
            //    return redirect('/produtos/novo')
        //}

        //criar um form REQUEST  pelo artisan (VALIDAR varios campos) 
        //http/request/ProdutRequest

        //chama o metodo ProdutRequesta no parametro do método adicionar
        //(ProdutoRequest $request)





                
                //muda para esse modelo e passa o  processo de validação
                //$params = $request->all();
                
                
                // return redirect('/produtos')->withInput();
                //manter dados dessa requisição na proxima de listagem de produtos
            }
            
        public function remove($id){
        /*
        não precisa colocar o ID no remove()
        $id = Request::route('id');
        $produto = Produto::find($id);
        $produto->delete();
        return redirect('/produtos');
        */

        //é feito a requisição automaticamente se colocar no parametro da funçao (olhar o RESOURSE)
        //$id = Request::route('id');

        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->action('ProdutoController@lista');
    }
}
