@php
  $title = '';
  $content = '';

  if($mode == 'edit') {
    $title = $dataBlog->title_id;
    $content = $dataBlog->content_id;
  }
@endphp

<div>
  <p class="text-muted">In Bahasa</p>
  <div class="mb-3">
    <label for="basiInput" class="form-label">Title</label>
    <input type="text" maxlength="200" required class="form-control"
        placeholder="Enter post title" name="title_id" value="{{ $title }}">
    <div id="passwordHelpBlock" class="form-text text-end">
        0/200
    </div>
  </div>

  <div class="ckeditor-classic"></div>
  <textarea name="content_id" id="content_id" hidden></textarea>
</div>

@push('script-content-id')
    <script>
      setTimeout(() => {
        setContent('id', `{!! $content !!}`);
      }, 1000);
    </script>
@endpush
