<?php

namespace App\Services;

interface Service
{
    public function index();

    public function store($data);

    public function update($data);

    public function destroy($data);
}