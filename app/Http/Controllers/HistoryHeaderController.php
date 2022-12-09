<?php

namespace App\Http\Controllers;

use App\Models\HistoryHeader;
use App\Http\Requests\StoreHistoryHeaderRequest;
use App\Http\Requests\UpdateHistoryHeaderRequest;

class HistoryHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHistoryHeaderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHistoryHeaderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoryHeader  $historyHeader
     * @return \Illuminate\Http\Response
     */
    public function show(HistoryHeader $historyHeader)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoryHeader  $historyHeader
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoryHeader $historyHeader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHistoryHeaderRequest  $request
     * @param  \App\Models\HistoryHeader  $historyHeader
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHistoryHeaderRequest $request, HistoryHeader $historyHeader)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoryHeader  $historyHeader
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoryHeader $historyHeader)
    {
        //
    }
}
