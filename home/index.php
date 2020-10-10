<?= include_once("../template/header.php") ?>
<?php
if(isset($_POST["btnSave"])){
$target_dir = "UploadFile/";
$target_file = $target_dir . basename($_FILES["MyUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$check = getimagesize($_FILES["MyUpload"]["tmp_name"]);
  if($check !== false) {
   // echo "File is an image - " . $check["mime"] . ".";
 if (move_uploaded_file($_FILES["MyUpload"]["tmp_name"], $target_file)){
	 echo "The file" . basename( $_FILES["MyUpload"]["name"]). "has been uploaded.";
  } else {
	echo "Sorry, there was an error uploading your file.";
   } $uploadOk = 1;
  } else {
	  echo "File is not an image.";
	  $uploadOK=0;
  }
}

function OpenConnection()
{
	try {
		$serverName = "(local)"; //serverName/instanceName
		$connectionInfor = array("Database" => "SchoolInfo", "UID" => "sa", "PWD" => "123456");
		$conn = sqlsrv_connect($serverName, $connectionInfor);
		if ($conn) {
			echo "Connection established.<br> />";
			return $conn;
		} else {
			echo "Connection could not be established.<br> />";
			die(print_r(sqlsrv_errors(), true));
		}
	} catch (Exception $e) {
		echo ("Erro!");
	}
	return null;
}
function ReadData()
{
	try {
		$conn = OpenConnection();
		$tsql = "SELECT name FROM[Info_school].[Info_school]";
		$getProducts = sqlsrv_query($conn, $tsql);
		if ($getProducts == false)
			die(FormatErrors(sqlsrv_errors()));
		$productCount = 0;
		while ($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC)) {
			echo ($row['name']);
			echo ("<br/>");
			$productCount++;
		}
		sqlsrv_free_stmt($getProducts);
		sqlsrv_close($conn);
	} catch (Exception $e) {
		echo ("Erro!");
	}
}
?>
<div class="banner">
	<div class="container">
	<i class="far fa-trash-alt fa-2x"></i>
		<div class="pencil">
			<a data-toggle="modal" data-target="#upload">
				<i class="far fa-edit fa-2x"></i>
			</a>
		</div>
		<div class="banner-text agileits-w3layouts">
			<div id="top" class="callbacks_container">
				<ul class="rslides" id="slider3">
					<li>
						<div class="banner-textagileinfo">
							<h6>WELCOME TO</h6>
							<h3>School !</h3>
							<div class="more">
								<a href="#" data-toggle="modal" data-target="#myModal"> Read More</a>
							</div>
						</div>
					</li>
					<li>
						<div class="banner-textagileinfo">
							<h6>LET'S</h6>
							<h3>Go to school together ! </h3>
							<div class="more">
								<a href="#" data-toggle="modal" data-target="#myModal"> Read More</a>
							</div>
						</div>
					</li>
					<li>
						<div class="banner-textagileinfo">
							<h6>LET'S</h6>
							<h3>Learn about the schools together !</h3>
							<div class="more">
								<a href="#" data-toggle="modal" data-target="#myModal"> Read More</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- Modal Upload-->
<div id="upload" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <input type="button" class="btn btn-default" id="btnSave" name="btnSave" value="Save">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<!-- modal-sign -->
<div class="modal bnr-modal fade" id="myModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body modal-spa">
				<img class="img-responsive" src="../image/library.jpg" alt="library">
				<p style="color: black">Finding a school as per everyone’s choice is now a days is very essential and confusing as there are many schools in and around the city. Visiting each and every school physically and getting information is really very difficult. Hence concept of developing “SchoolsInfo” seems very much needed. SchoolsInfo is a website which provides the information about the various schools available in the city. People who are interested in seeking admission for their kids can view this website where they can get to know where all the schools are situated and what all other facilities are available in that particular school. 
					<br>Currently people generally find out the details about the schools from relatives/friends or visiting schools personally. But this is becoming difficult as many new schools are being established everywhere. Thus this can be overcome by the proposed system called “SchoolsInfo” where viewing all schools and related information in particular area from anywhere. </p>
			</div>
		</div>
	</div>
</div>
<!-- //modal-sign -->

<!-- welcome -->
<div class="welcome">
	<div class="container">
		<div class="col-md-6 welcome-w3lright">
			<div class="welcome-grids">
				<div class="service-box">
					<div class="agileits-wicon">
						<i class="fa fa-clone" aria-hidden="true"></i>
					</div>
					<h5>Proin eget ipsum ultrices</h5>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="welcome-grids">
				<div class="col-md-6 col-sm-6 col-xs-6 service-box">
					<div class="agileits-wicon">
						<i class="fa fa-heart-o" aria-hidden="true"></i>
					</div>
					<h5>Proin eget ipsum ultrices</h5>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6 service-box">
					<div class="agileits-wicon">
						<i class="fa fa-tv" aria-hidden="true"></i>
					</div>
					<h5>Proin eget ipsum ultrices</h5>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="col-md-6 welcome-w3lleft">
			<h3 class="agileits-title">Welcome !
				<i class="fas fa-edit fas"></i>
			</h3>
			<h4>Cras porttitor imperdiet volutpat nulla malesuada lectus eros ut convallis felis consectetur ut </h4>
			<p>Nulla ultricies nunc et lorem semper, quis accumsan dui aliquam aucibus sagittis placerat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas
				Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi non nibh nec enim sollicitudin interdum.tristique senectus et netus et malesuada fames ac turpis egestas
			</p>
		</div>

		<div class="clearfix"> </div>
	</div>
</div>
<!-- //welcome -->
<!-- work start here -->
<div class="work jarallax">
	<div class="container">
		<div class="work-agileinfo">
			<h3>Are You Impressed By Our Work?</h3>
			<p>Nor again is there anyone who loves or pursues or desires to obtain pain.</p>
			<div class="w3btns-agile">
				<a href="contact.php">Get In Touch</a>
			</div>
		</div>
	</div>
</div>
<!-- work end here -->

<?= include_once("../template/footer.php") ?>
<script>
	// You can also use "$(window).load(function() {"
	$(function() {
		// Slideshow 3
		$("#slider3").responsiveSlides({
			auto: false,
			pager: true,
			nav: false,
			speed: 500,
			namespace: "callbacks",
			before: function() {
				$('.events').append("<li>before event fired.</li>");
			},
			after: function() {
				$('.events').append("<li>after event fired.</li>");
			}
		});

	});
</script>
