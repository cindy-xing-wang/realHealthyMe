<!-- Modal -->
<div class="modal fade" id="exampleModal{{$staff->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Staff info</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span>&times;</span>
           </button>
        </div>
        <div class="modal-body">
            <p>
                <img src="{{asset('images')}}/{{$staff->image}} " alt="staff image" width="200">
            </p>
            <p class="badge badge-pill badge-dark" >Role: {{$staff->role->name}} </p>
            <p>Name: {{$staff->name}}</p>
            <p>Phone: {{$staff->phone}}</p>
            <p>Address: {{$staff->address}}</p>
            <p>Education: {{$staff->education}}</p>
            <p>Profile description: {{$staff->description}}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>