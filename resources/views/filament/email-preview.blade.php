<div class="space-y-4">
    <div class="rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="bg-gray-50 dark:bg-gray-800 px-4 py-3 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-2 text-sm">
                <span class="font-semibold text-gray-500 dark:text-gray-400 w-16">To:</span>
                <span class="text-gray-700 dark:text-gray-300">client@example.com</span>
            </div>
            <div class="flex items-center gap-2 text-sm mt-1">
                <span class="font-semibold text-gray-500 dark:text-gray-400 w-16">From:</span>
                <span class="text-gray-700 dark:text-gray-300">pepperinsalt@gmail.com</span>
            </div>
            <div class="flex items-center gap-2 text-sm mt-1">
                <span class="font-semibold text-gray-500 dark:text-gray-400 w-16">Subject:</span>
                <span class="text-gray-700 dark:text-gray-300">{{ $template->subject }}</span>
            </div>
        </div>
        <div class="p-6 bg-white dark:bg-gray-900 prose dark:prose-invert max-w-none">
            {!! $template->body !!}
        </div>
    </div>

    @if($template->variables)
    <div class="rounded-lg bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-700 p-4">
        <p class="text-sm font-semibold text-amber-800 dark:text-amber-300 mb-2">Variables to fill in:</p>
        <div class="flex flex-wrap gap-2">
            @foreach($template->variables as $var)
                <code class="text-xs bg-amber-100 dark:bg-amber-800 text-amber-800 dark:text-amber-200 px-2 py-1 rounded">
                    {{ '{{' . $var['key'] . '}}' }}
                </code>
            @endforeach
        </div>
    </div>
    @endif
</div>
