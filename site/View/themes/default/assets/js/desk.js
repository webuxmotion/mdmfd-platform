var desk = {
   ajaxMethod: 'POST',

   update: function(event, button) {
     event.preventDefault();

      var formData = new FormData();

      formData.append('id', $('#desk_id').val());
      formData.append('user_id', $('#user_id').val());
      formData.append('name', $('#name').val());
      formData.append('segment', $('#segment').val());

      $.ajax({
          url: '/desk/update/',
          type: this.ajaxMethod,
          data: formData,
          cache: false,
          processData: false,
          contentType: false,
          beforeSend: function(){

          },
          success: function(result){
            window.location.href = JSON.parse(result).segment;
          }
      });
    }
};
