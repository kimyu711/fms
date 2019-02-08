{{\App\Facades\XeFrontend::js(\XpressenginePlugin\XePlugin\Fms\Plugin::asset('assets/index.js'))->load()}}
<div class="title">{{ $title }}</div>
<div id="vue-container">
    <test-component></test-component>
</div>

{!! uio('board@tag') !!}

