<script>

function activar(id) {
  $.ajax({
    headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
    url: '{{ url('menu/activar') }}/' + id,
    type: 'GET',
    dataType: 'json',
    beforeSend: function () {
      $('.box').append('<div class="overlay">'+
                        '<i class="fa fa-refresh fa-spin"></i>'+
                       '</div>');
    },
    success: function () {
      $('.overlay').detach();
      toastr.success('Se activó el menu correctamente.');

      var page = $('.pagination .active span').html();
      var filtro = $('#buscar').val();
      generarTabla(page, filtro)
    },
    error: function (data) {
      $('.overlay').detach();
      mensaje('error', data, '#mensaje');
    }
  });
}

</script>