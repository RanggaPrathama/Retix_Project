<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Http\Requests\StorePaymentsRequest;
use App\Http\Requests\UpdatePaymentsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = DB::table('payments')->select('*')->get();

        return view('pages.admin.table.payments.index',['payments'=>$payments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = [
            0 =>'Non Aktif',
            1 => 'Aktif',

        ];

        return view('pages.admin.table.payments.create',['status'=>$status]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'=>'required',
            'nomer' =>'required',
            'logo'=>'required',
            'status'=>'required',
            'gambar'=>'required'
        ]);

        $validatedData['slug']= Str::random(40);

        if($request->hasFile('logo')){
            $logo = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('logoPayment'),$logo);
            $validatedData['logo']= $logo;
        }

        if($request->hasFile('gambar')){
            $gambar = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('logoPayment'),$gambar);
            $validatedData['gambar']= $gambar;
        }
        $validatedData['created_at'] = now();

       $payments =  DB::table('payments')->insert($validatedData);

       if($payments){
        return redirect()->route('payment.index')->with('success','Berhasil !');
       }


    }

    /**
     * Display the specified resource.
     */
    public function show(Payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $status = [
            0 =>'Non Aktif',
            1 => 'Aktif',

        ];
        $payments = DB::table('payments')->where('slug',$slug)->first();
        return view('pages.admin.table.payments.update',['payments'=>$payments,'status'=>$status]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$slug)
    {
        $validatedData = $request->validate([
            'nama'=>'required',
            'nomer' =>'required',
            'logo'=>'required',
            'status'=>'required',
            'gambar'=>'required'
        ]);

        $gmbr = DB::table('payments')->where('slug',$slug)->first();
        if($request->hasFile('logo')){
            File::delete(public_path('logoPayment/'.$gmbr->logo));
            $logo = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('logoPayment'),$logo);
            $validatedData['logo']= $logo;

        }

        if($request->hasFile('gambar')){
            File::delete(public_path('logoPayment/'.$gmbr->gambar));
            $gambar = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('logoPayment'),$gambar);
            $validatedData['gambar']= $gambar;

        }

        $validatedData['updated_at']= now();

        $payments = DB::table('payments')->where('slug',$slug);

       $update =  $payments->update($validatedData);

        if($update){
            return redirect()->route('payment.index')->with('success','Berhasil !');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $gmbr = DB::table('payments')->where('slug',$slug)->first();
        File::delete(public_path('logoPayment/'.$gmbr->logo));
        File::delete(public_path('logoPayment/'.$gmbr->gambar));
        $payments = DB::table('payments')->where('slug',$slug);
        $payments->delete();
        return redirect()->route('payment.index')->with('success','Berhasil !');

    }
}
