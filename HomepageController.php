<?php

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $currentYear = date('Y');
        return view('Homepage.index', ['currentYear' => $currentYear, 'results' => []]);
    }

    public function calculate(Request $request)
    {
        $inflation = $request->input('inflation');
        $suma = $request->input('suma');

        $results = [];

        if (is_numeric($inflation) && is_numeric($suma)) {
            $inflation = $inflation / 100;
            $currentYear = date('Y');

            for ($i = 0; $i < 5; $i++) {
                $year = $currentYear + $i;
                $adjustedSuma = $suma * pow(1 + $inflation, $i);
                $results[$year] = $adjustedSuma;
            }
        } else {
            $results = ['error' => 'Invalid inputs'];
        }


        return view('Homepage.index', [
            'results' => $results,
            'currentYear' => $currentYear,
        ]);
    }
}
