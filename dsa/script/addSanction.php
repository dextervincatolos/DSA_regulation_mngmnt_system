<script>
      
      $(document).ready(function(){
        $(".create_new_sanction").click(function(e){
            e.preventDefault();
            $("#add_sanction").append(`<div class="row">
                                    <div class="form-group col-md-11">
                                      <input type="text" name="policy_sanction[]" class="form-control" required placeholder="Write sanction here">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <button class="form-control btn btn-danger btn-sm discard_new_sanction"><i class="fa fa-minus"></i></button>
                                    </div>

                                        </div>`);
        });
        $(document).on('click', '.discard_new_sanction', function(e){
            e.preventDefault();
            let row_children = $(this).parent().parent();
            $(row_children).remove();
        });




    });
</script>