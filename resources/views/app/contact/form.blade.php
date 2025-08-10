{{-- @livewire('certificate-form') --}}

<form action="{{ $mode == 'edit' ? route('contact.update') . '/' . $dataContact->id : route('contact.add') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="admin_id" value="{{ Auth::id() }}" hidden>
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Contact details</h6>
                </div>
                <div class="card-body">
    
                    {{-- name --}}
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div>
                                <label for="basiInput" class="form-label">Name (ID)</label>
                                <input type="text" name="name_id" maxlength="200" required class="form-control"
                                    placeholder="Masukkan nama kontak" value="{{ $mode == 'edit' ? $dataContact->name_id : '' }}">
                                <div id="passwordHelpBlock" class="form-text">
                                    0/200
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label for="basiInput" class="form-label">Name (EN)</label>
                                <input type="text" name="name_en" maxlength="200" required class="form-control"
                                    placeholder="Enter contact name" value="{{ $mode == 'edit' ? $dataContact->name_en : '' }}">
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
                                <label for="descId" class="form-label">Address (ID)</label>
                                <textarea name="address_id" class="form-control" id="descId" rows="3">{{ $mode == 'edit' ? $dataContact->address_id : '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label for="descEn" class="form-label">Address (EN)</label>
                                <textarea name="address_en" class="form-control" id="descEn" rows="3">{{ $mode == 'edit' ? $dataContact->address_en : '' }}</textarea>
                            </div>
                        </div>
                    </div>
    
                    <div class="mb-3">
                        <label for="iconInput" class="form-label">Email</label>
                        <div class="form-icon">
                            <input name="email" type="email" class="form-control form-control-icon" id="iconInput"
                                placeholder="Enter email address" value="{{ $mode == 'edit' ? $dataContact->email : '' }}">
                            <i class="ri-mail-line"></i>
                        </div>
                    </div>
    
                    <div class="mb-3">
                        <label for="iconInput" class="form-label">Telephone</label>
                        <div class="form-icon">
                            <input name="telephone" type="text" class="form-control form-control-icon" id="iconInput"
                                placeholder="Enter phone number" value="{{ $mode == 'edit' ? $dataContact->telephone : '' }}">
                            <i class="ri-phone-line"></i>
                        </div>
                    </div>
    
                    <div class="mb-3">
                        <label for="iconInput" class="form-label">Fax</label>
                        <div class="form-icon">
                            <input name="fax" type="text" class="form-control form-control-icon" id="iconInput"
                                placeholder="Enter fax number" value="{{ $mode == 'edit' ? $dataContact->fax : '' }}">
                            <i class="ri-printer-line"></i>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <button type="button" id="btn-cancel" class="btn btn-danger btn-sm btn-label waves-effect waves-light">
                        <i class="ri-close-line label-icon align-middle fs-16 me-2"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-success btn-sm btn-label waves-effect waves-light">
                        <i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Submit
                    </button>
                </div>
            </div>
    
            <div class="card mb-3">
                <div class="card-header">
                    <h6 class="card-title mb-0">Cover</h6>
                </div>
                <div class="card-body">
                    @if ($mode == 'edit')
                        <div class="mb-3">
                            <img class="w-100" src="{{ url($dataContact->cover) }}" alt="">
                        </div>
                        <p>Drop new images to update</p>
                    @endif
                    <div>
                        <input name="cover" type="file" class="filepond filepond-input-multiple" multiple name="filepond"
                            data-allow-reorder="true" data-max-file-size="2MB" data-max-files="1">
                    </div>
                </div>
            </div>
    
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Google map sharing src</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        {{-- <label for="iconInput" class="form-label">Google map share src</label> --}}
                        <textarea id="location-map-input" type="text" name="location_map" class="form-control form-control-icon" id="iconInput" placeholder="" rows="1">{{ $mode == 'edit' ? $dataContact->location_map : '' }}</textarea>
                        <div id="passwordHelpBlock" class="form-text">
                            Paste src from google embed maps here
                        </div>
                    </div>
    
                    <p class="mb-1" style="font-size: 12px;">
                        Preview
                    </p>
                    <div class="w-100" style="height: 300px; background: #eee;">
                        <iframe id="location-preview" class="w-100"
                            src="{{ $mode == 'edit' ? $dataContact->location_map : 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63319.55732519144!2d112.72847359999999!3d-7.300710399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb97917c2fad%3A0x21b1122d5fe174cc!2sSurabaya%20Zoo!5e0!3m2!1sen!2sid!4v1693161344918!5m2!1sen!2sid' }}"
                            height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</form>

@push('script-contact-form')
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
                    location.replace('/contact');
                }
            });
        });

        locationInput.addEventListener('input', function(e) {
            console.log('location input change');
            if(e.target.value != '') {
                locationPreview.src = e.target.value;
            }
        });
    </script>
@endpush
