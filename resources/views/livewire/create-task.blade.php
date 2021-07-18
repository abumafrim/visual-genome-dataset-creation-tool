<div class="modal fade" id="createTaskModal" tabindex="-1" role="dialog" aria-labelledby="createTaskModalLabel" aria-hidden="true" wire:ignore>
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="editAnnotation">Create New Task</h5>
	        <span class="close" data-dismiss="modal" aria-label="Close" style="cursor: pointer;">
	          <span aria-hidden="true">&times;</span>
	        </span>
	      </div>
	      <div class="modal-body">
            <div class="form-group row">
              <label class="col-md-4 col-form-label" for="text-input">Task Name</label>
              <div class="col-md-8">
                <input class="form-control" type="text" wire:model="name" placeholder="Enter task name" required>
              </div>
              @error('name') <div class="invalid-tooltip"> {{ $message }} </div> @enderror
            </div>
            <div class="form-group row">
              <label class="col-md-4 col-form-label" for="text-input">Source Language</label>
              <div class="col-md-8">
                <input class="form-control" type="text" wire:model="srclang" placeholder="Enter source language">
              </div>
              @error('srclang') <div class="invalid-tooltip"> {{ $message }} </div> @enderror
            </div>
            <div class="form-group row">
              <label class="col-md-4 col-form-label" for="text-input">Target Language</label>
              <div class="col-md-8">
                <input class="form-control" type="text" wire:model="tgtlang" placeholder="Enter target language">
              </div>
              @error('tgtlang') <div class="invalid-tooltip"> {{ $message }} </div> @enderror
            </div>
            <div class="form-group row">
              <label class="col-md-4 col-form-label" for="text-input">Translation System</label>
              <div class="col-md-8">
                <input class="form-control" type="text" wire:model="gensystem" placeholder="Enter translation system">
              </div>
              @error('gensystem') <div class="invalid-tooltip"> {{ $message }} </div> @enderror
            </div>
            <div class="form-group row">
              <label class="col-md-4 col-form-label" for="file-input">Task text file</label>
              <div class="col-md-8">
                <input type="file" wire:model="datafile">
              </div>
            </div>
          <div class="form-group row">
              <label class="col-md-4 col-form-label" for="file-multiple-input">Task image files</label>
              <div class="col-md-8">
                <input id="file-multiple-input" type="file" name="file-multiple-input" multiple="">
              </div>
            </div>
	      <div class="modal-footer">
	        <span class="btn btn-secondary" data-dismiss="modal">Cancel</span>
	        <span class="btn btn-danger" style="cursor: pointer;" wire:click="saveTask">Reset</span>
	        <span class="btn btn-primary" id="btnSubmit" style="cursor: pointer;" wire:click="saveTask">Save</span>
	      </div>
	    </div>
	  </div>
	</div>
    </div>
<script type="text/javascript">
    $('btnSubmit').click(function(){
    	$('createTaskModal').modal('hide');
    	return false;
	});
</script>