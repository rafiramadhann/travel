$(document).ready(function(){


$(function() {
  
    $('.tampilData').on('click', function(){

        $('.modal-title').html('Detail Paket');

        const slug = $(this).data('slug');
        
        $.ajax({
            url: "http://localhost:8080/travel/public/paket/detail",
            data: {slug : slug},
            method: 'post',
            dataType: 'json',
            success: function(data){

                $('#judul').html(data.name);
                $('#price-paket').html("Rp. " + data.price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                $('#promosi-paket').html(data.promosi);
                $('#description-paket').html(data.description);
            }
        });

    }); 


    $('.tampilDataHotel').on('click', function(){

        $('.modal-title').html('Detail Hotel');

        const slug = $(this).data('slug');

        $.ajax({
            url: "http://localhost:8080/travel/public/hotel/detail",
            data: {slug : slug},
            method: 'post',
            dataType: 'json',
            success: function(data){

                $('#judul').html(data.name);
                $('#price-hotel').html("Rp. " + data.price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                $('#facility-hotel').html(data.facility);
                
            }
        });
        
      }); 
      
      $('.tampilRoom').on('click', function(){
        
        $('#addRoomModal').html('Check Out');
        
        var hotel_id = $(this).data('id');
        var room_no = $(this).data('slug');

        // console.log(hotel_id);
        // console.log(room_no);

        $.ajax({
            url: "http://localhost:8080/travel/public/hotel/details",
            data: {room_no : room_no, hotel_id : hotel_id},
            method: 'post',
            dataType: 'json',
            success: function(data){
  
              console.log(data);

                $('#no_kamar').html(data.room_no);
                $('#name').html(data.u_name);
                $('#no_telp').html(data.no_telp);
                $('#dewasa').html(data.total_dewasa);
                $('#anak').html(data.total_anak);
                $('#checkin').html(data.checkin);
                $('#checkout').html(data.checkout);
                $('#price').html(data.hotel_fee.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                $('#add_fee').html(data.fasilitas_fee.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                $('#total_price').html(data.total_price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                $('#room_no').val(data.room_no);
            }
        });

    })


////////////////////////////////////////



    $('.isAdminEdit').on('click', function(){

      $('.modal-title').html('User Management');

        const id = $(this).data('id');
        
        $.ajax({
          url: "http://localhost:8080/travel/public/user/getUpdate",
          data: {id : id},
          method: 'post',
          dataType: 'json',
          success: function(data){
            
            $('input[type=radio]').change(function(){
              $('input[type=hidden]').attr('value', data.id)
              })
            }
        });

    }); 

});

////////////////////////////////////////

    $('#check1, #check2, #check3').hide();

    $('#check1').click(function(){
        $(this).is(':checked') ? $('#u_password').attr('type', 'text') : $('#u_password').attr('type', 'password');
        $(this).is(':checked') ? $('#show-p1').removeClass('bi-eye').addClass('bi-eye-slash') : $('#show-p1').removeClass('bi-eye-slash').addClass('bi-eye');
    });

    $('#check2').click(function(){
        $(this).is(':checked') ? $('#n_password').attr('type', 'text') : $('#n_password').attr('type', 'password');
        $(this).is(':checked') ? $('#show-p2').removeClass('bi-eye').addClass('bi-eye-slash') : $('#show-p2').removeClass('bi-eye-slash').addClass('bi-eye');
    });

    $('#check3').click(function(){
        $(this).is(':checked') ? $('#cn_password').attr('type', 'text') : $('#cn_password').attr('type', 'password');
        $(this).is(':checked') ? $('#show-p3').removeClass('bi-eye').addClass('bi-eye-slash') : $('#show-p3').removeClass('bi-eye-slash').addClass('bi-eye');
    });
    
    //////////////////////////////////
    
// Restricts input for each element in the set of matched elements to the given inputFilter.
(function($) {
  $.fn.inputFilter = function(callback, errMsg) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop focusout", function(e) {
      if (callback(this.value)) {
        // Accepted value
        if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
          $(this).removeClass("input-error");
          this.setCustomValidity("");
        }
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        // Rejected value - restore the previous one
        $(this).addClass("input-error");
        this.setCustomValidity(errMsg);
        this.reportValidity();
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        // Rejected value - nothing to restore
        this.value = "";
      }
    });
  };
}(jQuery));


// Install input filters.
$("#no_telp").inputFilter(function(value) {
  return /^-?\d*$/.test(value); }, "Must be a number!");
$("#no_rekening").inputFilter(function(value) {
  return /^-?\d*$/.test(value); }, "Must be a number!");

  ///////////////////////////////////////////////


})
