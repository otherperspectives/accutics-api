<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponser;
    /**
     * The service to consume users microservice
     * @var UserService
     */
    public $userService;

    /**
     * UserController constructor.
     * @param $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        //
        return $this->successResponse($this->userService->getAll());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        return $this->successResponse($this->userService->search($request->searchBy, $request->searchQuery));
    }

}
