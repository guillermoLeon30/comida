<script>

$("#imagen").fileinput({
  showPreview: false,
  showUpload: false,
  elErrorContainer: '#imagen-errors',
  allowedFileTypes: ["image"],
  language: "es",
  minImageHeight: 520,
  maxFileSize: 1024, //1MB
});

</script>