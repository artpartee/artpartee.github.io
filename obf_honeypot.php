<html>
<head>
<title>E-Mail Obfuscating</title>
</head>
<body>
<?php
$email = "example@email.org";
echo "<a class='emailLink' href='mailto:admin@localhost.localdomain' >Send me an e-mail!</a>"
    ."<span style='display:none' data-hash='" . base64_encode($email) . "' />";
?>
<script>
<!--
var emailLinks = document.getElementsByClassName("emailLink");
setTimeout(function() {
    for(var i=0; i <emailLinks.length; ++i){
        emailLinks[i].addEventListener("click", function(){
            let encodedEmail = this.nextSibling.getAttribute('data-hash');
            let decodedEmail = atob(encodedEmail);
            this.href = "mailto:" + decodedEmail;
            this.text = decodedEmail;
        });
    }
}, 1000);

-->
</script>
</body>
</html>