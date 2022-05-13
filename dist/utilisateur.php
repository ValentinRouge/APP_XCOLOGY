<?php
session_start();
include_once('db/connexiondb.php');
$utilisateur_id = (int) $_SESSION['id'];

if (empty($utilisateur_id)) {
    header('Location: /');
    exit;
}

$req = $BDD->prepare("SELECT u.*, d.departement_nom
    FROM utilisateur u
    INNER JOIN departement d ON d.departement_code = u.departement
    WHERE u.ide = ?");
$req->execute(array($utilisateur_id));
$voir_utilisateur = $req->fetch();

if (!isset($voir_utilisateur['id'])) {
    header('Location: /');
    exit;
}

function age($date)
{
    $age = date('Y') - date('Y', strtotime($date));
    if (date('md') < date('md', strtotime($date))) {
        return $age - 1;
    }
    return $age;
}

?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, hrink-to-fit=no">

    <link rel="stylesheet" href="https///stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-gg0yR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title Profil de <?= $voir_utilisateur['pseudo'] ?></title>
</head>

</html>
