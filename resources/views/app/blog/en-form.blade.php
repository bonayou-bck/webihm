@php
  $title = '';
  $content = '';

  if($mode == 'edit') {
    $title = $dataBlog->title_en;
    $content = $dataBlog->content_en;
  }
@endphp

<div>
  <p class="text-muted">In English</p>
  <div class="mb-3">
    <label for="basiInput" class="form-label">Title</label>
    <input type="text" maxlength="200" required class="form-control"
        placeholder="Enter post title" name="title_en" value="{{ $title }}">
    <div id="passwordHelpBlock" class="form-text text-end">
        0/200
    </div>
  </div>

  <div class="ckeditor-classic"></div>
  <textarea name="content_en" id="content_en" hidden></textarea>
</div>

@push('script-content-en')
    <script>
      setTimeout(() => {
        setContent('en', `{!! $content !!}`);
      }, 1000);
    </script>
@endpush
