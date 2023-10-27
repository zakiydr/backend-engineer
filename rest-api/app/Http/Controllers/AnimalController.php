<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = ["Buaya", "Kadal"];

    public function __construct() {

    }
    
    public function index() {
        echo "Menampilkan data animals";
        echo "<br>";
        foreach ($this->animals as $animal) {
            echo "$animal\n";
        }
    }

    public function store(Request $request) {
        // $animal = 'burung';
        $burung = $request->input('burung');
        array_push($this->animals, $burung);
        echo "Nama hewan: ".$burung;
        echo "<br>";
        echo "Menambahkan hewan baru";
        $this->index();
    }
    public function update(Request $request, $id) {
        $animal = 'bebek';
        $this->animals[$id-1] = $animal;
        echo "Mengupdate data hewan id $id";
        $this->index();
    }
    public function destroy($id) {
        unset($this->animals[$id-1]);
        echo "Menghapus data hewan id $id";
        $this->index();
    }
    
}
