<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="study_id" class="font-weight-bold">Mata Kuliah</label> <div class="input-group border rounded">
        <select name="study_id" id="study_id" class="select2 form-control" data-allow-clear="true" data-placeholder="Pilih Mata Kuliah">
          @if ($creation->study_id)
            @foreach ($study as $item)
              <option value="{{ $item->id }}" {{ $creation->study_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
            @endforeach
          @else 
            <option value=""></option>
            @foreach ($study as $item)
              <option value="{{ $item->id }}" {{ old('study_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
            @endforeach
          @endif
        </select>
      </div>
    </div>
</div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="title" class="font-weight-bold">Title *</label>
      <div class="input-group border rounded">
          <input type="text" placeholder="Title" class="form-control" name="title" id="title" value="{{ old('title', $creation->title) }}" required>
      </div>
      </div>
    </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="text" class="font-weight-bold">Description *</label>
      <div class="input-group border rounded">
          <textarea name="description" id="text">
            {{ old('description', $creation->description ?? '') }}
          </textarea>
        </div>
      </div>
    </div>
</div>

<div class="row">
  @if ($creation->id)
  <div class="col-md-4">
    <img src="{{ $creation->thumbnail }}" class="img-thumbnail w-100">
  </div>
  @endif
    <div class="col-md-12">
      <div class="form-group">
        <label for="thumbnail" class="font-weight-bold">Thumbnail *</label>
        <div class="input-group border rounded btn-files">
          <input type="file" name="thumbnail" id="imgInp" placeholder="" value="" class="form-control border-0">
        </div>
      </div>
    </div>
</div>

<img style="display: none;" id='img-upload' class="w-25 img-thumbnail"/>

<div class="form-group">
  <label for="photo_creation" class="font-weight-bold">Add Photo *<span style="font-size: 12px; font-style: italic; font-weight: 300;">(Optional)</span></label>
  <input type="file" id="photo_creation" name="multi_photo[]" accept="image/*" multiple>
</div>

@push('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('script')
<script src="{{ asset('tinymce/tinymce.bundle.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/fileinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/themes/fas/theme.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
  var options = {
      selector: "#text", 
      width: 1150,
      height: 500,
      toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist checklist | casechange | insertfile link',
      plugins: 'link paste',
      paste_word_valid_elements: 'b,strong,i,em,h1,h2',
      mobile: {
        plugins: 'link paste',
        paste_word_valid_elements: 'b,strong,i,em,h1,h2',
        menubar: true
      }
  };

  tinymce.init(options);
</script>

<script>
  $("#photo_creation").fileinput({
    theme: "fas",
    showUpload: false
  });
  $(".btn-file").removeClass('btn-primary').addClass('btn-secondary');
        
  $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
  });

  $('.btn-file :file').on('fileselect', function(event, label) {
      var input = $(this).parents('.input-group').find(':text')
      log = label;
  });
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#img-upload').show()
              $('#img-upload').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
  }

  $("#imgInp").change(function(){
      readURL(this);
  });

  $('.select2').select2({
    theme: "classic"
  });
</script>
@endpush