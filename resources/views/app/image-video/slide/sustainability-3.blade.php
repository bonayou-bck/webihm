<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="card-title mb-0">Sustainability - Best Firefighter</h6>

        <button type="button" id="form-sustain3-btn-add"
            class="btn btn-primary btn-sm btn-label waves-effect waves-light"><i
                class="ri-add-line label-icon align-middle fs-16 me-2"></i> Add</button>
        <input id="file-sustain3-slide-picker" type="file" hidden>
    </div>
    <div class="card-body pb-0">
        <form id="form-sustain3-slide" action="{{ route('slide.upload') }}/4" method="POST">
            @csrf
            <div class="row" id="form-sustain3-slide-item-wrapper">

                @if ($slideData)

                    @isset($slideData['sustainability-3'])
                        @foreach ($slideData['sustainability-3']['sustainability-3'] as $key => $data)
                            <div class="col-sm-3 position-relative form-sustain3-slide-item">
                                <div class="card p-2" style="background: #eee">
                                    <div data-image='{{ url($data['src']) }}'
                                        data-remove='{{ route('slide.remove') }}/{{ $data['id'] }}'
                                        class="close-item position-absolute text-danger d-flex justify-content-center align-items-center"
                                        style="width: 25px; height: 25px; border-radius: 50%; background: #fff; top: 16px; right: 16px;">
                                        <i class="ri-close-circle-line label-icon align-middle fs-20"></i>
                                    </div>
                                    <img class="w-100 rounded" style="height: 150px; object-fit: cover;"
                                        src="{{ url($data['src']) }}" alt="">
                                    <textarea name="home-slide[{{ $key }}]" hidden></textarea>
                                </div>
                            </div>
                        @endforeach
                    @endisset

                @endif

            </div>
        </form>
    </div>
    <div class="card-footer text-end">
        <button type="submit" form="form-sustain3-slide"
            class="btn btn-success btn-sm btn-label waves-effect waves-light"><i
                class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save changes</button>
    </div>
</div>

{{-- template --}}
<div class="d-none">
    <div class="sustain3-item-template col-sm-3 position-relative form-sustain3-slide-item">
        <div class="card p-2 bg-danger">
            <div class="close-item position-absolute text-danger d-flex justify-content-center align-items-center"
                style="width: 25px; height: 25px; border-radius: 50%; background: #fff; top: 16px; right: 16px;">
                <i class="ri-close-circle-line label-icon align-middle fs-20"></i>
            </div>
            <img class="w-100 rounded" style="height: 150px; object-fit: cover;" src="" alt="">
            <textarea name="home-slide[0]" hidden></textarea>
        </div>
    </div>
</div>

@push('sustainability-3-script')
    <script>
        const sustain3SlideItemWrapper = document.getElementById('form-sustain3-slide-item-wrapper');
        let sustain3SlideItems = sustain3SlideItemWrapper.querySelectorAll('.form-sustain3-slide-item');
        const sustain3ItemTemplate = document.querySelector('.sustain3-item-template');
        const formsustain3AddBtn = document.getElementById('form-sustain3-btn-add');
        const formsustain3AddInput = document.getElementById('file-sustain3-slide-picker');

        formsustain3AddBtn.addEventListener('click', function() {
            formsustain3AddInput.click();
        });

        formsustain3AddInput.addEventListener('change', function(e) {
            const _template = sustain3ItemTemplate.cloneNode(true);
            _template.classList.remove("sustain3-item-template");

            var reader = new FileReader();
            reader.onload = function() {
                _template.getElementsByTagName('img')[0].src = reader.result;
                _template.getElementsByTagName('textarea')[0].value = reader.result;
                _template.getElementsByTagName('textarea')[0].name = `home-slide[${sustain3SlideItems.length}]`;

                sustain3SlideItemWrapper.appendChild(_template);
                sustain3SlideItems = sustain3SlideItemWrapper.querySelectorAll('.form-sustain3-slide-item');
                removeEvents();
                initEvents();
                formsustain3AddInput.value = null;
            };
            reader.readAsDataURL(e.target.files[0]);
        });

        function initEvents() {
            sustain3SlideItems.forEach((e, i) => {
                const _closeItem = e.querySelector('.close-item');
                _closeItem.addEventListener('click', closeItem, false);
                _closeItem.params = [e];
                _closeItem.closeEl = _closeItem;
            });
        }

        function removeEvents() {
            sustain3SlideItems.forEach((e, i) => {
                const _closeItem = e.querySelector('.close-item');
                _closeItem.removeEventListener('click', closeItem);
            });
        }

        function closeItem(e) {
            const el = e.currentTarget.closeEl;
            const url = el.dataset.remove;
            const img = el.dataset.image;

            Swal.fire({
                title: 'Delete this image?',
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
                    window.open(url, '_self');
                }
            });
        }

        initEvents();
    </script>
@endpush
