<?php

namespace App\Http\Livewire\Admin\User;

use App\Mail\AccountCreated;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class RegeneratePassword extends Component
{

    public $user;

    public function mount(User $user) {
        $this->user = $user;
    }

    public function regenerate() {
        $password = Str::random(16);
        $this->user->password = Hash::make($password);
        $this->user->save();
        Mail::to($this->user)->send(new AccountCreated($this->user, $password));
    }

    public function render()
    {
        return view('livewire.admin.user.regenerate-password');
    }
}
