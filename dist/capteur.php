

<?php
$connection = mysqli_connect("herogu.garageisep.com", "ETgzwb9R7W_appg10b", "SlF7CIqbxeiI45Gl","GFAheoPxRI_appg10b");
$query = mysqli_query($connection,"select * from Utilisateur");
print(mysqli_num_rows($query))
?>