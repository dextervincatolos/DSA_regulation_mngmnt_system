<script>

    document.addEventListener('DOMContentLoaded', function() {
        // Initially disable the violatedPolicy select element
        document.getElementById('violatedPolicy').disabled = true;

        // Add event listener to the semester select element
        document.getElementById('semester').addEventListener('change', function() {
            let violatedPolicySelect = document.getElementById('violatedPolicy');
            if (this.value) {
                // Enable the violatedPolicy select element if a semester is selected
                violatedPolicySelect.disabled = false;
                $('#violatedPolicy').selectpicker('refresh');
            } else {
                // Disable the violatedPolicy select element if no semester is selected
                violatedPolicySelect.disabled = true;
                $('#violatedPolicy').selectpicker('refresh');
            }
        });

    document.getElementById('violatedPolicy').addEventListener('change', function() {
        let policyID = this.value;
        let studentID = document.getElementById('student').value;
        let semID = document.getElementById('semester').value;
        let sy = document.getElementById('sy').value;

        let sanctionSelect = document.getElementById('policySanction');
        sanctionSelect.innerHTML = ''; // Clear options

        if (policyID && studentID && semID && sy) {
            // Fetch sanctions
            fetch(`script/fetchSanction.php?policyID=${policyID}&studentID=${studentID}&semesterID=${semID}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    data.sanctions.forEach(sanction => {
                        let option = document.createElement('option');
                        option.setAttribute('data-tokens', sanction.sanctionID);
                        option.value = sanction.sanctionID;
                        option.text = sanction.sanction;
                        sanctionSelect.add(option);
                    });
                    $('#policySanction').selectpicker('refresh');
                })
                .catch(error => console.error('Error fetching sanctions:', error));

            // Check for existing violations
            fetch(`script/checkViolation.php?policyID=${policyID}&studentID=${studentID}&semesterID=${semID}&sy=${sy}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    let violationMessage = document.getElementById('violationMessage');
                    if (data.error) {
                        violationMessage.innerHTML = `Error: ${data.error}`;
                    } else if (data.exists) {
                        let sanctionsList = '<ol>';
                        data.sanctions.split(', ').forEach(sanction => {
                            sanctionsList += `<li>${sanction}</li>`;
                        });
                        sanctionsList += '</ol>';
                        violationMessage.innerHTML = `  <div class="alert alert-warning alert-dismissible">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <h5><i class="icon fas fa-exclamation-triangle"></i> This student has already violated this policy in the current semester!</h5>
                                                            <b>Given Sanctions:</b> ${sanctionsList}

                                                            <h5>Note: Please make sure to assign sanction </h5>
                                                        </div>`;
                    } else {
                        violationMessage.innerHTML = '';
                    }
                })
                .catch(error => {
                    let violationMessage = document.getElementById('violationMessage');
                    violationMessage.innerHTML = `Error checking violations: ${error.message}`;
                    console.error('Error checking violations:', error);
                });
        } else {
            $('#policySanction').selectpicker('refresh');
        }
    });

});
</script>