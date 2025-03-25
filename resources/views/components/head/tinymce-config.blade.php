<script src="{{ asset('vendor/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#editor',
    plugins: 'table lists',
    toolbar: 'undo redo| bold italic | alignleft aligncenter alignright | bullist numlist |'
  });
</script>
