<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div x-data="{
        state: $wire.entangle('{{ $getStatePath() }}'),
        get prettyJson() {
            json = JSON.parse(this.state)
            return window.prettyPrint(json)
        }
    }" class="min-w-0 flex-1">
        <pre class="prettyjson" x-html="prettyJson"></pre>
    </div>
</x-dynamic-component>
