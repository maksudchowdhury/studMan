function addMark(){
    
    var ajax = new XMLHttpRequest();
    var method = "POST";
    var url = "addMark.php";
    var asynchronous = true;
    var markData = {};
    markData.studentID= document.getElementById("studentID").value;
    markData.semester= document.getElementById("studentSemester").value;
    markData.year= document.getElementById("studentYear").value;
    markData.instructor= document.getElementById("instructorName").value;
    markData.course= document.getElementById("courseName").value;
    markData.section= document.getElementById("sectionNumber").value;
    markData.exam= document.getElementById("examName").value;
    markData.mark= document.getElementById("examMarks").value;

    
    console.log(markData);
    ajax.open(method, url, asynchronous);
    ajax.setRequestHeader('Content-type', 'application/json');
    var JSONmarkData = JSON.stringify(markData);
    ajax.send(JSONmarkData);

    ajax.onreadystatechange = function () {
        if (this.readyState ==4 && this.status == 200){
            var response = JSON.parse(this.responseText);
            alert(response['message']);
        }
    };
    
}


function deleteMark(){
    
    var ajax = new XMLHttpRequest();
    var method = "POST";
    var url = "deleteMark.php";
    var asynchronous = true;
    var markData = {};
    markData.studentID= document.getElementById("studentID").value;
    markData.semester= document.getElementById("studentSemester").value;
    markData.year= document.getElementById("studentYear").value;
    markData.instructor= document.getElementById("instructorName").value;
    markData.course= document.getElementById("courseName").value;
    markData.section= document.getElementById("sectionNumber").value;
    markData.exam= document.getElementById("examName").value;
    markData.mark= document.getElementById("examMarks").value;

    
    console.log(markData);
    ajax.open(method, url, asynchronous);
    ajax.setRequestHeader('Content-type', 'application/json');
    var JSONmarkData = JSON.stringify(markData);
    ajax.send(JSONmarkData);

    ajax.onreadystatechange = function () {
        if (this.readyState ==4 && this.status == 200){
            var response = JSON.parse(this.responseText);
            alert(response['message']);
        }
    };
    
}