@extends('base')

@section('content')

          <div class="container-fluid">
            <div class="fade-in">

              <div class="row justify-content-center">
                @livewire('show-task', ['task' => $task])
              </div>
              <!-- /.row-->
            </div>
          </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/main.js') }}" defer></script>
@endsection