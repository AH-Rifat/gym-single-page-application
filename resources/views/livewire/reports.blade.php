<div>
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list"
                            href="">Paid</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list"
                            href="">Dues Members</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list"
                            href="">Deactive Members</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list"
                            href="">Revenue</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            @include('livewire.reports.paid')
        </div>
    </div>
</div>
