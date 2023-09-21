<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userUpdate{{$user->id}}">
    Update User
</button>

<!-- Modal -->
<div class="modal fade" id="userUpdate{{$user->id}}" tabindex="-1" aria-labelledby="userUpdate{{$user->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="userUpdate{{$user->id}}Label">Update User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <form action="" method="POST">
                    @csrf
                    @method("PUT")
                    <button type="submit"></button>
                </form> --}}
            </div>
        </div>
    </div>
</div>
