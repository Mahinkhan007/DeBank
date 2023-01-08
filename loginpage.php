<!DOCTYPE html>
<html lang="en">
<?php 

include 'con.php';
session_start();
?>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>DeBank</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Coming+Soon&family=Freehand&display=swap" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet" />
	<link rel="icon" href="pictures\favicon.ico" />
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
		integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
		crossorigin="anonymous"></script>
	<script src="index.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
		integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
		crossorigin="anonymous"></script>

	<link rel="stylesheet" href="loginpage.css" />
	<!-- fontawsomme -->
	<script src="https://kit.fontawesome.com/5927abc58c.js" crossorigin="anonymous"></script>
</head>

<body>
	<img class="mb-2 signin-logo" src="pictures/D.png" alt="DeBanklogo" />
	<h1 class="welcome">Welcome <?php echo $_SESSION['user']['f_name'] ?> to your DeBank account</h1>
	<p><a style="font-size: 20px; text-decoration: none; color: red" href="logout.php">logout</a></p>
	<main class="app">
		<!-- BALANCE -->
		<div class="balance">
			<div>
				<p class="balance__label">Current balance</p>
				<p class="balance__date">
					As of <span class="date"><?php echo date('d/m/Y') ?></span>
				</p>
			</div>
			<?php 
			 	// get user balance from database
				$user_id = $_SESSION['user']['id'];
				$sql = "SELECT * FROM users WHERE id = '$user_id'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				$balance = $row['balance'];
			?>
			<p class="balance__value">
			<?php echo $balance ?>	€
			</p>
		</div>

		<!-- MOVEMENTS -->
		<div class="movements">
			<?php 
				// get all transactions from database 
				$sql = "SELECT * FROM transactions WHERE user_id = '$user_id'";
				$result = mysqli_query($conn, $sql);
				$transactions = mysqli_fetch_all($result, MYSQLI_ASSOC);
				// print_r($transactions);
			?>
			<?php 
			$i = 1;
			foreach( $transactions as $transaction ): ?>
			<div class="movements__row">
				<div class="movements__type movements__type--<?php echo $transaction['amount'][0] == '+' ? 'deposit' : 'withdrawal' ?>"><?php echo $i?>
					<?php echo $transaction['amount'][0] == '+' ? 'cash in' : 'cash out' ?>
				</div>
				<div class="movements__date"><?php echo date( "m/d/Y h:i a", strtotime($transaction['date'])); ?></div>
				<div class="movements__value"> <?php echo $transaction['amount'] ?> €</div>
			</div>
			<?php $i++; endforeach; ?>
			<!-- <div class="movements__row">
				<div class="movements__type movements__type--withdrawal">
					1. withdrawal
				</div>
				<div class="movements__date">24/01/2037</div>
				<div class="movements__value">-378€</div>
			</div> -->
		</div>

		<!-- SUMMARY -->
		<!-- <div class="summary">
			<p class="summary__label">In</p>
			<p class="summary__value summary__value--in">0000€</p>
			<p class="summary__label">Out</p>
			<p class="summary__value summary__value--out">0000€</p>
			<p class="summary__label">Interest</p>
			<p class="summary__value summary__value--interest">0000€</p>
			<button class="btn--sort">&downarrow; SORT</button>
		</div> -->

		<!-- OPERATION: TRANSFERS -->
		<div class="operation operation--transfer">
			<h2 class="Transfer-Money-h2">Transfer money</h2>
			<form class="form form--transfer" action="transfer.php" method="POST">
				<input name="email" type="email" class="form__input form__input--to" />
				<input name="amount" type="number" class="form__input form__input--amount" />
				<input name="transfer" type="submit" value="&rarr;" class="form__btn form__btn--transfer">
				<label class="form__label">Transfer to</label>
				<label class="form__label">Amount</label>
			</form>
		</div>

		<!-- OPERATION: LOAN -->
		<div class="operation operation--loan">
			<h2>Request loan</h2>
			<form class="form form--loan" method="POST" action="requestloan.php">
				<input name="amount" type="number" class="form__input form__input--loan-amount" />
				<input name="reqeustloan" class="form__btn form__btn--loan" type="submit" value="&rarr;">
				<label class="form__label form__label--loan">Amount</label>
			</form>
		</div>

		<!-- OPERATION: CLOSE -->
		<!-- <div class="operation operation--close">
			<h2 class="close-acc-h2">Close account</h2>
			<form class="form form--close">
				<input type="text" class="form__input form__input--user" />
				<input type="password" maxlength="6" class="form__input form__input--pin" />
				<button class="form__btn form__btn--close">&rarr;</button>
				<label class="form__label">Confirm user</label>
				<label class="form__label">Confirm PIN</label>
			</form>
		</div> -->

		<!-- LOGOUT TIMER -->
		<!-- <p class="logout-timer">
			You will be logged out in <span class="timer">05:00</span>
		</p> -->
	</main>
</body>

</html>