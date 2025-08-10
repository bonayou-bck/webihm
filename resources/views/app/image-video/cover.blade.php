@extends('app.layouts.master')
@section('title')
    Manage cover
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Pages
        @endslot
        @slot('title')
            Manage cover
        @endslot
    @endcomponent

    {{-- content --}}
    <div class="row grid-view-filter team-list">
        {{-- cover --}}
        @foreach ($cover as $c)
            <div class="col-sm-6">
                <form action="{{ route('cover.upload') }}" method="POST" class="form-media" enctype="multipart/form-data">
                    @csrf
                    <div class="card overflow-hidden">
                        <div class="position-relative">
                            <video class="video-media w-100 {{$c['is_video'] !== 1 ? 'd-none' : ''}}" src="{{url($c['src'] ?? '')}}" controls style="height: 200px; object-fit: cover"></video>

                            <img class="w-100 img-media {{$c['is_video'] === 1 ? 'd-none' : ''}}" style="height: 200px; object-fit: cover;"
                                src="{{ $c['src'] ? url($c['src']) : Storage::disk('public')->url('image/banner-1.jpg') }}" alt="">


                            <input hidden type="file" name="src" class="file-media">
                            <input hidden type="text" name="id" value="{{$c['id']}}">
                            @csrf
                            <button type="button"
                                class="btn-change btn btn-secondary btn-sm btn-label waves-effect waves-light position-absolute"
                                style="z-index: 10; bottom: 8px; right: 8px;"><i
                                    class="ri-file-2-line label-icon align-middle fs-16 me-2"></i> Click to change
                                picture/video</button>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="">
                                <p class="m-0 text-capitalize">
                                    {{ str_replace('-', ' ', $c['type']) }} Cover
                                </p>
                            </div>
                            <!-- Buttons with Label -->
                            <button type="submit" class="btn btn-success btn-sm btn-label waves-effect waves-light btn-submit"
                                disabled><i class="ri-send-plane-line label-icon align-middle fs-16 me-2"></i> Save
                                update</button>
                        </div>
                    </div>
                </form>
            </div>
        @endforeach

    </div>
    {{-- end of content --}}
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <script>
        let forms = document.querySelectorAll('.form-media');
        let btns = document.querySelectorAll('.btn-change');
        let submitBtns = document.querySelectorAll('.btn-submit');
        let medias = document.querySelectorAll('.file-media');
        let imgMedias = document.querySelectorAll('.img-media');
        let videoMedias = document.querySelectorAll('.video-media');

        btns.forEach((element, i) => {
          element.addEventListener('click', function() {
            medias[i].click();
          });
        });

        medias.forEach((element, i) => {
          element.addEventListener('change', function(e) {
            console.log(e.target.files[0]);
            const type = e.target.files[0].type.split('/')[0];
            
            if(type != 'video') {
                var reader = new FileReader();
                reader.onload = function(){
                  imgMedias[i].src = reader.result;
                  imgMedias[i].classList.remove('d-none');
                  videoMedias[i].classList.add('d-none');
                  submitBtns[i].disabled = false;
                };
                reader.readAsDataURL(e.target.files[0]);
            }else{
                const blobURL = URL.createObjectURL(e.target.files[0]);
                videoMedias[i].src = blobURL;
                videoMedias[i].classList.remove('d-none');
                imgMedias[i].classList.add('d-none');
                submitBtns[i].disabled = false;
            }

          });
        });
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
