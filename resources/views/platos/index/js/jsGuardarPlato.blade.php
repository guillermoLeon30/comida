<script>

$('#formIngresarPlato').submit(function (e) {
  e.preventDefault();

  var form = $('#formIngresarPlato')[0];
  var datos = new FormData(form);
  
  $.ajax({
    headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
    url: '{{ url('platos') }}',
    type: 'POST',
    data: datos,
    dataType: 'json',
    contentType: false,
    processData: false,
    beforeSend: function () {
      $('.box').append('<div class="overlay">'+
                        '<i class="fa fa-refresh fa-spin"></i>'+
                       '</div>');

      $('#modalIngresar').modal('hide');
    },
    success: function () {
      $('.overlay').detach();
      toastr.success('Se ingresó el plato correctamente.');

      var page = $('.pagination .active span').html();
      var filtro = $('#buscar').val();
      generarTabla(page, filtro)
    },
    error: function (data) {
      $('.overlay').detach();

      mensaje('error', data, '#mensaje');
    }
  });
});

</script>