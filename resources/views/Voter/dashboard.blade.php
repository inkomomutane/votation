@extends('layouts.app')

@push('css')
   <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach ($errors->all() as $erro)
                    <li class="list-group-item text-danger">
                        {{$erro}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

 <div class="card shadow mb-4 ">
            <div class="card-header py-3 bg-gradient-primary ">
              <strong>Mesa eletrónica de Voto.          </strong>     <a href="{{ route('resultados') }}" class="btn btn-success btn-circle btn-sm shadow-sm mr-4"><i class="fas fa-eye"></i>   Visualizar resultados</a>
                                
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nome do candidato</th>
                      <th>Votar</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if(Auth::user()['candidate_id'] !=0 || Auth::user()['candidate_id']!=null)
                       <tr>
                                <td>{{Auth::user()->candidate->name}}</td>
                                <td style="alert-success" class="alart-success col-2 mr-2">
                                    <a href="#" class="btn btn-success btn-circle btn-sm shadow-sm "><i class="fas fa-vote-yea"></i> Voto Confirmado</a>
                                </td>
                            </tr>
                      @else
                       @foreach ($candidates as $candidate)
                            <tr>
                                <td>{{$candidate->name}}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-circle btn-sm shadow-sm" onclick="update_cat({{$candidate->id}},{{ Auth::user()->id}},'{{$candidate->name}}')"><i class="fas fa-vote-yea"></i></a>
                                </td>
                            </tr>
                        @endforeach   
                      @endif
                    
                          
                               
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          {{--Modal of create and update category--}}


{{-- update category modal--}}

  <div class="modal fade" id="UpdateCategory" tabindex="-1" role="dialog" aria-labelledby="category" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-gradient-warning">
          <span class="font-weight-bold" id="category_up">Votar o candidato</span>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            
            <form name="Update_Category" id="category_update" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-12">
                        <input disabled id="category_update_name" type="text" name="name" class="form-control" placeholder="update candidate">
                    </div>
                </div>
            </form>

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-success"  onclick="event.preventDefault();document.getElementById('category_update').submit();">Votar</a>
        </div>
      </div>
    </div>
  </div>

{{--Modal of Delete category--}}




<div id="addNewAddonCategoryModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-gradient-danger">
                <h6 class="modal-title "><span class="font-weight-bold">Delete category</span></h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning container">Are you sure ?</div>
                <form action="" method="POST" id="deleteCat">
                    @method('DELETE')
                    @csrf

               
                <button type="submit" class=" btn btn-primary btn-sm" data-dismiss="modal">
                        No . go back
                </button>
                <input type="submit" class="btn btn-danger btn-sm" value="yes . delete">
                        
                 </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function delete_cat(id){
        var form = document.getElementById('deleteCat');
        form.action = 'dashboard/'+id;
        console.log(form);
        $('#addNewAddonCategoryModal').modal('show');
    };

    function update_cat(id,user,name) {
      console.log(user);

        var form  = document.getElementById('category_update');
        form.action = 'dashboard/'+user+'/'+id ;
        document.forms["Update_Category"]["name"].value = name;
        console.log(form);
        $('#UpdateCategory').modal('show');
    };


  




</script>

@endsection

@push('js')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endpush
