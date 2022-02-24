<?php
session_start();
if(isset($_SESSION['username'])){
    header("location: index.php");
}
?>
<html>
    <head>
        <title>LOG IN</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <link href="style.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
<body>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
<form action="proseslogin.php" method="POST">Z
        <tr>
            <td>Username :</td>
        </tr>
            <td><input type="text" name="username"></td>
        
        <tr>
            <td>Password :</td>
        </tr>
            <td><input type="password" name="password"></td>
        
        <tr>
            <td></td>
</tr>
            <td><input type="submit" value="LOG IN" name="login"></td>
        
        <tr>
            <td colspan="2"><center>Apakah anda seorang siswa? login 
                                    <a href="login_siswa.php">disini</a>
                            </center>
            </td>
        </tr>
    </table>
    </div>
</form>
</center>
</body>
</html>