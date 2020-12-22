<?php

namespace App\Http\Controllers\Admin;

use App\Candidate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Candidates\Create;
use App\Http\Requests\Candidates\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;


class DashboardController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.dashboard')->with('candidates',\App\Candidate::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Create $request)
    {
        
         Candidate::create([
            'name'=>$request->name
        ]);    

         session()->flash('success','Candidate criado com sucesso');
        return redirect(route('admin.dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, Candidate $candidate)
    {
        $candidate->name = $request->name;
        $candidate->save();
        session()->flash('success','Candidato atualizado');
        return redirect(route('admin.dashboard')); 
    }


    public function jsonCreate(Request $request)
    {
        //Storage::get(.json);
       
        $path = storage_path() . "/app/public/file.json"; // ie: /var/www/laravel/app/storage/json/filename.json

$json = json_decode(file_get_contents($path), true); 
        $candidates =  $json; 
        foreach ($candidates as $candidate) {
           // dd($candidate);
            Candidate::create([
            'name'=>$candidate['nome'],
            'funcao'=>$candidate['cargo']
        ]); 
        }
     session()->flash('success','Candidate criado com sucesso');
        return redirect(route('admin.dashboard'));   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        if ($candidate->users !=null && $candidate->users->count()> 0) {
            
            session()->flash('error','Não e\' possível remover um candidato porque tem votos associados');
            return redirect()->back();
        }
        $candidate->delete();
        session()->flash('success','Candidato removido');
        return redirect(route('admin.dashboard'));
    }
}