<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="card-title mb-0">Live In Video</h6>

        <button type="button" id="career-add" class="btn btn-primary btn-sm btn-label waves-effect waves-light"><i
                class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add</button>
    </div>
    <div class="card-body pb-0">
        <div class="team-list grid-view-filter row">

            @if ($slideData)

                @isset($slideData['career'])
                    @foreach ($slideData['career']['career'] as $key => $data)
                        <div class="col">
                            <div class="card team-box">
                                <div class="team-cover"> <img src="{{ url($data['cover']) }}" alt=""
                                        class="img-fluid"> </div>
                                <div class="card-body p-4s p-0">
                                    <div class="row align-items-center team-row">
                                        <div class="col team-settings px-4 pt-2 pb-4">
                                            <div class="row">
                                                <div class="col"></div>
                                                <div class="col text-end dropdown"> <a href="javascript:void(0);"
                                                        data-bs-toggle="dropdown" aria-expanded="false"> <i
                                                            class="ri-more-fill fs-17"></i> </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <button type="button" class="dropdown-item edit-list"
                                                                onclick="onEdit(event)" data-edit-id="12"
                                                                data-raw="{{ json_encode($data) }}">
                                                                <i class="ri-pencil-line me-2 align-bottom text-muted"></i>
                                                                Edit
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <div class="dropdown-item remove-list" data-remove-id="12"
                                                                onClick="removeItem({{ $data['id'] }}, '{{ url($data['cover']) }}')">
                                                                <i
                                                                    class="ri-delete-bin-5-line me-2 align-bottom text-danger"></i>
                                                                Remove
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="team-profile-img">
                                                <div class="avatar-lg img-thumbnail rounded-circle flex-shrink-0"><img
                                                        src="{{ url($data['cover']) }}" alt=""
                                                        class="member-img img-fluid d-block rounded-circle w-100 h-100"
                                                        style="object-fit: cover"></div>
                                                <div class="team-content">
                                                    <div class="member-name">
                                                        <h5 class="fs-16 mb-1 text-capitalize">{{ $data['name'] }}</h5>
                                                    </div>
                                                    <p class="text-muted member-designation mb-0 text-capitalize">
                                                        {{ $data['description'] }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <video class="rounded" src="{{ url($data['video']) }}" controls></video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset

            @endif

        </div>
    </div>
    {{-- <div class="card-footer text-end">
        <button type="submit" form="form-home-slide"
            class="btn btn-success btn-sm btn-label waves-effect waves-light"><i
                class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save changes</button>
    </div> --}}
</div>

{{-- add/edit modals --}}
<div id="addEditModalCareer" class="modal zoomIn" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new person</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <form id="modal-addedit-form-career" action="{{ route('video.upload', 2) }}" method="POST"
                    enctype="multipart/form-data" data-url-create="{{ route('video.upload', 2) }}"
                    data-url-update="{{ route('video.upload.update', [2, 0]) }}">
                    @csrf

                    <div class="mb-3">
                        <label for="basiInput" class="form-label fs-12">Full Name/Nickname</label>
                        <input type="text" maxlength="200" name="name" required class="form-control"
                            placeholder="Rudi hakim">
                    </div>
                    <div class="mb-4">
                        <label for="basiInput" class="form-label fs-12">Job Position</label>
                        <input type="text" maxlength="200" name="description" required class="form-control"
                            placeholder="Network engineering">
                    </div>

                    <div class="row mb-3">

                        <div class="col-6">
                            <label for="">
                                Select Photo
                                <small>Max 2MB</small>
                            </label>
                            <input type="file" class="filepond" name="photo" data-allow-reorder="true"
                                data-max-file-size="2MB" data-max-files="1">
                            {{-- <button type="button" onClick="openModal()"
                                class="btn-photo btn btn-dark btn-sm btn-label waves-effect waves-light mb-3">
                                <i class="ri-image-line label-icon align-middle fs-16 me-2"></i> Select Photo
                            </button>
                            <input type="file" class="file-photo" name="photo" hidden>
                            <div class="rounded bg-primary-subtle" style="height: 200px;" onClick="">
                                <div
                                    class="position-relative overflow-hidden w-100 h-100 d-flex justify-content-center align-items-center">
                                    <img class="position-absolute w-100 h-100 top-0 start-0 opacity-0 media-wrapper"
                                        style="object-fit: cover" src="" alt="">
                                    <i class="ri-image-line label-icon align-middle fs-24 me-2 text-muted"></i>
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-6">
                            <label for="">
                                Select Video
                                <small>Max 2MB</small>
                            </label>
                            <input type="file" class="filepond" name="video" data-allow-reorder="true"
                                data-max-file-size="2MB" data-max-files="1">
                            {{-- <button type="button" onClick="openModal()"
                                class="btn-video btn btn-dark btn-sm btn-label waves-effect waves-light mb-3">
                                <i class="ri-video-line label-icon align-middle fs-16 me-2"></i> Select Video
                            </button>
                            <input type="file" class="file-video" name="video" hidden>
                            <div class="rounded bg-primary-subtle d-flex justify-content-center align-items-center"
                                style="height: 200px;" onClick="">
                                <div
                                    class="position-relative overflow-hidden w-100 h-100 d-flex justify-content-center align-items-center">
                                    <video class="position-absolute w-100 h-100 top-0 start-0 opacity-0 media-wrapper"
                                        style="object-fit: cover" src="" controls></video>
                                    <i class="ri-video-line label-icon align-middle fs-24 me-2 text-muted"></i>
                                </div>
                            </div> --}}
                        </div>

                    </div>

                </form>

                <div class="modal-footer p-0">
                    <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="modal-addedit-form-career" class="btn btn-primary btn-sm">
                        <i class="ri-send-plane-2-line align-bottom me-1"></i> Submit
                    </button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div>

@push('career-script')
    <script>
        const careerAddBtn = document.getElementById('career-add');
        const modalCareerEl = document.querySelector('#addEditModalCareer');
        const modalCareer = new bootstrap.Modal(modalCareerEl, {
            keyboard: false
        });
        modalCareer.addEventListener('hidden.bs.modal', event => {
            const createUrl = modalCareer.querySelector('form').dataset.urlCreate;
            modalCareer.querySelector('form').action = createUrl;
            modalCareer.querySelector('form input[name=name]').value = "";
            modalCareer.querySelector('form input[name=description]').value = "";

            clearFilepond();
        });

        careerAddBtn.addEventListener('click', function() {
            modalCareer.show();

            // const addEditModalEl = document.getElementById('addEditModalCareer');
            // const addEditModal = new bootstrap.Modal(addEditModalEl, {});
            // const btnPhoto = addEditModalEl.querySelector('.btn-photo');
            // const btnVideo = addEditModalEl.querySelector('.btn-video');
            // const filePhoto = addEditModalEl.querySelector('.file-photo');
            // const fileVideo = addEditModalEl.querySelector('.file-video');
            // const mediaWrappers = addEditModalEl.querySelectorAll('.media-wrapper');

            // function openModal() {
            //     addEditModal.show();
            // }

            // openModal();

            // btnPhoto.addEventListener('click', openPhoto);

            // btnVideo.addEventListener('click', openVideo);

            // function openPhoto() {
            //     filePhoto.click()
            // }

            // function openVideo() {
            //     fileVideo.click()
            // }

            // filePhoto.addEventListener('change', filePhotoChange);
            // fileVideo.addEventListener('change', fileVideoChange);

            // function filePhotoChange(e) {
            //     var reader = new FileReader();
            //     reader.onload = function() {
            //         mediaWrappers[0].src = reader.result;
            //         mediaWrappers[0].classList.remove('opacity-0');
            //     };
            //     reader.readAsDataURL(e.target.files[0]);
            // }

            // function fileVideoChange(e) {
            //     let file = e.target.files[0];
            //     let blobURL = URL.createObjectURL(file);
            //     mediaWrappers[1].src = blobURL;
            //     mediaWrappers[1].classList.remove('opacity-0');
            // }

            // addEditModalEl.addEventListener('hidden.bs.modal', event => {
            //     btnPhoto.removeEventListener('click', openPhoto);
            //     btnVideo.removeEventListener('click', openVideo);
            //     filePhoto.removeEventListener('change', filePhotoChange);
            //     fileVideo.removeEventListener('change', fileVideoChange);
            // });
        });

        function onEdit(e) {
            const raw = JSON.parse(e.target.dataset.raw);
            let updateUrl = modalCareerEl.querySelector('form').dataset.urlUpdate;
            updateUrl = updateUrl.replace('/0', `/${raw.id}`);
            modalCareerEl.querySelector('form').action = updateUrl;

            console.log(raw);
            console.log(updateUrl);

            // assign value
            modalCareerEl.querySelector('form input[name=name]').value = raw.name;
            modalCareerEl.querySelector('form input[name=description]').value = raw.description;

            modalCareer.show();
        }

        function removeItem(id, img) {
            Swal.fire({
                title: 'Delete this person?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                imageUrl: img,
                imageHeight: 60,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                cancelButtonClass: 'btn btn-danger w-xs mt-2',
                buttonsStyling: false,
                showCloseButton: true
            }).then(function(result) {
                if (result.value) {
                    window.open("{{ url('image-video/video/remove') }}/" + id, '_self');
                }
            });
        }
    </script>
@endpush
