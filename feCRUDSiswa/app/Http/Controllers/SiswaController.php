<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Libraries\BaseApi;

$baseApi = new BaseApi();
class SiswaController extends Controller
{
    protected $baseApi;
    public function __construct()
    {
        $this->baseApi = new BaseApi();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->baseApi->index('/api/siswa');
        $siswas = $data->json();

        return view('index')->with(['siswas' => $siswas['data']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=[
            'nis' => $request->nis,
            'nama' => $request->nama,
            'rombel' => $request->rombel,
        ];

        $response = $this->baseApi->create('/api/siswa/create', $data);
            if($response->failed()){
                $errors = $response->json('data');
                return redirect()->back()->with(['errors' => $errors]);
            }

        return redirect('/')->with('success', 'Success add new student to API!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ['id' => $id];
        $response = $this->baseApi->show('/api/siswa/show/'.$id, $data);

        return view('edit')->with('data', $response['data']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'nis' => $request->nis,
            'nama' => $request->nama,
            'rombel' => $request->rombel
        ];
        $response = $this->baseApi->update('/api/siswa/update/'.$id, $data);

        if ($response->failed()) {
            $errors = $response->json('data');
            return redirect()->back()->with('errors', $errors['errorInfo'][2]);
        }else {
            return redirect('/')->with('success', 'Berhasil mengubah data siswa dari API');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ['id' => $id];
        $response = $this->baseApi->destroy('/api/siswa/delete/' . $id, $data);

        if ($response->failed()) {
            $errors = $response->json('data');
            return redirect()->back()->with('errors', $errors['errorInfo'][2]);
        }else {
            return redirect('/')->with('success', 'Berhasil menghapus data');
        }
    }


}
