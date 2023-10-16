<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div x-data="{
        state: $wire.entangle('{{ $getStatePath() }}'),
        get prettyJson() {
            json = JSON.parse(this.state)
            return window.prettyPrint(json)
        }
    }">
        <pre class="prettyjson" x-html="prettyJson"></span>
    </div>
</x-dynamic-component>
