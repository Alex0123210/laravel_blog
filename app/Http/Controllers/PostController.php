<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $PostService;

    public function __construct(PostService $PostService)
    {
        $this->PostService = $PostService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return $this->PostService->index();
        //return response ((new PostService())->index(),200); //1 вариант ссылки на сервис с методом
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request) //логика создания новой записи
    {
        return $this->PostService->store($request); // 2 вариант
        //return response ((new PostService())->store($request)); //1 вариант ссылки на сервис с методом
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)  //показывается страница одной конкретной записи и соединяется с пользователем
    {
        return $this->PostService->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, int $id) // обновление данных при редактировании записи
    {
        //return $this->PostService->store($request); // 2 вариант
        return $this->PostService->update($request,$id); //1 вариант ссылки на сервис с методом
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id) //удаление записи
    {
        return $this->PostService->destroy($id);
    }
}
