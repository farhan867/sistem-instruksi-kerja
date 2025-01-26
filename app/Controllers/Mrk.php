<?php

namespace App\Controllers;

use \App\Models\DataModel;
use \App\Models\BidangModel;

class Mrk extends BaseController
{
    protected $data;
    protected $bidang;

    public function __construct()
    {

        $this->data = new DataModel();
        $this->bidang = new BidangModel();
    }

    public function index()
    {

        // $query = $this->data->where(['status' => 'menunggu'])->findAll();
        $query = $this->data->getMrk();
        $data = [
            'menu' => 'Dashboard',
            'data' => $query,
            'divisi' => $this->bidang->getBidang(user()->username),
            'request' => \Config\Services::request(),
        ];
        return view('mrk/index', $data);
    }

    public function update()
    {
        $this->data->save([
            'id' => $this->request->getVar('setuju'),
            'status' => 'mmk',
        ]);
        if (empty($this->request->getVar('setuju'))) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('halaman tidak ditemukan.');
        }
        session()->setFlashdata('pesan', 'data berhasil dikirim ke MMK.');
        return redirect()->to('/mrk');
    }
    public function perbaiki()
    {

        $this->data->save([
            'id' => $this->request->getVar('id'),
            'status' => 'user',
            'pesan' => $this->request->getVar('pesan'),
        ]);
        if (empty($this->request->getVar('id'))) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('halaman tidak ditemukan.');
        }
        session()->setFlashdata('pesan', 'data berhasil dikirim kembali ke user.');
        return redirect()->to('/mrk');
    }

    public function cetak()
    {
        $data = [
            'data' => $this->data->getMrk($this->request->getVar('slug')),
        ];
        if (empty($this->request->getVar('slug'))) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('halaman tidak ditemukan.');
        }
        // dd($this->request->getVar('slug'));
        return view('data/cetak', $data);
    }
    public function docx()
    {
    }
    public function pdf()
    {
    }
}
