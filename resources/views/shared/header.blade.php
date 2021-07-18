
      <header class="c-header c-header-light c-header-fixed">
         
        <ul class="c-header-nav ml-auto mr-4">
          <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <div class="c-avatar">
                <svg class="c-icon">
                    <use xlink:href="{{url('/icons/sprites/free.svg#cil-menu')}}"></use>
                </svg>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">
              <div class="dropdown-header bg-light py-2"><strong>Tasks</strong></div>
              <span class="dropdown-item" data-toggle="modal" data-target="#createTaskModal" style="cursor: pointer;">
                <svg class="c-icon mr-2">
                  <use xlink:href="{{ url('/icons/sprites/free.svg#cil-plus') }}"></use>
                </svg> New Task<span class="badge badge-info ml-auto"></span>
              </span>
              <a class="dropdown-item" href="{{route('home')}}">
                <svg class="c-icon mr-2">
                  <use xlink:href="{{ url('/icons/sprites/free.svg#cil-task') }}"></use>
                </svg> All Tasks<span class="badge badge-success ml-auto"></span>
              </a>
              <a class="dropdown-item" href="{{route('create-storage')}}">
                <svg class="c-icon mr-2">
                  <use xlink:href="{{ url('/icons/sprites/free.svg#cil-folder') }}"></use>
                </svg> Create Storage Folder<span class="badge badge-info ml-auto"></span>
              </a>
            </div>
          </li>
        </ul>
    </header>
    <livewire:create-task />