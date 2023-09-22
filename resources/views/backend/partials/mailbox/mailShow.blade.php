<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#showMail{{ $mailbox->id }}">
    show
</button>

<!-- Modal -->
<div class="modal fade" id="showMail{{ $mailbox->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="showMail{{ $mailbox->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4 fw-bold" id="showMail{{ $mailbox->id }}Label">{{ $mailbox->subject }}</h1>
                <form action="{{ route('mailbox.read', [$mailbox]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </form>
            </div>
            <div class="modal-body">
                <h3><b>Subject:</b> {{ $mailbox->subject }}</h3>
                <h3><b>Sent By:</b> {{ $mailbox->name }}</h3>
                <h3><b>From:</b> {{ $mailbox->email }}</h3>
                <h3>
                    <b>About: </b>{{ $mailbox->message }}
                </h3>
            </div>
        </div>
    </div>
</div>
