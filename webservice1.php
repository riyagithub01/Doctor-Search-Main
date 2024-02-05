<?php
  $search_param=$_POST["search"];
  $search_area=$_POST["area"];

  if(isset($_POST["search"]) && isset($_POST["area"])){
   // echo $search_param;
   // echo $search_area;

  $host="localhost";
  $dbuser="id20793062_doctorsearch";
  $dbpass="Doctor@123";
  $dbname="id20793062_doctorsearch";

    $conn=new mysqli($host, $dbuser, $dbpass, $dbname); 
    $sql="SELECT * FROM doctors WHERE DoctorArea like '%".$search_area."%' and DoctorCategory like '%".$search_param."%'";

    $result=$conn->query($sql);
    

    if($result->num_rows>0)
    {
      $data='<div class="lblservicetitle">Doctors found in your area</div>';
        $doctor_data="";

        while($row=$result->fetch_assoc())
        {
            $doctorid=$row["ID"];
            $doctorname=$row["DoctorName"];
            $doctorinfo=$row["DoctorInformation"];
            $doctorimage=$row["DoctorImage"];
            
            
            $doctor_data=$doctor_data.'<div class="serachsection">
            <div class="search">
              <img class="searchicon" alt="" src="'.$doctorimage.'" />
            </div>
            <div class="titledescription">
              <p class="search-doctor">'.$doctorname.'</p>
              <p class="blank-line">&nbsp;</p>
              <p class="finding-a-doctor-you-can-build">'.$doctorinfo.' </p>
            </div>
          </div>';
             
        }

        
    }else{
      $data='<div class="lblservicetitle">No Doctors found in your area</div>';  
    }
}else{
  $data='<div class="lblservicetitle">Bad Query</div>'; 
}
$data=$data.$doctor_data;
echo $data;
?>