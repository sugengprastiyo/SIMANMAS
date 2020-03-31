<?php

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }
    public function index()
    {
        // $urlApi = 'http://api.aladhan.com/v1/calendarByCity'; //Url API
        // $urlApi .= '?city=Malang'; // Ambil kota dari form submit
        // $urlApi .= '&country=ID'; // Negara set default Indonesia
        // $urlApi .= '&method=11'; // method ke aplikasi
        // /* 
        // 	method method untuk aplikasi
        // 	dokumentasi nya kunjungi https://aladhan.com/prayer-times-api#GetCalendarByCitys
        // 	*/
        // $urlApi .= '&month=' . date('m'); // Ambil bulan dari form submit
        // $urlApi .= '&year=' . date('Y'); // Ambil tahun dari form submit

        // $ch = curl_init(); //set curl
        // curl_setopt($ch, CURLOPT_URL, $urlApi);  // Ambil Data dari API Url
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // $output = curl_exec($ch);

        // $decodeData = json_decode($output); // decode data json dari api

        // curl_close($ch);

        // /* 
        // 	output dari $decodeData berupa array hari per bulan sekarang kita ganti ambil ke per hari
        // 	disini kita bisa sesuaikan sesuia dengan kebutuhan kita
        // 	*/

        // $dayNow = ltrim(date('d'), "0"); //hapus 0 di depan untuk mencocokan array hari dari $decodeData dan mengurangi hari karena di array di mulai dari 0
        // $data = array();

        // if (isset($decodeData->code) == 200) {
        //     $data['subuh'] = $decodeData->data[$dayNow]->timings->Fajr;
        //     $data['dzuhur'] = $decodeData->data[$dayNow]->timings->Dhuhr;
        //     $data['ashar'] = $decodeData->data[$dayNow]->timings->Asr;
        //     $data['magrib'] = $decodeData->data[$dayNow]->timings->Maghrib;
        //     $data['isya'] = $decodeData->data[$dayNow]->timings->Isha;
        //     $data['sunrise'] = $decodeData->data[$dayNow]->timings->Sunrise;
        //     $data['sunset'] = $decodeData->data[$dayNow]->timings->Sunset;
        //     $data['midnight'] = $decodeData->data[$dayNow]->timings->Midnight;
        //     $data['lokasi'] = 'Malang';
        //     $data['hijriah'] = $decodeData->data[$dayNow]->date->hijri->date;
        // } else {
        //     $data['subuh'] = "Tidak Tersedia";
        //     $data['dzuhur'] = "Tidak Tersedia";
        //     $data['ashar'] = "Tidak Tersedia";
        //     $data['magrib'] = "Tidak Tersedia";
        //     $data['isya'] = "Tidak Tersedia";
        //     $data['sunrise'] = "Tidak Tersedia";
        //     $data['sunset'] = "Tidak Tersedia";
        //     $data['midnight'] = "Tidak Tersedia";
        //     $data['lokasi'] = "Tidak Tersedia";
        //     $data['hijriah'] = "Tidak Tersedia";
        // }

        $data['title'] = 'Sistem Informasi Masjid';
        $data['aktifitas'] = $this->Home_model->get_all_aktifitas();
        $data['artikel'] = $this->Home_model->get_all_artikel();
        $data['masjid'] = $this->Home_model->get_all_masjid();
        $data['dokumentasi'] = $this->Home_model->get_all_dokumentasi();
        $this->load->view('template/header_user', $data);
        $this->load->view('home/index');
        $this->load->view('template/footer_user');
    }

    public function pnf404()
    {
        $this->load->view('404');
    }
}
