<?php
$conn = mysqli_connect("localhost", "username", "password","crud");

$request=$_SERVER['REQUEST_METHOD'];
$data=array();

switch ($request){
    case 'GET':
         response(getData());
         break;
    case 'POST':
         response(addData());
         break;   
}
function getData(){
global $conn;

$query=mysqli_query($conn,"SELECT* FROM tbl_product");
while($row=mysqli_fetch_assoc($query)){
    $data[]=array('id'=>$row['id'],'name'=>$row['name'],'description'=>$row['description'],'image'=>$row['image'],'price'=>$row['price']);
}
return $data;
}


function addData(){
    global $conn;


 header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");



$data = json_decode(file_get_contents("php://input"), true); 
	
$fileName  =  $_FILES['image']['name'];
$tempPath  =  $_FILES['image']['tmp_name'];
$fileSize  =  $_FILES['image']['size'];


	$upload_path = '../shopping site/uploads/'; 
	
	$fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION)); 
		
	
	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
					
	
	if(in_array($fileExt, $valid_extensions))
	{				
	
		if(!file_exists($upload_path . $fileName))
		{
			
			if($fileSize < 5000000){
				move_uploaded_file($tempPath, $upload_path . $fileName); 
			}
			else{		
				$errorMSG = json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));	
				echo $errorMSG;
			}
		}
		else
		{		
			$errorMSG = json_encode(array("message" => "Sorry, file already exists check upload folder", "status" => false));	
			echo $errorMSG;
		}
	}
	else
	{		
		$errorMSG = json_encode(array("message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed", "status" => false));	
		echo $errorMSG;		
	}

    




    $query=mysqli_query($conn,"INSERT INTO tbl_product(name,description,image,price) VALUES('".$_POST['name']."','".$_POST['description']."','".$fileName."','".$_POST['price']."')") ;

    if($query==true){

        $data[]=array('message'=>'created');
    }else{
        $data[]=array('message'=>'not created');
    }

    return $data;

}


function response($data){
    echo json_encode($data);
}
?>
