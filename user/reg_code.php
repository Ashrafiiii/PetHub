<?PHP 
include "connect.php";
//error_reporting(0);

if (isset($_POST['register'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];    
    $profile_picture = $_FILES['profile_picture']['name'];
    $DOB = $_POST['DOB'];
    $age = $_POST['age'];
    $pwd=$_POST['pwd'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $district=$_POST['district'];
    $town_village=$_POST['town_village'];
    $PIN=$_POST['PIN'];
    $road=$_POST['road'];
    $landmark=$_POST['landmark'];
    $pet_quant=$_POST['pets_quant'];






    $extension = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
    $unique_name = uniqid() . '.' . $extension;
    $folder = "images/".$unique_name;
    move_uploaded_file($_FILES['profile_picture']['tmp_name'], $folder);

    $q = "SELECT * FROM users WHERE email='$email' AND phone_no='$phone_no'";
    $data = mysqli_query($con, $q);

    if(mysqli_num_rows($data) == 0) {
        $q1 = "INSERT INTO users(l_name,f_name,pets_quant,phone_no,age,email,DOB,country,state,district,town_village,PIN,landmark,road,pwd,profile_picture) VALUES('$l_name', '$f_name','$pet_quant','$phone_no', '$age', '$email', '$DOB', '$country', '$state', '$district', '$town_village', '$PIN','$landmark', '$road','$pwd', '$folder' )";
        if(mysqli_query($con, $q1)){
            header("Location: UserProfile.php");
            exit();
        }
    } else {
        echo "Already exists";
    }
}
?>
