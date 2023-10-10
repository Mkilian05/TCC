<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\UserRequest;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\PermissionRegistrar;

class AdminController extends Controller
{
    private $dashboard;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DashboardController $controller)
    {
        $this->dashboard = $controller;

    }

    public function index()
    {
        $this->authorize('view-admin');
        return view('admin.index', [
            'posts' => $this->dashboard->getCountPost(),
            'users' => $this->dashboard->getCountUser(),
            'precadastro' => $this->dashboard->getCountPreCadastro(),
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function viewAdmin()
    // {
    //     $posts = Post::all();
    //     return view('admin.admin', ['posts'=>$posts]);
    // }



    public function viewListar()
    {
        $this->authorize('view-admin');
        $posts = Post::all();
        return view('admin.listar_posts', ['posts'=>$posts]);
    }

    public function edit($id)
    {
        $this->authorize('edit-post');
        $posts = Post::where('id', $id)->first();
        if(!empty($posts))
        {
            return view('admin.edit_post', ['posts'=>$posts]);
        }else
        {
            return redirect()->route('painel.listar');
        }
    }

    public function delete(int $id){
        $this->authorize('delete-post');
        try{
            Post::where('id', $id)->delete(); // deleção logica? é

            return redirect()->route('painel.listar')->with('success', 'Post removido com sucesso');
        }catch(Exception $e)
        {
            Log::error('Erro ao remover post. Error =>'.$e->getMessage());

            return redirect()->route('painel.listar')->with('warning', 'Houve um erro ao remover o post.');
        }
    }

    public function update(PostRequest $request, $id)
    {
        $this->authorize('edit-post');
        $data = [
            'titulo' => $request->titulo,
            'descricao_breve' => $request->descricao_breve,
            'descricao_1' => $request->descricao_1,
            'descricao_2' => $request->descricao_2,
            'slug' => $request->slug,
            'filename' => $request->filename,
        ];

        Post::where('id', $id)->update($data);

        session()->flash('success', 'Registro atualizado com sucesso.');

        return redirect()->route('painel.listar');
    }

    // Funções para controle e administração de usuários
    public function viewListarUsuarios()
    {
        $users = User::all();
        return view('admin.listar_usuarios', ['users'=>$users]);
    }

    public function deleteUsuarios(int $id){
        $this->authorize('delete-usuario');
        try{
            User::where('id', $id)->delete(); // deleção logica? é

            return redirect()->route('painel.listar_usuarios')->with('success', 'Usuário removido com sucesso');
        }catch(Exception $e)
        {
            Log::error('Erro ao remover usuário. Error =>'.$e->getMessage());

            return redirect()->route('painel.listar_usuarios')->with('warning', 'Houve um erro ao remover o post.');
        }
    }

    public function editUsuario($id)
    {
        $this->authorize('edit-post');
        $users = User::where('id', $id)->first();
        if(!empty($users))
        {
            return view('admin.edit_usuario', ['users'=>$users]);
        }else
        {
            return redirect()->route('painel.listar_usuarios');
        }
    }

    public function updateUsuario(UserRequest $request)
    {
        // dd($request->all());
        $this->authorize('edit-post');
        try{

            $model = User::where('id', $request->id)->first();
            // $data = [
            //     'name' => $request->name,
            //     'email' => $request->email,
            // ];

            $model->fill($request->all());
            $model->save();

            if ( $request->has('role') ) {
                //removendo as permissções do usuário
                DB::table('model_has_roles')->where('model_id', $model->id)->delete();

                //setando novas permissões
                $model->assignRole($request->role);
                // Reset cached roles and permissions
                app()[PermissionRegistrar::class]->forgetCachedPermissions();
            }

            session()->flash('success', 'Registro atualizado com sucesso.');

            return redirect()->route('painel.listar_usuarios');
        }catch(Exception $e)
        {
            Log::error($e->getMessage());
            return back()->withErrors('message','ERRO AO ATUALIZAR O Usuário!!');
        }

    }
}
