@if (!$highlights->isEmpty())
<div class="border-t border-gray-200 mt-10 pt-10">
   <h3 class="text-sm font-medium text-gray-900">Highlights</h3>
   <div class="mt-4 prose prose-sm text-gray-500">
      <ul role="list">
         @foreach($highlights as $highlight)
            <li>{{ $highlight->content }}</li>
         @endforeach
      </ul>
   </div>
</div>
@endif