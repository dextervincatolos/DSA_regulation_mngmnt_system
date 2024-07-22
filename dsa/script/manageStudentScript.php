<script>

document.getElementById('studentCollege').addEventListener('change', function() {
    let collegeID = this.value;

    let courseSelect = document.getElementById('studentCourse');
    courseSelect.innerHTML = ''; // Clear options

    if (collegeID) {
        
        fetch('script/fetchCourses.php?collegeID=' + collegeID)
            .then(response => {
                return response.json();
            })
            .then(data => {
                data.forEach(course => {
                    let option = document.createElement('option');
                    option.setAttribute('data-tokens', course.courseID);
                    option.value = course.courseID;
                    option.text = course.course_name;
                    courseSelect.add(option);
                });

                $('#studentCourse').selectpicker('refresh');
            })
            .catch(error => console.error('Error fetching Courses:', error));
    } else {
        $('#studentCourse').selectpicker('refresh');
    }
});
</script>