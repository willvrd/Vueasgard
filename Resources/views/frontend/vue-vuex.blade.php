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

        <prueba2></prueba2>

    </div>
    
</div>


@stop

@section('scripts')

@parent
{!!Theme::script('js/app.js?v='.config('app.version'))!!}

 <!-- VUEX  -->
<script src="https://unpkg.com/vuex@3.1.1/dist/vuex.js"></script>

<!-- Component Prueba - Need Publish -->
<script type="text/javascript" src="{!! Module::asset('vueasgard:js/components/Prueba2.js') !!}"></script>


<script type="text/javascript">

    const store = new Vuex.Store({
        state:{
            numero: 10
        },
        mutations:{
            aumentar(state){
                state.numero++;
            }
        }
    });

    const vue_index = new Vue({
        el: '#app',
        data: {
            mensaje: 'Pruebas con Vuex'
            
        },
    });

</script>

@stop