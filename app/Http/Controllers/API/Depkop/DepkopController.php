<?php

namespace App\Http\Controllers\API\Depkop;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepkopController extends Controller
{
    public function __construct()
    {
        $this->url = "http://nik.depkop.go.id:8080/api";
    }

    public function cooperative_summary ()
    {
        $url = $this->url . '/product/rekapkoperasisummary.php';
        $data = $this->get_content($url, 'success get cooperative summary data');
        return $data;
    }

    public function rekap_jenis_koperasi()
    {
        $url = $this->url . '/product/rekapjeniskoperasi.php';
        $data = $this->get_content($url, 'success get rekap jenis koperasi data');
        return $data;
    }

    public function rekap_bentuk_koperasi()
    {
        $url = $this->url . '/product/rekapbentukkoperasi.php';
        $data = $this->get_content($url, 'success get rekap bentuk koperasi data');
        return $data;
    }

    public function rekap_pengesahan()
    {
        $url = $this->url . '/product/rekappengesahan.php';
        $data = $this->get_content($url, 'success get rekap pengesahan data');
        return $data;
    }

    public function parameter_date()
    {
        $url = $this->url . '/product/parameterdate.php';
        $data = $this->get_content($url, 'success get parameter date data');
        return $data;
    }

    public function get_content($url, $messaage)
    {
        $data = file_get_contents($url);
        $data = json_decode($data);
        return ResponseFormatter::success($data, $messaage);
    }
}
