<div>
    The current time is: {{ time() }}

    <button wire:click="$refresh">Refresh</button>
    <button type="button" wire:click="download">
        Download Invoice
    </button>
</div>
