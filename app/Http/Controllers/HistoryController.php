<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
       
        $allHistories = [
            [
                'id' => 1,
                'title' => 'Pelatihan Daur Ulang Organik',
                'date' => '8 Juli 2025',
                'status' => 'pending',
            ],
            [
                'id' => 2,
                'title' => 'Volunteer Greenovation Batch 2',
                'date' => '9 Juli 2025',
                'status' => 'success',
            ],
            [
                'id' => 3,
                'title' => 'Workshop Energi Terbarukan',
                'date' => '10 Juli 2025',
                'status' => 'success',
            ],
            [
                'id' => 4,
                'title' => 'Seminar Lingkungan Hijau',
                'date' => '11 Juli 2025',
                'status' => 'success',
            ],
            [
                'id' => 5,
                'title' => 'Kampanye Save The Earth',
                'date' => '12 Juli 2025',
                'status' => 'pending',
            ],
            
        ];

       
        $page = $request->get('page', 1);

        
        $perPage = 4;

     
        $items = array_slice($allHistories, ($page - 1) * $perPage, $perPage);

        $histories = new LengthAwarePaginator(
            $items,
            count($allHistories),
            $perPage,
            $page,
            ['path' => url()->current()]
        );

        return view('member.history.index', compact('histories'));
    }

   public function show($id)
{
   
    $history = (object) [
        'id' => $id,
        'status' => $id == 1 ? 'pending' : 'success',
        'event_name' => $id == 1 ? 'Pelatihan Daur Ulang Organik' : 'Volunteer Greenovation Batch 2',
        'email' => 'johndoe@gmail.com',
        'nama' => 'John Doe', 
        'instansi' => 'Massachusetts Institute of Technology',
        'usia' => 25,
        'telepon' => '0812345678910',
        'penyakit' => '-',
        'payment_proof' => 'images/payment-proof.png',
    ];

    return view('member.history.detail', compact('history'));
}


}
