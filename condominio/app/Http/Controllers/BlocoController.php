<?php

namespace App\Http\Controllers;

use App\Constants\Geral;
use App\Http\Requests\BlocoRequest;
use App\Services\BlocoService;
use Illuminate\Http\Request;

class BlocoController extends Controller
{
    protected $service;

    public function __construct(BlocoService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(BlocoRequest $request)
    {
        $bloco = $this->service->create($request);

        return ['status' => true, 'message' => Geral::BLOCO_CADASTRADO, 'bloco' => $bloco];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
