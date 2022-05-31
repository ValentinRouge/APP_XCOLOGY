<!DOCTYPE html>
<html lang = 'en'>
<title>Foire aux questions</title>	
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="./css/faq.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

	
</head>
<body>
	
	<?php include 'header.php'; 
            include 'php_func/connectionToBDD.php';
            ?>
	<div class="inside">
		
		<div class="faq_header">
			<h1 class="Faq">Foire aux questions</h1>
			<img src="../img/faq2.PNG" width="90px" height="90px" class="img">	
			<img src="../img/faq.PNG" width="90px" height="90px" class="img" >
			<img src="../img/faq3.PNG" width="90px" height="90px" class="img" >
		</div>
		<main>
			<img src="./img/faq1.PNG" alt="faq"class="img1">
			<div "main-content">
					<?php

						$requet = "SELECT question, answer FROM FAQ";
						$result = $connection->query($requet);
						while($row = $result->fetch_assoc()){
							printf("
							<div class=\"question-answer\">
								<div class=\"question\"> 
									<h2 class=\"question\">%s</h2>
									<button class=\"faq-button\">
										<span class=\"up-icon\">
											<i class=\"fa-solid fa-chevron-up\"></i>
										</span>
										<span class=\"down-icon\">
											<i class=\"fa-solid fa-chevron-down\"></i>
										</span>
									</button> 
								</div>
								<div class=\"answer\">
									<p class=\"answer\">%s</p>
								</div>
							</div>	",$row['question'],$row['answer']);
						}

					?>
                </div>
			</div>	
	
                
		</main>
	</div>	
	<script src="../js/faq.js"></script>	
    <?php include 'html/footer.html'; ?>
</body>
</html>