{{-- Client managment--}}

@extends('master')

@section('page-title')
    NEPTUN {{ ucfirst( trans('navigation.verwaltung') )}}
@stop


@section('content')

<div class="row">
    
    <div class="col-xs-12">
        <div class="col-xs-12 box-wrapper box-white">
            
            <h2 class="title">NEPTUN-{{ ucfirst( trans('navigation.verwaltung') )}}</h2>
            
            <div class="box iso-category-overview">
                
                <ul class="level-1">
                    <li>
                        <a href="{{ url('empfangerkreis') }}">{{ ucfirst( trans('navigation.adressate') ) }}</a>
                    </li>
                    <li>
                        <a href="{{ url('dokument-typen') }}">{{ ucfirst( trans('navigation.document') ) }} {{ ucfirst( trans('navigation.types') ) }}</a>
                    </li>
                    <li>
                        <a href="{{ url('iso-kategorien') }}">{{ ucfirst( trans('navigation.iso') ) }} {{ trans('navigation.kategorien') }} </a>
                    </li>
                    <li>
                        <a href="{{ url('rollen') }}">{{ ucfirst( trans('navigation.rollenverwatung') ) }}</a>
                    </li>
                </ul>
               
                
            </div>

        </div>
    </div>
    
</div>

<div class="clearfix"></div> <br>

@stop
@section('afterScript')
            <!--patch for checking iso category document-->
          
                <script type="text/javascript">
                        var detectHref =window.location.href ;
                         setTimeout(function(){
                             if( $('a[href$="'+detectHref+'"]').parent("li").find('ul').length){
                                //  console.log('yeah');
                                  $('a[href$="'+detectHref+'"]').parent("li").find('ul').addClass('in');
                             }
                            
                         },1000 );
                </script>
                    <!-- End variable for expanding document sidebar-->
        @stop