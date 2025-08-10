{{-- @livewire('certificate-form') --}}

@if (session('status-lang'))
    {{-- {{session('status-lang')['code']}} --}}
@endif

@php
    if($mode == 'edit') {
        $_group = $group->filter(function ($value, $key) use($dataLang) { 
            return $value['id'] == $dataLang->group_id; 
        }); //[0]['name']
        $_group = $_group->values()->toArray();
    }
@endphp

<form action="{{ $mode == 'edit' ? route('lc.update') . '/' . $dataLang->id : route('lc.add') }}" method="POST" id="form-lc">
    @csrf
    <div class="row">

        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label">Language identifier</label>
                        <input type="text" name="lang_id" maxlength="200" required class="form-control"
                            placeholder="Enter language id" value="{{ $mode == 'edit' ? $dataLang->lang_id : '' }}">
                        <div class="form-text d-flex justify-content-between align-items-start">
                            <div>
                                Allowed:
                                <ul>
                                    <li>
                                        Characters: A to Z and number
                                    </li>
                                    <li>
                                        Symbols: only slash (-) to replace spacing
                                    </li>
                                </ul>
                            </div>
                            <p class="m-0">
                                0/255
                            </p>
                        </div>
                    </div>

                    {{-- content --}}
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div>
                                <label class="form-label">Content (ID)</label>
                                <textarea class="form-control" name="content_id" placeholder="Masukkan dalam bahasa indonesia" id="descId"
                                    rows="1">{{ $mode == 'edit' ? $dataLang->content_id : '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label class="form-label">Content (EN)</label>
                                <textarea class="form-control" name="content_en" placeholder="Enter in english" id="descId" rows="1">{{ $mode == 'edit' ? $dataLang->content_en : '' }}</textarea>
                            </div>
                        </div>

                        <div class="form-text">
                            Rules:
                            <ul>
                                <li>For list content separate each items with [ <code>||</code> ] symbol</li>
                                <li>For paragraph content separate each items with [ <code>||</code> ] symbol</li>
                            </ul>
                        </div>
                    </div>
                    {{-- end of content --}}

                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <button type="button" id="btn-cancel"
                        class="btn btn-danger btn-sm btn-label waves-effect waves-light">
                        <i class="ri-close-line label-icon align-middle fs-16 me-2"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-success btn-sm btn-label waves-effect waves-light">
                        <i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Submit
                    </button>
                </div>
                <div class="card-body">
                    <div class="mb-3s">
                        <div class="mb-3">
                            @if ($mode == 'edit')
                                <input type="text" id="category-input-id" name="group_id" hidden value="{{ $mode == 'edit' ? $dataLang->group_id : '' }}">
                                <input type="text" id="category-input" class="form-control rounded-end flag-input"
                                    readonly placeholder="Select category" data-bs-toggle="dropdown"
                                    aria-expanded="false" value="{{ $_group[0]['name'] }}" />
                            @else
                                <input type="text" id="category-input-id" name="group_id" hidden>
                                <input type="text" id="category-input" class="form-control rounded-end flag-input"
                                    readonly value="" placeholder="Select category" data-bs-toggle="dropdown"
                                    aria-expanded="false" />
                            @endif
                            <div class="dropdown-menu w-100" style="max-height: 150px; overflow-y: auto">
                                <ul class="list-unstyled dropdown-menu-list mb-0">
                                    @foreach ($group as $g)
                                        <li class="dropdown-item group-item" data-id="{{ $g['id'] }}"
                                            data-name="{{ $g['name'] }}">
                                            {{ $g['name'] }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <button type="button" class="btn btn-light btn-sm waves-effect" data-bs-toggle="collapse"
                            data-bs-target="#form-category">
                            <i class="ri-add-line align-bottom me-1"></i>
                            Add new category
                        </button>

                        <div id="form-category" class="collapse mt-3">
                            <div class="mb-2">
                                <label class="form-label fs-12">Name</label>
                                <input type="text" maxlength="200" class="form-control form-control-sm"
                                    placeholder="">
                            </div>

                            <button type="button" class="btn btn-primary btn-sm waves-effect">
                                <i class="ri-send-plane-2-line align-bottom me-1"></i>
                                Submit
                            </button>
                        </div>
                    </div>

                    {{-- <div class="">
                        <label for="basiInput" class="form-label">Content Type</label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="default" selected>Default string</option>
                            <option value="list">List</option>
                            <option value="paragraph">Paragraph</option>
                        </select>
                    </div> --}}
                </div>
            </div>
        </div>

    </div>
</form>

@push('script-lc-form')
    <script>
        const groupInput = document.getElementById('category-input');
        const groupInputId = document.getElementById('category-input-id');
        const groupItems = document.querySelectorAll('.group-item');

        groupItems.forEach((element, i) => {
            element.addEventListener('click', groupChanges);
        });

        function groupChanges(e) {
            const id = e.target.dataset.id;
            const name = e.target.dataset.name;

            groupInput.value = name;
            groupInputId.value = id;
        }

        document
            .getElementById('btn-cancel')
            .addEventListener('click', function() {
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
                        location.replace('/language-content');
                    }
                });
            });
    </script>
@endpush
