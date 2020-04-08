(function($) {
  'use strict';
  $(function() {
    $('.file-upload-browse').on('click', function() {
      var file = $(this).parent().parent().parent().find('.file-upload-default');
      file.trigger('click');
    });
    $('.file-upload-default').on('change', function() {
      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
  });
  $(document).ready(function() {
    $(".select2").select2();
    $('#inlinedatetimepicker').datetimepicker({
        inline: true,
        sideBySide: true
    });
    $('#datepicker').datetimepicker({
        format: 'L'
    });
    $('#timepicker').datetimepicker({
        format: 'LT'
    })
  })
})(jQuery);