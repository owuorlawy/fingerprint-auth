<?php

namespace App\Livewire;

use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class FingerprintAuth extends Component
{
    public $userId;
    public $fingerprintData;
    public $authenticated = false;
    public $errorMessage;

    protected $fingerprintService;
    
    /**
     * Initializing the Fingerprint Service
     */
    public function mount(FingerprintService $fingerprintService)
    {
        $this->fingerprintService = $fingerprintService;
    }

    public function authenticate()
    {
        // Apply rate limiting
        if (!RateLimiter::tooManyAttempts('fingerprint_auth', 5)) 
        {
            if ($this->fingerprintService->authenticate($this->userId, $this->fingerprintData)) 
            {
                $this->authenticated = true;
                return redirect()->intended('dashboard');
            } else {
                // Authentication failed
                $this->errorMessage = 'Fingerprint authentication failed. Please try again.';
                //return to page
                return back()->withErrors(['fingerprint' => 'Fingerprint authentication failed']);
            }
        } else {
            // Rate limit exceeded
            $this->errorMessage = 'Too many attempts. Please try again later.';
        }
    }

    public function render()
    {
        return view('livewire.fingerprint-auth');
    }
   
}
