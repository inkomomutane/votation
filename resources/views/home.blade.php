@extends('layouts.app')

@section('content')
@push('css')
   <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@php
    $totalVotes = 0;   
@endphp

@foreach ($candidates as $candidate)
@php
     $totalVotes = $totalVotes +  $candidate->users->count();      
@endphp
  
@endforeach

<div class="container">

           <div class="col-md-3 col-lg-3 col-xl-3  col-sm-3 py-3">
        <div class="card m-b-30 user" style="border-radius: none alert-warning">
                   <ul class="list-group list-group-flush">
                        <li class="list-group-item user-card">
                        <div class="row">
                                <div class="col-sm-12">
                                  <small>{{ __('Total de Eleitores:') }}</small> &nbsp<strong>{{\App\User::all()->count()}}</strong>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item user-card"> <strong>{{ __('Total de Votos: ') }}</strong> {{ $totalVotes }}</li>
                      </ul>
                    </div>
                  <div class="card-body"></div>
        </div>

    <div class="row">
        @php
            $count = 0 ;
            $total = \App\User::all()->count();
        @endphp
    @foreach ($candidates->take(4) as $user)
        <div class="col-md-3 col-lg-3 col-xl-3  col-sm-3 py-3">
        <div class="card m-b-30 user" style="border-radius: none">
                   <ul class="list-group list-group-flush">
                        <li class="list-group-item user-card">
                        <div class="row">
                                <div class="col-sm-12">
                                  <small>{{ __('Candidato:') }}</small> &nbsp<strong>{{$user->name}}</strong>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item user-card"> <strong>{{ __('Posição: ') }}</strong> {{ ++$count }} &nbsp &nbsp &nbsp &nbsp  <strong>{{ __('Votos: ') }} </strong> &nbsp {{  $user->users->count()}}</li>
                      </ul>
                    </div>
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="progress">
                                <div class="progress-bar" style="width: @if($totalVotes ==0) 0%  @else {{  ($user->users->count()/$totalVotes)*100}}%; background:@if($count == 1)rgb(47, 164, 47)@endif @if($count == 2)#f7d104 @endif @if($count == 3)#f7a6ad @endif @if($count == 4)rgb(38, 180, 249)@endif @endif">
                                    <div class="progress-value"> @if($totalVotes ==0) 0%  @else  {{  ($user->users->count()/$totalVotes)*100}}% @endif</div>
                                </div>
                        </div>
                    </div>
                            
                  </div>                                    
        </div>
        </div> 
    @endforeach
    </div>



     <div class="card shadow mb-4 ">
            <div class="card-header py-3 bg-gradient-primary ">
              <strong>Mesa eletrónica de contagem de Voto.                            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nome do candidato</th>
                      <th>Votos</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                       @foreach ($candidates->skip(4) as $candidate)
                            <tr>
                                <td>{{$candidate->name}}</td>
                                <td>
                                    {{ $candidate->users->count() }}
                                </td>
                            </tr>
                        @endforeach   
        
                    
                          
                               
                  </tbody>
                </table>
              </div>
            </div>
          </div>
</div>



@endsection
@push('js')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endpush
