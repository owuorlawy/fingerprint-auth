<div>
    <input type="text" wire:model="userId" placeholder="Enter User ID">
    <input type="text" wire:model="fingerprintData" placeholder="Enter Fingerprint Data">
    <button wire:click="authenticate">Authenticate</button>
    
    @if($errorMessage)
        <div class="alert alert-danger">
            {{ $errorMessage }}
        </div>
    @endif
    
    @if($authenticated)
        <div class="alert alert-success">
            Authentication Successful
        </div>
    @endif
</div>
