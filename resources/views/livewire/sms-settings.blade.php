<div>
    @include('toastrMgs')
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Sms Api Settings
                    </div>
                    <form wire:submit.prevent.lazy="save" method="post">
                        <div class="mb-3">
                            <label class="form-label">Api Key</label>
                            <input type="text" wire:model.lazy="apiKey" class="form-control @error('apiKey') is-invalid @enderror" placeholder="Enter Api Key">
                            @error('apiKey')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <input type="text" wire:model.lazy="textType" class="form-control @error('textType') is-invalid @enderror" placeholder="Enter Text type">
                            <small id="helpId" class="form-text text-muted">*text for normal SMS/unicode for Bangla
                                SMS</small>
                                @error('textType')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sender ID</label>
                            <input type="number" wire:model.lazy="senderId" class="form-control @error('senderId') is-invalid @enderror" placeholder="Enter Sender Number">
                            @error('senderId')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-borderless align-middle">
                            <tbody class="table-group-divider">
                                @forelse ($smsInfo as $item)
                                <tr>
                                    <td style="width:30%">Api Key</td>
                                    <td>{{ $item->api_key }}</td>
                                </tr>
                                <tr>
                                    <td style="width:10%">Text Type</td>
                                    <td>{{ $item->type }}</td>
                                </tr>
                                <tr>
                                    <td style="width:10%">Sender ID</td>
                                    <td>{{ $d =$item->sender_id }}</td>
                                </tr>
                                @empty
                                <h5 class="text-danger text-center">Please Save Your Api Settings.</h5>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="text-end">
                            
                            <button type="button" wire:click.prevent.lazy="delete" class="btn btn-danger">Delete</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
