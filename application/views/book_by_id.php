<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Add description ">
     <link rel="stylesheet" href="/assets/CSS/normalize.css">
    <link rel="stylesheet" href="/assets/CSS/bootstrap.css">
    <link rel="stylesheet" href="/assets/CSS/bootstrap-theme.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <title>Add Book Review</title>

    <style>
		textarea {
			height: 60px;
		}
		body { 
			padding-top: 50px; 
		}
    </style>

</head>

	<body>
		<div class="container-fluid">
			<nav class="navbar navbar-default navbar-fixed-top">
				<ul class="nav nav-pills">
					<li role="presentation"><a href="/books"> Home </a></li>
			 		<li style="float: right;" role="presentation"><a href="/books/logout">Logout </a></li>
			 	</ul>
			</nav>
			<div class="col-md-6">
				<h2> <?= $book['title']; ?></h2>
				<h3> Author: <?= $book['name']; ?> </h3>
				<h3> Reviews: </h3>
				<hr>
				<?php foreach ($book_reviews as $book_review)
				{
					 echo "Rating:";
					 for ($i=0; $i < $book_review['rating']; $i++) { ?>
 			 						<span class=" glyphicon glyphicon-star" aria-hidden="true"></span>
 									<?	}?>
 			 						
									<?php for ($i=0; $i < (5 - $book_review['rating']); $i++) { ?>
 			 						<span class=" glyphicon glyphicon-star-empty" aria-hidden="true"></span>
									

 									<?	}?> </p> 
					 
					 <a href="/users/get_user/<?=$book_review['commentors_id']; ?> " > <?= $book_review['alias']; ?> </a> says: <?= $book_review['comment']; ?> </p>
					<?php echo "<p>" . "Posted on " . $book_review['created_at'];
					echo "<hr>";
				}
				?>			
			</div>	
			<div class="col-md-6">
				<div class="form-group">
					<form action="/books/add_review" method="post">
						<h2> Add a review: </h2>
						<textarea class="form-control"name="comment"></textarea>
						<p> Rating (1-5) <input type="number" name="rating" min="1" max="5"> stars </p>
						<input type="hidden" name="user_id" value="<?= $this->session->userdata['user id']; ?>" >
						<input type="hidden" name="book_id" value="<?= $book['id']; ?>" >
						<p><input class="btn btn-lg btn-primary" type="submit" value="Submit Review"></p>

					</form>
				</div>
			</div>
		</div>
	</body>
</html>