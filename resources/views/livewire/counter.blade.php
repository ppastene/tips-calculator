<div style="text-align: center">
    <button wire:click="increment">+</button>
    <h1>{{ $count }}</h1>
    <button wire:click="decrement">-</button>
    <input wire:model.debounce.500ms="message">
    {{$message}}
</div>
