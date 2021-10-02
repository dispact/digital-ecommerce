<form wire:submit.prevent="submitReview" class="mt-1">
    <div class="flex">
        <select wire:model="stars" class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
            <option value="1">1 Star</option>
            <option value="2">2 Stars</option>
            <option value="3">3 Stars</option>
            <option value="4">4 Stars</option>
            <option value="5" selected>5 Stars</option>
        </select>
        <input class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300
            @error('content') border-red-500 @enderror" 
            placeholder="Write a review..."
            type="text" 
            wire:model="content"
        >
        <button type="submit" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded-r shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Submit
        </button>
    </div>
    @error('content')<span class="text-red-500 mt-2 text-sm">{{ $message }}</span>@enderror
</form>