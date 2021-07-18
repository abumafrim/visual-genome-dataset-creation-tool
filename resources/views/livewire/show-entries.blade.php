<table class="table table-responsive-sm table-hover table-outline mb-0">
        <thead class="thead-light">
          <tr>
          	<th class="col-1 text-center">S/N</th>
          	<th class="col-1 text-center">id</th>
            <th class="col-4">Image</th>
            <th class="col-3">{{$task->srclang}}</th>
            <th class="col-3">{{$task->tgtlang}} (edit 
	            	<svg class="c-icon">
	                    <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-pencil"></use>
	                </svg>&nbsp or accept
	                <svg class="c-icon">
	                    <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-thumb-up"></use>
	                </svg> translation)</th>
            <th class="col-1 text-center">Activity</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($entries as $index => $entry)
	          <tr>
	          	<td class="col-1 text-center align-top">
	              {{$entries->perPage()*($entries->currentPage() - 1) + $index + 1}}
	            </td>
	          	<td class="col-1 text-center align-top">
	              {{$entry->imageid}}
	            </td>
	            <td class="col-4 align-top">
	              <div>
	                <img src="/storage/photos/{{$entry->imageid}}.jpg" width="100%" height="100%">
	              </div>
	            </td>
	            <td class="col-3 align-top">
	              {{$entry->srctext}}
	            </td>
	            <td class="col-3 align-top">
	            	<strong>Machine Generated Translation:</strong>
	            	<svg class="c-icon" style="cursor: pointer;" wire:click="changeAnnotate({{$entry['id']}})">
	                    <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-pencil"></use>
	                </svg>&nbsp
	                <svg class="c-icon" style="cursor: pointer;" wire:click="acceptThis({{$entry['id']}})">
	                    <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-thumb-up"></use>
	                </svg>
	                <br>{{$entry->tgttext}}
	            	<br><br>
	            	<strong>Manual Translation:</strong>
	                <br>{{$entry->manualtext}}
		            <div class="row">
		            	<div class="collapse @if ($showAnnotate && $editAnnotate === $entry['id']) show @endif" id="collapseAnnotate">
			                <div class="col-sm-12">
			                  <div class="form-group">
			                  	<textarea class="form-control" wire:model.lazy="updateAnnotate.{{$entry['id']}}" rows="2" placeholder="Give annotation" class="col-12">{{$entry->manualtext}}</textarea>
			                  	<div>
			                  		<span class="btn btn-sm btn-primary" wire:click="annotateThis({{$entry['id']}})" style="cursor: pointer;">
			                  			Annotate
			                  		</span>
			                  		<span class="btn btn-sm btn-danger" wire:click="closeAnnotate" style="cursor: pointer;">Cancel</span>
			                  	</div>
			                  </div>
			                </div>
			            </div>
		            </div>
	            </td>
	            <td class="col-1 text-center align-top">
	              <div class="small text-muted">Last annotated</div>
	              <strong>
	              	@if ($entry->created_at->eq($entry->updated_at))
	              		Not yet
	              	@else
	              		{{$entry->updated_at->diffForHumans()}}
	              	@endif
	              </strong>
	            </td>
	          </tr>

	        @endforeach
	        <tr>
		  		<td colspan="6">
		  			{{$entries->links()}}
		  		</td>
		  	</tr>
        </tbody>
      </table>