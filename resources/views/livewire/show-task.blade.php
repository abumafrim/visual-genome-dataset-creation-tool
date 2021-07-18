@extends('base')

@section('content')

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Annotate</div>
        <div class="card-body">
          
        @livewire('show-entries', ['task' => $task])

        </div>
      </div>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/main.js') }}" defer></script>
@endsection