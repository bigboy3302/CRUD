<?php

require_once 'models/Blog.php';

class BlogController {

    // Rādīt visus ierakstus
    public function index() {
        $posts = Blog::all();
        require "views/blog/index.view.php";
    }

    // Parādīt veidlapu jaunam ierakstam
    public function create() {
        require "views/blog/create.view.php";
    }

    // Saglabāt jaunu ierakstu
    public function store() {
        if ($_POST) {
            Blog::create($_POST);  // Saglabā jaunu ierakstu
            header("Location: /");  // Pāradresē uz galveno lapu pēc saglabāšanas
        }
    }

    // Parādīt veidlapu ieraksta rediģēšanai
    public function edit($id) {
        $post = Blog::find($id);  // Iegūst ierakstu pēc ID
        require "views/blog/edit.view.php";  // Pārnēsā ierakstu uz rediģēšanas skatu
    }

    // Saglabāt rediģēto ierakstu
    public function update($id) {
        if ($_POST) {
            $post = Blog::find($id);
            $post->content = $_POST['content'];  // Atjaunina ieraksta saturu
            $post->save();  // Saglabā izmaiņas
            header("Location: /");  // Pāradresē uz galveno lapu
        }
    }



public function destroy($id) {
    // Izdzēst ierakstu no datu bāzes
    Blog::delete($id);
    // Pāradresēt uz sākuma lapu
    header("Location: /");
    exit();
}

    
    
}
