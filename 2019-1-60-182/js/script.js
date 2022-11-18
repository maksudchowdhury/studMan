const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

// myModal.addEventListener('shown.bs.modal', () => {
//   myInput.focus()
// });


function limiter(){
  var marksBox = document.getElementById("examMarks");
  // if (marksBox.value > 20){ 
  //   marksBox.value = 20;
  // }

  if( marksBox.value =='e' || marksBox.value =='E' || marksBox.value =='-' || marksBox.value =='+' ){
    marksBox.value = 0;
  }

}


function toggleVal(item){
  var result = document.getElementById(item).checked;
  return result;
}

function passwordToggleAction(){
  var toggled = toggleVal('passwordToggle');
  if(toggled){
    document.getElementById('passwordToggle').value = 'true';
    document.getElementById('changePass').disabled = false;
    document.getElementById('changePass').value = 'student';
    document.getElementById('defPassSpan').innerHTML='&nbsp;&nbsp;&nbsp; New Password';
  }
  else{
    document.getElementById('passwordToggle').value = 'false';
    document.getElementById('changePass').disabled = true;
    document.getElementById('changePass').value = '';
    document.getElementById('changePass').placeholder = "user's current password";
    document.getElementById('defPassSpan').innerHTML='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Password';
  }
}

function imageToggleAction(){
  var toggled = toggleVal('imageToggle');
  if(toggled){
    document.getElementById('imageToggle').value = 'true';
    document.getElementById('imageFileName').disabled = false;
  }
  else{
    document.getElementById('imageToggle').value = 'false';
    document.getElementById('imageFileName').disabled = true;
  }
}



function addMark(){
  var examMarks=document.getElementById('examMarks');
  var examName=document.getElementById('examName');
  if(examMarks.disabled && examName.disabled){
    alert ("Please Fill out the necessary fields first");

  }
  else{
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
  markData.mark= document.getElementById("examMarksObtained").value;

  
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


function gradePolicy(){

  var quizWt = document.getElementById("quizWt").value;
  var classworkWt = document.getElementById("classworkWt").value;
  var mid1Wt = document.getElementById("mid1Wt").value;
  var mid2Wt = document.getElementById("mid2Wt").value;
  var finalWt = document.getElementById("finalWt").value;

  var quizTm = document.getElementById("quizTm").value;
  var classworkTm = document.getElementById("classworkTm").value;
  var mid1Tm = document.getElementById("mid1Tm").value;
  var mid2Tm = document.getElementById("mid2Tm").value;
  var finalTm = document.getElementById("finalTm").value;

  var totalMarkOfCourse = ((quizWt*quizTm) + (classworkWt*classworkTm) + (mid1Wt*mid1Tm) + (mid2Wt*mid2Tm) + (finalWt*finalTm))/100;
  document.getElementById("totalMarkOfCourse").value = totalMarkOfCourse;
  document.getElementById("totalMarkOfCourse").innerHTML = totalMarkOfCourse;
  // console.log(totalMarkOfCourse);

  if(totalMarkOfCourse!=100){
    document.getElementById("examName").disabled=true;
    document.getElementById("examMarks").disabled=true;
    document.getElementById("totalMarkOfCourse").className="btn bg-danger bg-opacity-25 text-dark w-100";
  }
  else if(totalMarkOfCourse==100){
    document.getElementById("totalMarkOfCourse").className="btn bg-success bg-opacity-25 text-dark w-100";
    document.getElementById("examName").disabled=false;
    document.getElementById("examMarks").disabled=false;
    var weightName = document.getElementById("examName").value+"Wt";
    var weight = document.getElementById(weightName).value/100;
    var givenMarks=document.getElementById("examMarks").value;
    document.getElementById("examMarksObtained").value=givenMarks*weight;
    document.getElementById("examMarksObtained").innerHTML=givenMarks*weight/100;

  }
}