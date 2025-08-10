@php
    $hasAlert = session()->exists(SESSION_ALERT);
    $hasError = false;
    
    if($hasAlert) {
      if(session(SESSION_ALERT)['status'] == ALERT_ERROR) {
        $hasError = true;
        $sessData = session(SESSION_ALERT)['data'];
      }
    }
@endphp

<div id="formAccountModal" class="modal fade" tabindex="-1" aria-labelledby="formAccountModal" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Create New Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>

            <div class="modal-body">
                <form id="formAccountForm" action="{{ route('account.create') }}" method="POST"
                    data-action-add="{{ route('account.create') }}"
                    data-action-update="{{ route('account.update', 0) }}"
                    data-action-reset="{{ route('account.resetPassword', 0) }}" >
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" 
                            placeholder="Enter user full name"
                            required value="{{ $hasError ? ($sessData != null ? $sessData['name'] : '') : '' }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control mb-1" name="email" 
                            placeholder="Enter user correct email"
                            required required value="{{ $hasError ? ($sessData != null ? $sessData['email'] : '') : '' }}">
                        <p class="text-danger small">
                            *This field is not editable, make sure you entered an correct email address
                        </p>
                    </div>

                    <div class="mb-3 roles">
                        <label class="form-label">Role</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="writerRadio"
                                    value="writer" checked required>
                                <label class="form-check-label" for="writerRadio">
                                    Writer
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="superadminRadio"
                                    value="superadmin">
                                <label class="form-check-label" for="superadminRadio">
                                    Superadmin
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control mb-1" 
                            placeholder="Enter password"
                            name="password" minlength="8" required>
                        <p class="text-muted small">
                            *Minimum 8 characters length <br>
                            *Make sure you remember entered password
                        </p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Retype Password</label>
                        <input type="password" class="form-control" 
                            placeholder="Retype password"
                            name="password-re" minlength="8" required>
                    </div>

                </form>

                <p class="text-center text-primary small reset-info d-none">
                    By clicking "Save" button below you will directly redirect to reset password process.
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                {{-- form="formAccountForm" --}}
                <button type="submit" class="btn btn-primary btn-load" form="formAccountForm"> 
                  <span class="d-flex align-items-center">
                    <span class="spinner-border flex-shrink-0 d-none me-2" role="status">
                        <span class="visually-hidden"></span>
                    </span>
                    <span class="flex-grow-1">
                        Save
                    </span>
                  </span>
                </button>
            </div>

        </div>
    </div>
</div>
