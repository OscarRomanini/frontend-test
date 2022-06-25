<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Services\TaskService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    public function index()
    {
        $url = env('API_URL') . 'get-tasks';
        $tasks = json_decode(Http::get($url)->body(), true);

        return view('home.index', compact('tasks'));
    }

    public function store(TaskRequest $taskRequest): RedirectResponse
    {
        $taskRequest->validated();

        $url = env('API_URL') . 'store-task';
        $data = $taskRequest->all();

        $message = Http::post($url, $data)->status() == 200
                ? ['success' => 'Cadastro realizado com sucesso']
                : ['error' => 'Erro ao cadastrar. Entre em contato com a nossa equipe'];

        session()->flash('message', $message);

        return redirect()->back();
    }

    public function update(TaskRequest $taskRequest, $id): RedirectResponse
    {
        $taskRequest->validated();

        $url = env('API_URL') . 'update-task/' . $id;
        $data = $taskRequest->all();

        $message = Http::put($url, $data)->status() == 200
            ? ['success' => 'Tarefa atualizada com sucesso']
            : ['error' => 'Erro ao atualizar. Entre em contato com a nossa equipe'];

        session()->flash('message', $message);

        return redirect()->back();
    }

    public function delete($id): RedirectResponse
    {
        $url = env('API_URL') . 'delete-task';

        $message = Http::post($url, ['id' => $id])->status() == 200
            ? ['success' => 'Tarefa excluída com sucesso']
            : ['error' => 'Erro ao excluir tarefa. Entre em contato com a nossa equipe'];

        session()->flash('message', $message);

        return redirect()->back();

    }
}
