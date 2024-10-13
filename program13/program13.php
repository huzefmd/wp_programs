<?php
session_start();
function Genrate_Captcha_Code($length=6){
    $chars="ABCDEFGHIJKLMNOPQRSUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $captcha="";
    for ($i=0;$i<$length;$i++){
        $index=rand(0,strlen($chars)-1);
        $captcha.=$chars[$index];
    }
    return $captcha;

}

$_SESSION['captcha'] = Genrate_Captcha_Code(6);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAPTCHA Input Example</title>
</head>
<body>

<h2>Please Complete the CAPTCHA</h2>

<form action="verify.php" method="POST">
    <label for="captcha">Enter the CAPTCHA: </label>
    <strong><?php echo $_SESSION['captcha']; ?></strong>  <!-- Display the CAPTCHA -->

    <br><br>
    <input type="text" name="user_captcha" required placeholder="Enter CAPTCHA">
    <br><br>
    <button type="submit">Submit</button>
</form>

</body>
</html>

