/**
 * Created by Toshiba on 10/27/2018.
 */
<!-- Delay table load until everything else is loaded -->

$(window).load(function(){
    $('#postTable').removeAttr('style');
    })


// user details
$(document).on('click', '.ci-modal', function() {
    $('.modal-title').text('Users');
    $('#id').val($(this).data('id'));
    $('#status').val($(this).data('status'));
    $('#name').val($(this).data('name'));
    $('#email').val($(this).data('email'));
    $('#phone_number').val($(this).data('phone_number'));
    id = $('#id').val();
    $('#CiModal').modal('show');
});

