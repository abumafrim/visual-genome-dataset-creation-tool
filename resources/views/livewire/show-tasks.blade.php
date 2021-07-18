<div class="col-md-10">
  <div class="card">
    <div class="card-header">Genome Annotation Tasks</div>
    <div class="card-body">

      <table class="table table-responsive-sm table-hover table-outline mb-0">
      	<tr>
      		<td class="col-2 align-top" wire:click="changeCreate" style="cursor: pointer;">
      			<i>Create New Task...</i>
			</td>
      	</tr>
      	<tr class="collapse @if ($showCreate) show @endif" id="collapseCreate">
      		<td>
      			<div class="row">
		                <div class="col-sm-6">
		                  <div class="form-group row">
		                                <label class="col-md-4 col-form-label" for="text-input">Task Name</label>
		                                  <input class="col-md-8 form-control" type="text" wire:model="name" placeholder="Enter task name" required>
		                                @error('name') <div class="invalid-tooltip"> {{ $message }} </div> @enderror
		                              </div>
		                              <div class="form-group row">
		                                <label class="col-md-4 col-form-label" for="text-input">Source Language</label>
		                                  <input class="col-md-8 form-control" type="text" wire:model="srclang" placeholder="Enter source language">
		                                @error('srclang') <div class="invalid-tooltip"> {{ $message }} </div> @enderror
		                              </div>
		                              <div class="form-group row">
		                                <label class="col-md-4 col-form-label" for="text-input">Target Language</label>
		                                  <input class="col-md-8 form-control" type="text" wire:model="tgtlang" placeholder="Enter target language">
		                                @error('tgtlang') <div class="invalid-tooltip"> {{ $message }} </div> @enderror
		                              </div>
		                              <div class="form-group row">
		                                <label class="col-md-4 col-form-label" for="text-input">Translation System</label>
		                                  <input class="col-md-8 form-control" type="text" wire:model="gensystem" placeholder="Enter translation system">
		                                @error('gensystem') <div class="invalid-tooltip"> {{ $message }} </div> @enderror
		                              </div>
		                              <div class="form-group row">
		                                <label class="col-md-4 col-form-label">Task text file</label>
		                                  <input class="col-md-8" type="file" wire:model="datafile">
		                              </div>
		                            <div class="form-group row">
		                                <label class="col-md-4 col-form-label">Task image files</label>
		                                  <input class="col-md-5" type="file" wire:model="photos" multiple>
		                                  <div class="col-md-3" wire:loading wire:target="photos">Uploading...</div>
		                              </div>
		                  	      <div class="footer">
		                  	      	<button class="btn btn-sm btn-primary" wire:click="createTask" wire:loading.attr="disabled">
		                  	      		Create
		                  	      	</button>
		                  	        
		                  	      	<button class="btn btn-sm btn-danger" wire:click="closeCreate">Cancel</span>
		                  	      </div>
		                  </div>
		            </div>
	            </div>
      		</td>
      	</tr>
      </table>
      <table class="table table-responsive-sm table-hover table-outline mb-0">
        <thead class="thead-light">
          <tr>
            <th class="col-1 text-center align-center">Delete</th>
            <th class="col-3 align-center">Task</th>
            <th class="col-1 align-center">Source</th>
            <th class="col-1 align-center">Target</th>
            <th class="col-1 align-center">Translator</th>
            <th class="col-3 align-center">% Completed</th>
            <th class="col-1 text-center align-center">Last Annotated</th>
            <th class="col-1 text-center align-center">Export</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($tasks as $task)
	          <tr>
	            <td class="col-1 text-center">
	              <div class="c-avatar" style="cursor: pointer;" wire:click="remove({{$task->id}})">
	                <svg class="c-icon">
	                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-x-circle"></use>
	                </svg>
	              </div>
	            </td>
	            <td class="col-3">
	              <div><span class="tooltip-test" title="Task" style="cursor: pointer;"><a href="{{route('task', ['task' => $task])}}"> {{$task->name}}</a></span></div>
	              <div class="small text-muted">Registered: {{Carbon\Carbon::parse($task->created_at)->format('H:i:s F j, Y')}}</div>
	            </td>
	            <td class="col-1">
	                {{$task->srclang}}
	            </td>
	            <td class="col-1">
	                {{$task->tgtlang}}
	            </td>
	            <td class="col-1">
	                {{$task->gensystem}}
	            </td>
	            <td class="col-3">
	              <div class="clearfix">
	                <div><strong>{{round($task->entries()->where('manualtext', '<>', "")->count() / $task->entries()->get()->count() * 100, 2)}}%</strong></div>
	                <div><small class="text-muted">{{Carbon\Carbon::parse($task->created_at)->format('H:i:s F j, Y')}} - {{Carbon\Carbon::parse($task->entries()->latest('updated_at')->first()->updated_at)->format('H:i:s F j, Y')}}</small></div>
	              </div>
	              <div class="progress progress-xs">
	                <div class="progress-bar bg-success" role="progressbar" style="width: {{$task->entries()->where('manualtext', '<>', "")->count() / $task->entries()->get()->count() * 100}}%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
	              </div>
	            </td>
	            <td class="col-1 text-center">
	              <strong>
	              	{{$task->entries()->latest('updated_at')->first()->updated_at->diffForHumans()}}
	              </strong>
	            </td>
	            <td class="col-1 text-center">
        		      <span class="dropdown-item" style="cursor: pointer;" wire:click="exportall({{$task->id}})">
        		      	<svg class="c-icon mr-2">
        		          <use xlink:href="{{ url('/icons/sprites/free.svg#cil-arrow-thick-bottom') }}"></use>
        		        </svg>
        		      </span>
	            </td>
	          </tr>
	        @endforeach
        </tbody>
      </table>
      <livewire:create-task />
  </div>
</div>