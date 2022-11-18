function loadInstructor() {
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var semester = document.getElementById("studentSemester").value;
    var year = document.getElementById("studentYear").value;
    var url = "dropdown.php?menu=instructor&semester=" + semester + "&year=" + year;
  

    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var instructor_data = JSON.parse(this.responseText);
            console.log(instructor_data);
            var options = "";
            // options += "<option>" +"<p><small>Select option</small></p>"+ "</option>";
            for (var i = 0; i < instructor_data.length; i++) {
                options += "<option>" + instructor_data[i].instructor_codename + "</option>";
            }
            document.getElementById("instructorName").innerHTML = options;
        }
    };
}

function loadCourse() {
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var semester = document.getElementById("studentSemester").value;
    var year = document.getElementById("studentYear").value;
    var instructor = document.getElementById("instructorName").value;
    var url = "dropdown.php?menu=course&semester=" + semester + "&year=" + year + "&instructor=" + instructor;

    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var course_data = JSON.parse(this.responseText);
            console.log(course_data);
            var options = "";
            // options += "<option>" +"<p><small>Select option</small></p>"+ "</option>";
            for (var i = 0; i < course_data.length; i++) {
                options += "<option>" + course_data[i].course_name + "</option>";
            }
            document.getElementById("courseName").innerHTML = options;
        }
    };
}



function loadSection() {
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var semester = document.getElementById("studentSemester").value;
    var year = document.getElementById("studentYear").value;
    var instructor = document.getElementById("instructorName").value;
    var course = document.getElementById("courseName").value;
    var url = "dropdown.php?menu=section&semester=" + semester + "&year=" + year + "&instructor=" + instructor+ "&course=" + course;

    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var section_data = JSON.parse(this.responseText);
            console.log(section_data);
            var options = "";
            // options += "<option>" +"<p><small>Select option</small></p>"+ "</option>";   
            for (var i = 0; i < section_data.length; i++) {
                options += "<option>" + section_data[i].course_section + "</option>";
            }
            document.getElementById("sectionNumber").innerHTML = options;
        }
    };
}