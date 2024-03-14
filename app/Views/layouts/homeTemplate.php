<?php
    echo view('layouts/header');
    echo view('layouts/components/navbar', ['active' => $active]);
    echo view('layouts/components/carousel');
    echo view($vista);
    echo view('layouts/footer');