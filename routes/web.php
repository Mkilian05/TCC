<?php

use App\Http\Controllers\{
    AdminController,
    DynamicjsController,
    HomeController,
    PostagensController,
    SobreController,
    ComentarioController,
    PreCadastroController
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');

Auth::routes();

Route::name('dynamicjs.')->prefix('dynamicjs')->group(function () {
    Route::get('base.js', [DynamicjsController::class, 'base'])->name('base.js');
});

Route::get('/home', [HomeController::class, 'index'])->name('home'); //Rota para visualizar a home


Route::get('restaurante/{slug?}', [PostagensController::class, 'viewRestaurante'])->name('restaurante'); //Rota para visualizar a os posts
Route::post('/comentarios', [ComentarioController::class, 'store'])->name('comentar'); //Rota que salva os comentário
Route::get('excluir/comentario/{id}', [ComentarioController::class, 'deleteComentario'])->name('excluir_comentario');
Route::put('/comentarios', [ComentarioController::class, 'updateComentario'])->name('update_comentario');

Route::post('/salvar_pre_cadastro', [PreCadastroController::class, 'store'])->name('salvar_pre_cadastro'); //Rota que salva os prés cadastros


Route::get('sobre', [SobreController::class, 'viewSobre'])->name('sobre'); //Rota para visualizar a tela sobre




//grupo de rota
Route::middleware('auth')->group(function(){

    Route::get('/comentario/{id?}', [ComentarioController::class, 'getComentarioById'])->name('busca-comentario');

    Route::prefix('painel')->name('painel.')->group(function(){
        Route::get('/', [AdminController::class, 'index'])->name('index');

        //Rotas de Controle e Gerenciamento de Usuários
        Route::get('listar/usuarios', [AdminController::class, 'viewListarUsuarios'])->name('listar_usuarios'); //Rota para visualizar a tela Listagem de Usuários
        Route::get('edit/usuarios/{id}', [AdminController::class, 'editUsuario'])->name('edit_usuario'); //Rota para visualizar a tela Listagem de Usuários
        Route::put('/usuarios', [AdminController::class, 'updateUsuario'])->name('post_update_usuarios'); //rota que serve para receber os novos valores e dar update no banco
        Route::get('/usuarios/excluir/{id}', [AdminController::class, 'deleteUsuarios'])->name('excluir_usuario'); //Rota para exluir inserts do banco

        //Rotas de Controle e Gerenciamento de Posts
        Route::get('post/novo', [PostagensController::class, 'create'])->name('create'); //Rota para visualizar a criação de posts
        Route::post('post/novo', [PostagensController::class, 'store'])->name('salvar_post'); //Rota para armazenar os dados dos posts no banco de dados
        Route::get('listar/posts', [AdminController::class, 'viewListar'])->name('listar'); //Rota para visualizar a tela Listagem de Posts
        Route::get('listar/solicitacoes', [PreCadastroController::class, 'viewListarSolicitacoes'])->name('listar_solicitacoes'); //Rota para visualizar a tela Listagem de Posts
        Route::get('/solicitacoes/excluir/{id}', [PreCadastroController::class, 'deleteSolicitacao'])->name('excluir_solicitacao'); //rota para exluir inserts do banco
        Route::get('/posts/edit/{id}', [AdminController::class, 'edit'])->name('editar_post'); //Rota para visualizar a edição dos posts
        Route::put('/posts/{id}', [AdminController::class, 'update'])->name('post_update'); //rota que serve para receber os novos valores e dar update no banco
        Route::get('/posts/excluir/{id}', [AdminController::class, 'delete'])->name('excluir_post'); //rota para exluir inserts do banco
    });
});
