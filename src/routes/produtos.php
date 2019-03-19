<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;


//Rotas de produtos
$app->group('/api/v1', function(){

    $this->get('/produtos', function($request, $response)
    {
      return  $response->withJson(['nome'=>'Moto G']);
    });
    //listando produtos
    $this->get('/produtos/lista', function($request, $response)
    {
      $produtos = Produto::get();
     
       return  $response->withJson($produtos);
    });
    //adiciona Produtos
    $this->get('/produtos/adiciona', function($request, $response)
    {
      $dados = $request->getParsedBody();
      $produtos = Produto::create($dados); 
      return  $response->withJson($produtos);
    });
    //recupera um deternimado ID
    $this->get('/produtos/lista/{id}', function($request, $response, $args)
    {
      $produtos = Produto::findOrFail($args['id']); 
       return  $response->withJson($produtos);
    });
    //atualiza um deternimado ID
    $this->get('/produtos/atualiza/{id}', function($request, $response, $args)
    {
      //recuperando dados produtos
      $dados = $request->getParsedBody();
      $produtos = Produto::findOrFail($args['id']);
      $produtos->update($dados); 
       return  $response->withJson($produtos);
    });
    //removendo produto por um deternimado ID
    $this->get('/produtos/remove/{id}', function($request, $response, $args)
    {
         $produtos = Produto::findOrFail($args['id']);
         $produtos->delete();
          return  $response->withJson($produtos);
    });

});
