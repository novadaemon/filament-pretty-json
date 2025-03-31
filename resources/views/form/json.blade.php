@php
    $itemIsCopyable = $isCopyable($state);
    $copyableState = $getCopyableState($state);
    $copyMessage = $getCopyMessage($state);
    $copyMessageDuration = $getCopyMessageDuration($state);
@endphp

<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div x-data="{
        state: $wire.entangle('{{ $getStatePath() }}'),
        get prettyJson() {
            json = JSON.parse(this.state != undefined ? this.state : '{}')
            return window.prettyPrint(json)
        }
    }" class="min-w-0 flex-1 relative">
        @if ($itemIsCopyable && $copyableState)
            <button type="button" class="copy-button"
                x-on:click="window.navigator.clipboard.writeText(@js($copyableState))
                $tooltip(@js($copyMessage), {
                    theme: $store.theme,
                    timeout: @js($copyMessageDuration),
                    })">
                <x-filament::icon icon="heroicon-o-document-duplicate" />
            </button>
        @endif

        <pre class="prettyjson" x-html="prettyJson">
        </pre>
    </div>
</x-dynamic-component>
