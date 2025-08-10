{{-- @livewire('certificate-form') --}}
@php
    $user = Auth::user();
    $userId = $user->id;
    $userName = $user->name;
    $role = $user->role;
    // echo json_encode();
    // var_dump($dataBlog->history);
    if($mode == 'edit') {
        $history = $dataBlog->history
            ->sortDesc()
            ->values()
            ->all();
    }else{
        $history = [];
        $dataBlog = (object)[
            "status" => false
        ];
    }
@endphp

<style>
    .ck-editor__editable p {
        margin-bottom: 16px;
    }

    .ck-editor__editable h1,
    .ck-editor__editable h2,
    .ck-editor__editable h3,
    .ck-editor__editable h4,
    .ck-editor__editable h5,
    .ck-editor__editable h6 {
        margin-bottom: 20px;
    }
</style>

<form id="blog-post-form"
    action="{{ $mode == 'edit' ? route('blog.update') . '/' . $dataBlog->id : route('blog.create') }}" method="POST"
    enctype="multipart/form-data">

    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    <ul class="nav nav-tabs nav-border-top nav-border-top-primary mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#nav-post-id" role="tab"
                                aria-selected="false">
                                ID
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#nav-post-en" role="tab"
                                aria-selected="false">
                                EN
                            </a>
                        </li>
                    </ul>

                    @php
                        $params = ['dataCategory' => $dataCategory, 'mode' => $mode];
                        
                        if ($mode == 'edit') {
                            $params['dataBlog'] = $dataBlog;
                        }
                    @endphp

                    <div class="tab-content">
                        <div class="tab-pane active" id="nav-post-id">
                            @component('app.blog.id-form', $params)
                            @endcomponent
                            @stack('script-content-id')
                        </div>
                        <div class="tab-pane" id="nav-post-en">
                            @component('app.blog.en-form', $params)
                            @endcomponent
                            @stack('script-content-en')
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            {{-- publishing --}}
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Publish</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <button id="cancel-post" type="button"
                            class="btn btn-danger btn-sm btn-label waves-effect waves-light">
                            <i class="ri-close-line label-icon align-middle fs-16 me-2"></i> Cancel
                        </button>

                        @if ($mode == 'edit')
                            @if ($role == USER_ROLE_SUPER)
                                @if ($dataBlog->status != BLOG_STATUS_REVIEW && $dataBlog->status != BLOG_STATUS_REJECTED)
                                    <button type="button" onclick="onDraft()"
                                        class="btn btn-dark btn-sm btn-label waves-effect waves-light">
                                        <i class="ri-file-list-2-line label-icon align-middle fs-16 me-2"></i> Save to Draft
                                    </button>
                                @endif
                            @endif
                        @endif
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item small px-0">
                            @if ($mode == 'edit')
                                Created: <b>{{ formatDate($dataBlog->created_at, DATE_FORMAT_DDD_D_MMM_YYYY) }}</b>
                            @else
                                Created: <b>{{ formatDate(date('Y-m-d'), DATE_FORMAT_DDD_D_MMM_YYYY) }}</b>
                            @endif
                        </li>

                        @if ($mode == 'edit')
                            <li class="list-group-item small px-0">
                                Updated: <b>{{ formatDate(date('Y-m-d'), DATE_FORMAT_DDD_D_MMM_YYYY) }}</b> (now)
                            </li>
                        @endif

                        <li class="list-group-item small px-0">
                            @if ($mode == 'edit')
                                By: <b>{{ $dataBlog->created_by_detail[0]['name'] }}</b>
                            @else
                                By: <b>{{ $userName }}</b>
                                <input type="text" name="created_by" value="{{ $userId }}" hidden>
                            @endif
                        </li>
                        <li class="list-group-item small px-0">
                            @if ($mode == 'edit')
                                Status: <b>{{ getStatusText($dataBlog->status) }}</b>
                                <input type="text" id="post-status" name="status" value="{{ $dataBlog->status }}"
                                    hidden>
                            @else
                                Status: <b>{{ getStatusText(BLOG_STATUS_EDITING) }}</b>
                                <input type="text" id="post-status" name="status" value="{{ BLOG_STATUS_EDITING }}"
                                    hidden>
                            @endif
                        </li>
                        {{-- only if notes not empty --}}
                        @if (count($history))
                            <li class="list-group-item small px-0">
                                {{-- Some words in the article need to be edited, using words
																	that make more sense for this. --}}
                                Notes: <span class="text-muted">{{ $history[0]['notes'] }}</span>
                                (<span>{{ timeago($history[0]['created_at']) }}</span>)
                            </li>
                        @endif
                    </ul>

                    @if (count($history) > 1)
                        {{-- /blog/history/article-slug --}}
                        <a href="#" class="small" data-bs-toggle="collapse" data-bs-target="#history-list">Show
                            more</a>

                        <ul id="history-list" class="list-group list-group-flush collapse">
                            @foreach ($history as $hst)
                                <li class="list-group-item small px-0">
                                    {{ $hst['notes'] }}
                                    <div>
                                        <p class="m-0 small text-muted text-end">
                                            <span
                                                class="text-{{ $dataStatus[$hst['status']][1] }}">{{ getStatusText($hst['status']) }}</span>
                                            • {{ timeago($hst['created_at']) }}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                @if ($dataBlog->status != BLOG_STATUS_REJECTED || $role != USER_ROLE_SUPER)
                    <div class="card-footer d-flex justify-content-between">

                        @if ($role == USER_ROLE_SUPER)
                            @if ($dataBlog->status == BLOG_STATUS_REVIEW)
                                <button type="button" onclick="onReject()"
                                    class="btn btn-outline-danger btn-sm btn-label waves-effect waves-light">
                                    <i class="ri-close-line label-icon align-middle fs-16 me-2"></i> Reject
                                </button>
                            @endif

                            <button type="button" onclick="onPublish()"
                                class="btn btn-success btn-sm btn-label waves-effect waves-light">
                                <i class="ri-send-plane-line label-icon align-middle fs-16 me-2"></i> Approve &amp;
                                Publish
                            </button>

                            @if ($dataBlog->status != BLOG_STATUS_REVIEW)
                                <button type="button" onclick="onSave()"
                                    class="btn btn-primary btn-sm btn-label waves-effect waves-light">
                                    <i class="ri-save-3-line label-icon align-middle fs-16 me-2"></i> Save
                                </button>
                            @endif
                        @elseif($role == USER_ROLE_WRITER)
                            <button type="button" onclick="onSave()"
                                class="btn btn-primary btn-sm btn-label waves-effect waves-light">
                                <i class="ri-save-3-line label-icon align-middle fs-16 me-2"></i> Save
                            </button>

                            <button type="button" onclick="onReview()"
                                class="btn btn-info btn-sm btn-label waves-effect waves-light">
                                <i class="ri-send-plane-line label-icon align-middle fs-16 me-2"></i> Send to review
                            </button>
                        @else
                        @endif

                    </div>
                @endif
            </div>
            {{-- end of publishing --}}

            {{-- featured image --}}
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Featured image</h6>
                </div>
                <div class="card-body">
                    @if ($mode == 'edit')
                        <div class="mb-3">
                            <img class="w-100" src="{{ url($dataBlog->cover ?? '') }}" alt="">
                        </div>
                        <p>Drop new images to update</p>
                    @endif
                    <div>
                        <input type="file" class="filepond filepond-input-multiple" multiple name="cover"
                            data-allow-reorder="true" data-max-file-size="3MB" data-max-files="1">
                    </div>
                </div>
            </div>
            {{-- end of featured image --}}

            {{-- category --}}
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Category</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3s">
                        @if ($mode == 'edit')
                            <input id="category-id" type="text" name="category_id" hidden
                                value="{{ $dataBlog->category_id }}">
                            <input id="category-name" type="text" class="form-control rounded-end flag-input"
                                readonly value="{{ $dataBlog->categories[0]['name_id'] }}"
                                placeholder="Select category" data-bs-toggle="dropdown" aria-expanded="false" />
                        @else
                            <input id="category-id" type="text" name="category_id" hidden>
                            <input id="category-name" type="text" class="form-control rounded-end flag-input"
                                readonly value="" placeholder="Select category" data-bs-toggle="dropdown"
                                aria-expanded="false" />
                        @endif
                        <div class="dropdown-menu w-100" style="max-height: 250px; overflow-y: auto">
                            <ul class="list-unstyled dropdown-menu-list mb-0">
                                @foreach ($dataCategory as $category)
                                    <li class="dropdown-item"
                                        onclick="onCategory('{{ $category['id'] }}', '{{ $category['name_id'] }}')">
                                        {{ $category['name_id'] }}
                                        <p class="m-0 small text-muted">
                                            {{ $category['name_en'] }}
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    @if ($role == USER_ROLE_SUPER)
                        <button type="button" class="btn btn-light btn-sm waves-effect mt-3" data-bs-toggle="collapse"
                            data-bs-target="#form-category">
                            <i class="ri-add-line align-bottom me-1"></i>
                            Add new category
                        </button>

                        <div id="form-category" class="collapse mt-3">
                            <div class="mb-2">
                                <label for="basiInput" class="form-label fs-12">Name (ID)</label>
                                <input type="text" maxlength="200" required class="form-control form-control-sm"
                                    placeholder="">
                            </div>
                            <div class="mb-2">
                                <label for="basiInput" class="form-label fs-12">Name (EN)</label>
                                <input type="text" maxlength="200" required class="form-control form-control-sm"
                                    placeholder="">
                            </div>

                            <button type="button" class="btn btn-primary btn-sm waves-effect">
                                <i class="ri-send-plane-2-line align-bottom me-1"></i>
                                Submit
                            </button>
                        </div>
                    @endif

                </div>
            </div>
            {{-- end of category --}}
        </div>
    </div>

</form>

@push('script-blog-form')
    <script>
        const form = document.getElementById('blog-post-form');
        const postStatus = document.getElementById('post-status');
        const categoryId = document.getElementById('category-id');
        const categoryName = document.getElementById('category-name');

        document.getElementById("cancel-post").addEventListener("click", function() {
            Swal.fire({
                title: "Are you sure?",
                text: "Your progress will be lost",
                icon: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                cancelButtonClass: 'btn btn-danger w-xs mt-2',
                confirmButtonText: "Yes",
                buttonsStyling: false,
                showCloseButton: true
            }).then(function(result) {
                if (result.value) location.replace('/blog');
            });
        });

        var idEditor = null;
        ClassicEditor
            .create(document.querySelector('#nav-post-id .ckeditor-classic'))
            .then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';
                idEditor = editor;
            })
            .catch(function(error) {
                console.error(error);
            });

        var enEditor = null;
        ClassicEditor
            .create(document.querySelector('#nav-post-en .ckeditor-classic'))
            .then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';
                enEditor = editor;
            })
            .catch(function(error) {
                console.error(error);
            });
        // 

        function onPublish() {
            postStatus.value = "{{ BLOG_STATUS_PUBLISHED }}";

            setForm();

            setTimeout(() => {
                form.submit();
            }, 1000);
        }

        function onSave() {
            postStatus.value = "{{ BLOG_STATUS_EDITING }}";

            setForm();

            setTimeout(() => {
                form.submit();
            }, 1000);
        }

        function onReview() {
            postStatus.value = "{{ BLOG_STATUS_REVIEW }}";
            setForm();

            setTimeout(() => {
                form.submit();
            }, 1000);
        }

        function onDraft() {
            postStatus.value = "{{ BLOG_STATUS_DRAFT }}";

            setForm();

            setTimeout(() => {
                form.submit();
            }, 1000);
        }

        function onReject() {
            postStatus.value = "{{ BLOG_STATUS_REJECTED }}";

            Swal.fire({
                title: 'You must provide a note as to why this article was rejected',
                input: 'textarea',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Reject',
                confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                cancelButtonClass: 'btn btn-danger w-xs mt-2',
                showLoaderOnConfirm: true,
                buttonsStyling: false,
                preConfirm: (value) => {
                    const noteFrm = new FormData();
                    const token = document.getElementsByName('_token');
                    const by = "{{ $userId }}";

                    noteFrm.append('note', value);
                    noteFrm.append('by', by);
                    noteFrm.append('_token', token[0].value);
                    return fetch(`/blog/reject/{{ $mode == 'edit' ? $dataBlog->id : '' }}`, {
                            method: 'POST',
                            body: noteFrm
                        }).then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText)
                            }
                            return response.json()
                        })
                        .catch(error => {
                            Swal.showValidationMessage(
                                `Failed, please try again`
                            )
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    let timerInterval
                    Swal.fire({
                        title: 'This post has been rejected',
                        html: 'I will close in <b></b> milliseconds.',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log('I was closed by the timer')
                            location.replace('/blog');
                        }
                    })
                }
            })
        }

        function onCategory(id, name) {
            categoryId.value = id;
            categoryName.value = name;
        }

        function setForm() {
            document.getElementById('content_id').value = idEditor.getData();
            document.getElementById('content_en').value = enEditor.getData();
        }

        function setContent(type, data) {
            if (idEditor && enEditor) {
                if (type == 'id') {
                    idEditor.setData(data);
                } else if (type == 'en') {
                    enEditor.setData(data);
                }
            }
        }
    </script>
@endpush
