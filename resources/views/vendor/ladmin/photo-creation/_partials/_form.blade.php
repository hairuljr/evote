<div class="row mb-5" id="images">
  @forelse ($photocreation as $item)
    <div class="col-md-4">
      <img src="{{ $item->picture }}" class="img-thumbnail w-75">
    </div>
  @empty
    <p>Belum ada foto karya yang ditambahkan</p>
  @endforelse
</div>

<input type="hidden" name="creation_id" value="{{ $creation_id }}">

<div class="form-group">
  <label for="photo_creation" class="font-weight-bold">Update Photo<span style="font-size: 12px; font-style: italic; font-weight: 300;">(Optional)</span></label>
  <input type="file" id="photo_creation" name="multi_photo[]" accept="image/*" multiple>
</div>

@push('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.10.2/viewer.css" integrity="sha512-HGWrJz+Lr07phD0DNoLsSVwn3przno/eSLf1cGOrLzr6c7NUZROZJPhQdSPmLHNbsO0HP2UfUnpKTMiVxonEHw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/fileinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/themes/fas/theme.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.10.2/viewer.min.js" integrity="sha512-lzNiA4Ry7CjL8ewMGFZ5XD4wIVaUhvV3Ct9BeFmWmyq6MFc42AdOCUiuUtQgkrVVELHA1kT7xfSLoihwssusQw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
  const gallery = new Viewer(document.getElementById('images'));

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
</script>
@endpush