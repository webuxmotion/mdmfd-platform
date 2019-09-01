var page = {
    ajaxMethod: 'POST',

    add: function() {
        var formData = new FormData();

        formData.append('title', $('#formTitle').val());
        formData.append('content', $('.redactor-editor').html());

        $.ajax({
            url: '/admin/page/add/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
              window.location = '/admin/pages/edit/' + result;
            }
        });
    },

   update: function(button) {
        var formData = new FormData();

        formData.append('page_id', $('#formPageId').val());
        formData.append('title', $('#formTitle').val());
        formData.append('link', $('#formLink').val());
        formData.append('color', $('[name=color]:checked').val());
        formData.append('content', $('.redactor-editor').html());
        formData.append('markdown', markdownEditor.getMarkdown());
        formData.append('status', $('#status').val());
        formData.append('type', $('#type').val());

        $(button).addClass('loading');

        $.ajax({
            url: '/page/update/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

              console.log(result);
              //window.location.reload();
            }
        });
    }, 
    updateSegment: function(pageId, element) {
        var formData = new FormData();

        formData.append('page_id', pageId);
        formData.append('segment', $(element).val());

        var _this = this;
        $.ajax({
            url: '/admin/page/ajaxUpdateSegment/',
            type: this.ajaxMethod,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
              result = JSON.parse(result);
              if (result.success == "false") {
                alert(result.message);
              }
              window.location.reload();
            }
        });
    }, 
    remove: function(id) {

      if(!confirm('Delete the page?')) {
          return false;
      }

      var formData = new FormData();

      formData.append('id', id);

      if (id < 1) {
          return false;
      }

      $.ajax({
          url: '/page/delete/',
          type: this.ajaxMethod,
          data: formData,
          processData: false,
          contentType: false,
          beforeSend: function(){

          },
          success: function(result){
              $('.js-page-' + id).remove();
          }
      });
  }
};
