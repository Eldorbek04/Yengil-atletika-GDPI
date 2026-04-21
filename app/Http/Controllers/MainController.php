<?php

namespace App\Http\Controllers;

use App\Models\BalandlikkasakrashModel;
use App\Models\BeshmingmModel;
use App\Models\Birmingbeshyuzmmodel;
use App\Models\Ikkiyuzmmodel;
use App\Models\skkizyuzmmodel; // Model nomi kichik harf bilan bo'lsa, ehtiyot bo'ling
use App\Models\Tortyuzmmodel;
use App\Models\UchmingmModel;
use App\Models\YadroModel;
use App\Models\yuzmmodel;
use App\Models\YzunlikkasakrashModel;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Sahifadagi elementlar soni
     */
    protected $perPage = 10;

    public function index()
    {
        return view('index');
    }

    /**
     * Barcha sport turlari uchun umumiy filtr va pagination funksiyasi
     * * @param string $modelClass Modelning to'liq klass nomi
     * @param Request $request
     * @param string $sortOrder 'asc' (yugurish uchun) yoki 'desc' (sakrash/uloqtirish uchun)
     */
    private function getSportResults($modelClass, Request $request, $sortOrder = 'asc')
    {
        $query = $modelClass::query();

        // Gender bo'yicha filtr (male/female)
        if ($request->filled('gender') && in_array($request->gender, ['male', 'female'])) {
            $query->where('gender', $request->gender);
        }

        // Saralash va pagination
        // withQueryString() - URLdagi ?gender=male filtrini pagination linklarida ham saqlab qoladi
        return $query->orderBy('result', $sortOrder)
                     ->orderBy('id', 'asc')
                     ->paginate($this->perPage)
                     ->withQueryString();
    }

    // --- YUGURISH YO'NALISHLARI (Vaqt kam bo'lsa, natija yaxshi -> ASC) ---

    public function yuzm(Request $request)
    {
        $yuzm = $this->getSportResults(yuzmmodel::class, $request, 'asc');
        return view('yuzm', compact('yuzm'));
    }

    public function ikkiyuzm(Request $request)
    {
        $ikkiyuzm = $this->getSportResults(Ikkiyuzmmodel::class, $request, 'asc');
        return view('ikkiyuzm', compact('ikkiyuzm'));
    }

    public function tortyuzm(Request $request)
    {
        $tortyuzm = $this->getSportResults(Tortyuzmmodel::class, $request, 'asc');
        return view('tortyuzm', compact('tortyuzm'));
    }

    public function sakkizyuzm(Request $request)
    {
        $sakkizyuzm = $this->getSportResults(skkizyuzmmodel::class, $request, 'asc');
        return view('sakkizyuzm', compact('sakkizyuzm'));
    }

    public function birmingbeshyuzm(Request $request)
    {
        $birmingbeshyuzm = $this->getSportResults(Birmingbeshyuzmmodel::class, $request, 'asc');
        return view('birmingbeshyuz', compact('birmingbeshyuzm'));
    }

    public function uchmingm(Request $request)
    {
        $uchmingm = $this->getSportResults(UchmingmModel::class, $request, 'asc');
        return view('uchmingm', compact('uchmingm'));
    }

    public function beshmingm(Request $request)
    {
        $beshmingm = $this->getSportResults(BeshmingmModel::class, $request, 'asc');
        return view('beshmingm', compact('beshmingm'));
    }

    // --- TEXNIK YO'NALISHLAR (Masofa ko'p bo'lsa, natija yaxshi -> DESC) ---

    public function yadro_itqidish(Request $request)
    {
        $yadro = $this->getSportResults(YadroModel::class, $request, 'desc');
        return view('yadro_itqidish', compact('yadro'));
    }

    public function uzunlikka_sakrash(Request $request)
    {
        $uzunlikkasakrash = $this->getSportResults(YzunlikkasakrashModel::class, $request, 'desc');
        return view('uzunlikka_sakrash', compact('uzunlikkasakrash'));
    }

    public function balandikka_sakrash(Request $request)
    {
        $balandlikkasakrash = $this->getSportResults(BalandlikkasakrashModel::class, $request, 'desc');
        return view('balandikka_sakrash', compact('balandlikkasakrash'));
    }
}