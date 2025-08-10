{{-- @livewire('certificate-form') --}}

@if (session('status-certificate'))
    @php $sess = session('status-certificate')@endphp

    @if ($sess['code'] == 400)
        <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
            <i class="ri-error-warning-line me-3 align-middle"></i> <strong>Error</strong> - Failed to create certificate
            <div>
                <small class="">
                    <code>
                        {{ $sess['err'] }}
                    </code>
                </small>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($sess['code'] == 200)
        <div class="alert alert-success alert-border-left alert-dismissible fade show" role="alert">
            <i class="ri-error-warning-line me-3 align-middle"></i> <strong>Success</strong> - {{ $sess['message'] }}
            @if (isset($sess['errData']))
                <div>
                    <small class="">
                        <code>
                            {{ $sess['err'] }}
                        </code>
                    </small>
                </div>
                @foreach ($sess['errData'] as $errData)
                    <div>
                        <small class="">
                            <code>
                                - {{ $errData }}
                            </code>
                        </small>
                    </div>
                @endforeach
            @endif
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endif

{{-- {{ json_encode($dataCertificate) }} --}}

<form
    action={{ $mode == 'edit' ? route('certificate.update') . '/' . $dataCertificate->id : route('certificate.create') }}
    method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Certificate name & description</h6>
                </div>
                <div class="card-body">

                    {{-- name --}}
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div>
                                <label for="basiInput" class="form-label">Name (ID)</label>
                                <input type="text" maxlength="200" required class="form-control"
                                    placeholder="Masukkan nama sertifikat" name="name_id"
                                    value="{{ $mode == 'edit' ? $dataCertificate->name_id : '' }}">
                                <div id="passwordHelpBlock" class="form-text">
                                    0/200
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label for="basiInput" class="form-label">Name (EN)</label>
                                <input type="text" maxlength="200" required class="form-control"
                                    placeholder="Enter certificate name" name="name_en"
                                    value="{{ $mode == 'edit' ? $dataCertificate->name_en : '' }}">
                                <div id="passwordHelpBlock" class="form-text">
                                    0/200
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end of name --}}

                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div>
                                <label for="descId" class="form-label">Description (ID)</label>
                                <textarea class="form-control" id="descId" rows="3" name="description_id">{{ $mode == 'edit' ? $dataCertificate->description_id : '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label for="descEn" class="form-label">Description (EN)</label>
                                <textarea class="form-control" id="descEn" rows="3" name="description_en">{{ $mode == 'edit' ? $dataCertificate->description_en : '' }}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <button type="button" id="btn-cancel"
                        class="btn btn-danger btn-sm btn-label waves-effect waves-light">
                        <i class="ri-close-line label-icon align-middle fs-16 me-2"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-success btn-sm btn-label waves-effect waves-light">
                        <i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Submit
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Certificate images</h6>
                    <small class="text-muted">
                        Max files 5
                    </small>
                </div>
                <div class="card-body">
                    @if ($mode == 'edit')
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <p class="m-0 p-0">Drop to trash to remove</p>
                            <div class="text-danger fs-4" id="trash-icon">
                                <i class="ri-delete-bin-6-line" 
                                    ondrop="onDrop(event)" 
                                    ondragover="allowDrop(event)"
                                    ondragleave="dragLeave(event)"></i>
                            </div>
                        </div>
                        <style>
                            #trashWrapper { max-height: 50px; }
                            #trashWrapper img{ width: 40px !important; height: 40px !important; object-fit: contain; background: #ffffff; }
                            #trash-icon { transition: .3s all; }
                        </style>
                        <div class="bg-danger-subtle mb-3 row gx-2 d-flex justify-content-end" id="trashWrapper"></div>
                        <input type="text" name="image_to_remove" value="" hidden>

                        <div class="mb-3 row gx-2 gy-2" id="imgPreviewWrapper">
                            @foreach ($dataCertificate->images as $dcImg)
                                <img class="col-6" 
                                    src="{{ url($dcImg->src) }}" alt=""
                                    draggable="true"
                                    ondragstart="onDrag(event)"
                                    data-id="{{ $dcImg->id }}"
                                    id="img-{{ $dcImg->id }}" >
                            @endforeach
                        </div>
                        <p>Drop new images to update</p>
                    @endif
                    <div>
                        <input type="file" class="filepond filepond-input-multiple" multiple name="photo[]"
                            data-allow-reorder="true" data-max-file-size="3MB" data-max-files="5">
                    </div>
                </div>
            </div>
        </div>
</form>
</div>

@push('script-certificate-form')
    <script>
        const locationInput = document.getElementById('location-map-input');
        const locationPreview = document.getElementById('location-preview');
        const cancelBtn = document.getElementById('btn-cancel');

        cancelBtn.addEventListener('click', function() {
            Swal.fire({
                title: 'Are you sure to leave?',
                text: "Your progress will be lost",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                cancelButtonClass: 'btn btn-danger w-xs mt-2',
                buttonsStyling: false,
                showCloseButton: true
            }).then(function(result) {
                if (result.value) {
                    location.replace('/certificate');
                }
            });
        });

        // dnd
        function allowDrop(e) {
            e.preventDefault();
            document.getElementById('trash-icon').style.transform = 'rotate(20deg)';
        }

        function dragLeave(e) {
            e.preventDefault();
            document.getElementById('trash-icon').style.transform = 'rotate(0deg)';
        }

        function onDrag(e) {
            e.dataTransfer.setData('text', e.target.id);
            // document.getElementById('trash-icon').sty
        }

        function onDrop(e) {
            e.preventDefault();
            const data = e.dataTransfer.getData('text');
            const dragEl = document.getElementById(data);
            // append to trashWrapper
            const w = document.querySelector('#trashWrapper');
            console.log(dragEl);
            console.log(data);
            w.appendChild(dragEl);
            const removedId = document.querySelector('input[name=image_to_remove]');
            const _removedId = removedId.value.split(',').filter(elm => elm);
            _removedId.push(dragEl.dataset.id);
            removedId.value = _removedId.join(',');
            console.log(removedId.value);

            e.dataTransfer.clearData();
            document.getElementById('trash-icon').style.transform = 'rotate(0deg)';
        }

        document.querySelector('#trashWrapper').addEventListener('click', function(e) {
            const target = e.target.closest('img');
            
            if(target) {
                const _id = target.dataset.id;
                console.log(_id);
                document.getElementById('imgPreviewWrapper').appendChild(
                    target
                );
            }
        });
    </script>
@endpush
