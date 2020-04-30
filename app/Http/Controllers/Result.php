<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ads;

class Result extends Controller
{
    public function showResult()
    {
        $allAds = Ads::paginate(10);
        $this->data['allAds'] = Ads::paginate(10);
        return view('result', $this->data);
    }
}
