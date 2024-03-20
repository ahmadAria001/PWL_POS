<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriControrller extends Controller
{
    function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }
}
