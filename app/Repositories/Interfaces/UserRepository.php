<?php
namespace App\Repositories\Interfaces;

interface UserRepository
{
    function login($params);
    function sign_up($params);
}
