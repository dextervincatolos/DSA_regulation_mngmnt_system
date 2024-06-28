<script>
    
document.getElementById('studentCollege').addEventListener('change', function() {
    let collegeID = this.value;

    // Clear the current course options
    let courseSelect = document.getElementById('studentCourse');
    courseSelect.innerHTML = '<option value="">Select Course</option>';

    if (collegeID) {
        // Fetch courses for the selected college
        fetch('script/fetchCourses.php?collegeID=' + collegeID).then(response => response.json()) .then(data => {
            data.forEach(course => {
                let option = document.createElement('option');
                option.value = course.courseID;
                option.text = course.course_name;
                courseSelect.add(option);
            });
        })
            .catch(error => console.error('Error fetching courses:', error));
    }
});
</script>