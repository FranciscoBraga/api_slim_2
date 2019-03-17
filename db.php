<?php
if (PHP_SAPI != 'cli') 
{
  exit('Rodar via CLI');
}

require __DIR__ . '/vendor/autoload.php';

// Instantiate the app
$settings = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/src/dependencies.php';

$db = $container->get('db');

$schema = $db->schema();
$tabela = 'produtos';

$schema->dropIfExists($tabela);

//cria a tabela produtos
$schema->create($tabela, function($table){

    $table->increments('id');
    $table->string('titulo', 100);
    $table->text('descricao');
    $table->decimal('preco', 11,2);
    $table->string('fabricante',60);
    $table->date('dt_criacao');
});

//criando produtos
$db->table($tabela)->insert([
     'titulo'=> 'Arroz 5kg',
    'descricao'=> 'tipo 1',
    'preco'=> 15.00,
    'fabricante' => 'Tio Ico',
    'dt_criacao'=> '2019-03-17'
]);

$db->table($tabela)->insert([
  'titulo'=> 'Feijão 1kg',
 'descricao'=> 'tipo 1',
 'preco'=> 8.00,
 'fabricante' => 'Carioca',
 'dt_criacao'=> '2019-03-17'
]);