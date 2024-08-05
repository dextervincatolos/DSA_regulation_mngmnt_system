<script>
    $(document).ready(function() {
        // Attach click event to dynamically added buttons
        $(document).on('click', '.add_sanction', function(e) {
            e.preventDefault();
            // Get the policy ID from the data attribute
            let policyID = $(this).data('policy-id');
            // Append the new input field to the correct update_sanction container
            $("#update_sanction_" + policyID).append(`<div class="row">
                                    <div class="form-group col-md-11">
                                      <input type="text" name="policy_sanction[]" class="form-control" required placeholder="Write sanction here">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <button type="button" class="form-control btn btn-danger btn-sm discard_new_sanction"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>`);
        });

        // Attach click event to dynamically added remove buttons
        $(document).on('click', '.discard_new_sanction', function(e) {
            e.preventDefault();
            $(this).closest('.row').remove();
        });
    });
</script>
