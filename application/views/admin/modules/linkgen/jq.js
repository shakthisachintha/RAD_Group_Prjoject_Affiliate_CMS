


  $(document).ready(function(){

    $("#link_gen").submit(function(e) {

        var form = $(this);
        var url = form.attr('action');
      
        $.ajax({
               type: "POST",
               url: url,
               data: form.serialize(), // serializes the form's elements.
               success: function(data)
               {    
                        alert(data);
                        var obj = JSON.parse(data);
                        $('#linkid').val(obj.id);
                        $('#link').val(obj.link);
                 
               }
             });
      
        e.preventDefault(); // avoid to execute the actual submit of the form.
      });
    


  });