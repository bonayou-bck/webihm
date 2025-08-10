<div>
    <div class="">
        <button wire:click.prevent="add()">Add</button>
    </div>
    
    @foreach($count as $k => $v)

        <div class="card" wire:key="form-{{$k}}">
            <div class="card-body">
                <button wire:click.prevent="remove({{$k}})">Remove {{$k}}</button>
                {{-- name --}}
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <div>
                            <label for="basiInput" class="form-label">Name (ID)</label>
                            <input type="text" maxlength="200" required class="form-control"
                                placeholder="Masukkan nama sertifikat"
                                wire:model.defer="inputs.{{$k}}.email">
                            <div id="passwordHelpBlock" class="form-text">
                                0/200
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <label for="basiInput" class="form-label">Name (EN)</label>
                            <input type="text" maxlength="200" required class="form-control"
                                placeholder="Enter certificate name">
                            <div id="passwordHelpBlock" class="form-text">
                                0/200
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end of name --}}
        
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <label for="descId" class="form-label">Description (ID)</label>
                            <textarea class="form-control" id="descId" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <label for="descEn" class="form-label">Description (EN)</label>
                            <textarea class="form-control" id="descEn" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
</div>

