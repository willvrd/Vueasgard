@extends('layouts.master')

@section('title')
    VueAsgard | @parent
@stop

@section('content')

{{-- Need Publish --}}
<link href="{!! Module::asset('vueasgard:css/base.css') !!}" rel="stylesheet" type="text/css" />


<div class="page vueasgard vueasgard-index">

    <div class="container">
        <div class="row">
            <h1 class="d-block">Index Module - /vueasgard/1</h1>
        </div>
    </div>
    
</div>


@stop

@section('scripts')

<script type="text/javascript">

    jQuery(document).ready(function($) {
        console.log("Hola desde Jquery");
    });

</script>

@stop