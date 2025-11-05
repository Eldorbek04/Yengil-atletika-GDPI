<?php

namespace App\Http\Controllers;

use App\Models\BalandlikkasakrashModel;
use App\Models\BeshmingmModel;
use App\Models\Birmingbeshyuzmmodel;
use App\Models\Ikkiyuzmmodel;
use App\Models\skkizyuzmmodel;
use App\Models\Tortyuzmmodel;
use App\Models\UchmingmModel;
use App\Models\YadroModel;
use App\Models\yuzmmodel;
use App\Models\YzunlikkasakrashModel;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function yuzm()
    {
        $perPage = 10;
        $yuzm = yuzmmodel::query()
            ->orderBy('result', 'asc')
            ->orderBy('id', 'asc')
            ->paginate($perPage);
        return view('yuzm', compact('yuzm'));
    }

    public function yadro_itqidish()
    {
        $perPage = 10;
        $yadro = YadroModel::query()
        ->orderBy('result', 'desc') // Eng kattasi (eng yaxshi natija) tepada
        ->orderBy('id', 'asc') // Natijalar bir xil bo'lsa, ID bo'yicha saralash
        ->paginate($perPage);
        return view('yadro_itqidish', compact('yadro'));
    }

    public function uzunlikka_sakrash()
    {   $perPage = 10;
        $uzunlikkasakrash = YzunlikkasakrashModel::query()
        ->orderBy('result', 'desc') // Eng kattasi (eng yaxshi natija) tepada
        ->orderBy('id', 'asc') // Natijalar bir xil bo'lsa, ID bo'yicha saralash
        ->paginate($perPage);
        return view('uzunlikka_sakrash', compact('uzunlikkasakrash'));
    }

    public function uchmingm()
    {
        $perPage = 10;
        $uchmingm = UchmingmModel::query()
            ->orderBy('result', 'asc')
            ->orderBy('id', 'asc')
            ->paginate($perPage);
        return view('uchmingm' , compact('uchmingm'));
    }

    public function tortyuzm()
    {
        $perPage = 10;
        $tortyuzm = Tortyuzmmodel::query()
            ->orderBy('result', 'asc')
            ->orderBy('id', 'asc')
            ->paginate($perPage);
        return view('tortyuzm', compact('tortyuzm'));
    }

    public function sakkizyuzm()
    {
        $perPage = 10;
        $sakkizyuzm = skkizyuzmmodel::query()
            ->orderBy('result', 'asc')
            ->orderBy('id', 'asc')
            ->paginate($perPage);
        return view('sakkizyuzm' , compact('sakkizyuzm'));
    }

    public function ikkiyuzm()
    {
        $perPage = 10;
        $ikkiyuzm = Ikkiyuzmmodel::query()
            ->orderBy('result', 'asc')
            ->orderBy('id', 'asc')
            ->paginate($perPage);
        return view('ikkiyuzm', compact('ikkiyuzm'));
    }

    public function birmingbeshyuzm()
    {
        $perPage = 10;
        $birmingbeshyuzm = Birmingbeshyuzmmodel::query()
            ->orderBy('result', 'asc')
            ->orderBy('id', 'asc')
            ->paginate($perPage);
        return view('birmingbeshyuz' , compact('birmingbeshyuzm')); 
    }

    public function beshmingm()
    {
        $perPage = 10;
        $beshmingm = BeshmingmModel::query()
            ->orderBy('result', 'asc')
            ->orderBy('id', 'asc')
            ->paginate($perPage);
        return view('beshmingm' , compact('beshmingm'));
    }

    public function balandikka_sakrash()
    {
        $perPage = 10;
        $balandlikkasakrash = BalandlikkasakrashModel::query()
        ->orderBy('result', 'desc') // Eng kattasi (eng yaxshi natija) tepada
        ->orderBy('id', 'asc') // Natijalar bir xil bo'lsa, ID bo'yicha saralash
        ->paginate($perPage);
        return view('balandikka_sakrash', compact('balandlikkasakrash'));
    }

}
// <!--  26 Oktyabir 2025 Rayimjonov Eldorbek -->