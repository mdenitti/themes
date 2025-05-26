<div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Luggage Price Calculator</h2>
    
    <div class="mb-6">
        <label for="passengers" class="block text-sm font-medium text-gray-700 mb-1">Number of Passengers</label>
        <input 
            type="number" 
            id="passengers" 
            wire:model.live="passengers" 
            min="1" 
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        >
    </div>
    
    <div class="mb-6">
        <label for="checkedBaggage" class="block text-sm font-medium text-gray-700 mb-1">
            Checked Baggage Items per Passenger: <span class="font-bold">{{ $checkedBaggage }}</span>
        </label>
        <input 
            type="range" 
            id="checkedBaggage" 
            wire:model.live="checkedBaggage" 
            min="0" 
            max="3" 
            step="1"
            class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
        >
        <div class="flex justify-between text-xs text-gray-600 px-1">
            <span>0</span>
            <span>1</span>
            <span>2</span>
            <span>3</span>
        </div>
        <p class="text-sm text-gray-500 mt-1">Price: €{{ $checkedBaggagePrice }} per item</p>
    </div>
    
    <div class="mb-6">
        <label class="flex items-center">
            <input 
                type="checkbox" 
                wire:model.live="handBaggage" 
                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            >
            <span class="ml-2 text-sm font-medium text-gray-700">Hand Baggage (max 1 per passenger)</span>
        </label>
        <p class="text-sm text-gray-500 mt-1">Price: €{{ $handBaggagePrice }} per passenger</p>
    </div>
    
    <div class="p-4 bg-gray-100 rounded-lg">
        <div class="flex justify-between items-center">
            <span class="font-medium">Checked Baggage:</span>
            <span>{{ $passengers }} x {{ $checkedBaggage }} x €{{ $checkedBaggagePrice }} = €{{ $passengers * $checkedBaggage * $checkedBaggagePrice }}</span>
        </div>
        
        <div class="flex justify-between items-center mt-2">
            <span class="font-medium">Hand Baggage:</span>
            <span>{{ $handBaggage ? $passengers . ' x €' . $handBaggagePrice . ' = €' . ($passengers * $handBaggagePrice) : '€0' }}</span>
        </div>
        
        <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-300">
            <span class="text-lg font-bold">Total:</span>
            <span class="text-lg font-bold">€{{ $total }}</span>
        </div>
    </div>
</div>
