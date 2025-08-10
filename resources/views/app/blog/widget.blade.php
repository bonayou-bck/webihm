<div class="card">
  <div class="card-body p-0">

    <div class="row row-cols-md-3 row-cols-1">
        <div class="col col-lg border-end">
            <div class="py-4 px-3">
                <h5 class="text-muted text-uppercase fs-13">Total Article <i
                        class="ri-stack-fill text-primary fs-18 float-end align-middle"></i>
                </h5>
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <i class="ri-stack-line display-6 text-muted"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h2 class="mb-0">
                          {{ isset($counts['total']) ? numberAbbr($counts['total'], 2) : 0 }}
                          {{-- <span class="counter-value" data-target="197">197</span> --}}
                        </h2>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
        <div class="col col-lg border-end">
            <div class="mt-3 mt-md-0 py-4 px-3">
                <h5 class="text-muted text-uppercase fs-13">Published <i
                        class="ri-send-plane-fill text-success fs-18 float-end align-middle"></i></h5>
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <i class="ri-send-plane-line display-6 text-muted"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h2 class="mb-0">
                          {{ isset($counts['published']) ? numberAbbr($counts['published'], 2) : 0 }}
                          {{-- $<span class="counter-value" data-target="489.4">489.4</span>k --}}
                        </h2>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
        <div class="col col-lg border-end">
            <div class="mt-3 mt-md-0 py-4 px-3">
                <h5 class="text-muted text-uppercase fs-13">
                    Waiting for Review <i class="ri-timer-2-line text-info fs-18 float-end align-middle"></i>
                </h5>
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <i class="ri-timer-2-line display-6 text-muted"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h2 class="mb-0">
                          {{ isset($counts['review']) ? numberAbbr($counts['review'], 2) : 0 }}
                          {{-- <span class="counter-value" data-target="32.89">32.89</span>% --}}
                        </h2>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
        <div class="col col-lg">
            <div class="mt-3 mt-lg-0 py-4 px-3">
                <h5 class="text-muted text-uppercase fs-13">
                    Rejected Article <i class="ri-forbid-2-line text-danger fs-18 float-end align-middle"></i>
                </h5>
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <i class="ri-forbid-2-line display-6 text-muted"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h2 class="mb-0">
                          {{ isset($counts['rejected']) ? numberAbbr($counts['rejected'], 2) : 0 }}
                          {{-- $<span class="counter-value" data-target="1596.5">1,596.5</span> --}}
                        </h2>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>

  </div>
</div>

