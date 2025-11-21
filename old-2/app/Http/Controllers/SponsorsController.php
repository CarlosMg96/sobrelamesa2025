<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SponsorsController extends Controller
{
    /**
     * Display the sponsors main page
     */
    public function index()
    {
        $user = auth()->user();

        $data = array(
            'user' => $user,
        );

        return view('sponsors.SponsorsMain', $data);
    }

    /**
     * Display the SEDI page
     */
    public function sedi()
    {
        $user = auth()->user();

        $data = array(
            'user' => $user,
        );

        return view('sponsors.sedi', $data);
    }

    /**
     * Display the WELLHUB page
     */
    public function wellhub()
    {
        $user = auth()->user();

        $data = array(
            'user' => $user,
        );

        return view('sponsors.wellhub', $data);
    }

    /**
     * Display the COME BIEN page
     */
    public function comebien()
    {
        $user = auth()->user();

        $data = array(
            'user' => $user,
        );

        return view('sponsors.comebien', $data);
    }

    /**
     * Display the ARTEMIGA page
     */
    public function artemiga()
    {
        $user = auth()->user();

        $data = array(
            'user' => $user,
        );

        return view('sponsors.artemiga', $data);
    }

    /**
     * Display the TAKO&TAKO page
     */
    public function takotako()
    {
        $user = auth()->user();

        $data = array(
            'user' => $user,
        );

        return view('sponsors.takotako', $data);
    }

    /**
     * Display the Clínica Dental page
     */
    public function clinicadental()
    {
        $user = auth()->user();

        $data = array(
            'user' => $user,
        );

        return view('sponsors.clinicadental', $data);
    }

    /**
     * Display the RULFO page
     */
    public function rulfo()
    {
        $user = auth()->user();

        $data = array(
            'user' => $user,
        );

        return view('sponsors.rulfo', $data);
    }

    /**
     * Display the YOSHIKI page
     */
    public function yoshimi()
    {
        $user = auth()->user();

        $data = array(
            'user' => $user,
        );

        return view('sponsors.yoshimi', $data);
    }

    /** 
     * Display the TEPPAN page
     */
    public function teppan()
    {
        $user = auth()->user();

        $data = array(
            'user' => $user,
        );

        return view('sponsors.teppan', $data);
    }

    /**
     * Display the AMADO page
     */
    public function amado()
    {
        $user = auth()->user();

        $data = array(
            'user' => $user,
        );

        return view('sponsors.amado', $data);
    }

    /**
     * Display the CLUB ATLÉTICO page
     */
    public function clubAtletico()
    {
        $user = auth()->user();

        $data = array(
            'user' => $user,
        );

        return view('sponsors.clubAtletico', $data);
    }
}
