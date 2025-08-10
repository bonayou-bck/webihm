{{-- @livewire('certificate-form') --}}

<div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="card-title mb-0">Contact details</h6>
            <div class="text-end">
                <button type="submit" form="form-social"
                    class="btn btn-primary btn-sm btn-label waves-effect waves-light">
                    <i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Update
                </button>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('contact.social.update') }}" method="POST" id="form-social">
                @csrf

                @foreach ($social as $sc)
                    <div class="mb-3">
                        <label for="iconInput" class="form-label">{{ $sc['name'] }}</label>
                        <div class="form-icon">
                            <input type="text" class="form-control form-control-icon"
                                placeholder="{{ $sc['name'] }} account link" name="{{ $sc['name'] }}"
                                value="{{ $sc['link'] }}">
                            <i class="{{ $sc['icon'] }}"></i>
                        </div>
                        <p class="w-100 text-end small m-0">
                            <a href="{{ $sc['link'] }}" target="_blank">
                                Open link
                            </a>
                        </p>
                    </div>
                @endforeach

            </form>


        </div>
    </div>

</div>
