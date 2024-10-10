<?php

namespace App\Policies;

use App\Models\Pesansaran;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PesanSaranPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PesanSaran $pesanSaran)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PesanSaran $pesanSaran)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PesanSaran $pesanSaran)
    {
        // Logika otorisasi: misalnya hanya pemilik pesan yang dapat menghapusnya
        return $user->id === $pesanSaran->user_id;
    }
    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PesanSaran $pesanSaran)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PesanSaran $pesanSaran)
    {
        //
    }
}
