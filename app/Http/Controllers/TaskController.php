<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function addCategoryToTask(Request $request, $taskid)
    {
        // Recherche la tâche par son identifiant
        $task = Task::find($taskid);

        // Ajoute une relation entre la tâche et la catégorie spécifiée (many-to-many)
        // Cela insère une ligne dans la table pivot (ex : category_task)
        // ⚠️ Si la catégorie est déjà liée, cela créera un doublon (à éviter)
        $task->categories()->attach($request->category_id);

        // Retourne une réponse JSON avec un message de succès et un code HTTP 200
        return response()->json(["message" => "Categorie added succesfully"], 200);
    }

    public function getTaskByCategorie($categorie_id){
      $category=Category::find($categorie_id);
      $task=$category->tasks;
      return response()->json($task);
    }

    public function getCategoryToTask($taskid)
    {
        $task = Task::find($taskid);
        return response()->json($task->categories, 200);
    }



    public function index()
    {
        //
        return response()->json(Task::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        return response()->json($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
        $tasks = Task::find($id);
        return response()->json($tasks);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, int $id)
    {
        //
        $tasks = Task::find($id);
        $tasks->update($request->validated());
        return response()->json($tasks);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $tasks = Task::find($id);
        $tasks->delete();
        return response()->json(null);
    }
}
