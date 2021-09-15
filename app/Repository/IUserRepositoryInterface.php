<?php
namespace App\Repository;

use App\Models\User;
use App\Repository\IEloquentRepositoryInterface;
use Illuminate\Support\Collection;

interface IUserRepositoryInterface extends IEloquentRepositoryInterface
{



    public function all(): Collection;



}





















?>
