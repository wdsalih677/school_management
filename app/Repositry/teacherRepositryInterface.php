<?php
namespace App\Repositry;

interface teacherRepositryInterface{

    public function getTeacher();

    public function getGender();

    public function getSpecialty();
    
    public function setTeacher($request);
}