@extends('layouts.master')

@section('title')
    VueAsgard | @parent
@stop

@section('content')

{{-- Need Publish --}}
<link href="{!! Module::asset('vueasgard:css/base.css') !!}" rel="stylesheet" type="text/css" />


<div class="page vueasgard vueasgard-index">

    <div id="app">

        <div class="container">
            <div class="row">
                <h1>@{{mensaje}}</h1>
            </div>
        </div>

        <prueba></prueba>

    </div>
    
</div>


@stop

@section('scripts')

@parent
{!!Theme::script('js/app.js?v='.config('app.version'))!!}

<!-- Component Prueba - Need Publish -->
<script type="text/javascript" src="{!! Module::asset('vueasgard:js/components/Prueba.js') !!}"></script>


<script type="text/javascript">

    const vue_index = new Vue({
        el: '#app',
        data: {
            mensaje: 'Hola desde Vue'
            
        },
    });

</script>

@stop