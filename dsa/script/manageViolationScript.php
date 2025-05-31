<script>

    document.addEventListener('DOMContentLoaded', function() { 

        const semesterDropdown = document.getElementById('semester');
        const yearLevelDropdown = document.getElementById('yearlvl');
        const violatedPolicySelect = document.getElementById('violatedPolicy');

        // Auto-select current semester
        const currentMonth = new Date().getMonth(); 
        let currentSemester;
        if (currentMonth >= 0 && currentMonth <= 4) {
            currentSemester = '2nd';
        } else if (currentMonth >= 6 && currentMonth <= 11) {
            currentSemester = '1st';
        }

        if (currentSemester) {
            for (let option of semesterDropdown.options) {
                if (option.textContent.includes(currentSemester + " Semester")) {
                    option.selected = true;
                    semesterDropdown.value = option.value; // Update value
                    break;
                }
            }
        }

        // Enable or disable the policy field based on both semester and year level
        function checkEnablePolicy() {
            const semesterValue = semesterDropdown.value;
            const yearLevelValue = yearLevelDropdown.value;

            if (semesterValue && yearLevelValue) {
                violatedPolicySelect.disabled = false;
            } else {
                violatedPolicySelect.disabled = true;
            }
            $('#violatedPolicy').selectpicker('refresh'); // Refresh Bootstrap-select
        }

        // Even though semester dropdown is disabled, we call the check once
        checkEnablePolicy();

        // Listen for year level change
        yearLevelDropdown.addEventListener('change', function () {
            checkEnablePolicy();
        });

        document.getElementById('violatedPolicy').addEventListener('change', function() {
            let policyID = this.value;
            let studentID = document.getElementById('student').value;
            let semID = document.getElementById('semester').value;
            let sy = document.getElementById('sy').value;

            let sanctionSelect = document.getElementById('policySanction');
            sanctionSelect.innerHTML = '';

            if (policyID && studentID && semID && sy) {
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