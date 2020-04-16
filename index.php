<?php
require_once("verbose.php");
date_default_timezone_set("Asia/Bangkok");
define("imagestorage","storage_image/");
define("datastorage","storage_data/");
define("imgFile",".jpeg");
define("dataFile",".info");
$startTime = round(microtime(true) * 1000);
$userArray = array("กฤษฎา สายธารทอง","กันตเมศฐ์ ธนินสุขไพสาล","จิรวัฒน์ พวงเพชร","ณัฏฐ์พัฒน์ กฤษณะสมิด","ณัฏฐากร ชานาตา","ณัฐภัทร จรเจริญ","ดุจเพชร ตระการรัตนกุล","แดนสรวง เอริค แดนเจอร์","ต่อพล บัวแก้ว","ธนวิชญ์ นิสุทธิวรรณ","ธนดล รอยลาภเจริญพร","ธนเดช สุวรรณรัตน์","ธนภัทร ทองวิทูโกมาลย์","ธนัยนันท์ กังวาลวิจิตรกุล","ธีรพิชญ์ สิงห์คำวงษ์","นาวิน แซ่เฮ้ง","ปวีณวัชร์ จันทร์วันณา","เปรมพัฒณ์ ลีธนวัฒน์","พลทัต เที่ยงผดุง","พัชรพล สายยศ","ภัทรพล ก. จันทราภานนท์","ภานุวัชร อึ่งไพร","ภูริ ชัยสุภา","รุจิภาส โควาดิสัย","สวิตซ์ นูปกรณ์","สิรภพ จิระบรรจง","สุรชัย ฉัตรปทุมทอง","สุวิศิษฏ์ ลิขิตวนิชกุล","อธิณัฎฐ์ จันทรีศรี","อธิสิชฌ์ สุขตะโก","อภิชาติ แซ่อึ้ง","อภิพล ใจมัง","อิศม์เดช มารุ่ง","ธวัชชัย หวังศิริเวช","รพิรัตน์ ตะเภาสิรวิทย์");
$userPrefix = array("นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","นาย","คุณครู","คุณครู");
$userdataID = array("603-31861","603-31863","603-31864","603-31865","603-31866","603-31867","603-31869","603-31870","603-31871","603-31872","603-31873","603-31874","603-31875","603-31876","603-31877","603-31879","603-31880","603-31881","603-31882","603-31884","603-31885","603-31886","603-31887","603-31888","603-31889","603-31890","603-31891","603-31892","603-31893","603-31894","603-31895","603-31896","603-31897","603-AON39","603-JOYCE");
$userNickname = array("Arm","prince","Bankz","Good","Nat","Pea","G","Money","Copter","Tawan","Tee","Plub","Katang","Tutor","T","Game","Ieq","Chai","Boom","Kimhan","Hamter","Banky","First","Ryu","Tun","Ty","Pick","Moth","Gun","Cheavy","Tan","Pure","Nua","T.Aon","T.Joyce");
$NumberNo = array("1","2","3","4","5","6","7","8","9","10","11","12","13","14",'15',"16",'17',"18","19","20","21",'22',"23","24","25",'26',"27","28","29","30",'31',"32","33","40",'41');
$userGetNameForSpanItilPasswordProtect = array();
foreach ($userdataID as $key => $value) {
	$userGetNameForSpanItilPasswordProtect[md5($value)] = $userPrefix[$key]." ".$userArray[$key];
}
$userGetNickname = array();
foreach ($userdataID as $key => $value) {
	$userGetNickname[md5($value)] = $userNickname[$key];
}
$userGetNumber = array();
foreach ($userdataID as $key => $value) {
	$userGetNumber[md5($value)] = $NumberNo[$key];
}
$userdataIDE = array();
$fileList = array();
$imageList = array();
foreach ($userdataID as $key => $value) {
	$fileList[$key] = datastorage.md5($value).dataFile;
	$imageList[$key] = imagestorage.md5($value).imgFile;
	if(file_exists(datastorage.md5($value).dataFile)){
		$userdataIDE[$key] = "true";
	}else{
		$userdataIDE[$key] = 'false';
	}

}

function addPrefix($uarr,$parr){
	$f = 0;
	foreach ($uarr as $key => $value) {
		$d[$f] = $parr[$key]." ".$uarr[$key];
		$f++;
	}
	return $d;
}
function deter($userdataID,$username,$userNickname,$NumberNo,$successuserID,$type,$btnname,$btn_successname,$sbg,$usbg,$userfaid){
	$v = "";
	$a = "";
	$dvxr = 0;
	$d = $successuserID;
	$true = 0;
	$false = 0;
	foreach ($d as $key => $value) {
		if($value == "true"){
			$true++;
		}else{
			$false++;
		}
	}
	if($true == "0"){
		return '<div class="col-12">
		<div style="animation-delay: .1s;" class="btn btn-selector-manager_style_adding animated fadeInLeft btn-block btn-danger '.$btnname.'-selector">
							<i class="fad fa-'.$userfaid.'"></i> ไม่มีข้อมูลให้แสดง
						</div>
						</div>';
	}
	foreach ($userdataID as $key => $value) {
		if($type == "editdata"){
			if($successuserID[$key] == "false"){
				continue;
			}
		}
		if($type == "editpic"){
			if($successuserID[$key] == "false"){
				continue;
			}
		}
		if($type == "adduserdata"){
			if($successuserID[$key] == "true"){
				continue;
			}
		}
		if($type == "editdata"){
			$prefixid = "edit-";
		}elseif($type == "adduserdata"){
			$prefixid = "add-";
		}elseif($type == "editpic"){
			$prefixid = "editpic-";
		}
		$v .= '<div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
		<div style="animation-delay: '.($dvxr / 10).'s;" class="btn btn-selector-manager_style_adding animated fadeInLeft btn-block '.(($successuserID[$key] == "true") ? $sbg : $usbg).' '.(($type == "adduserdata") ? (($successuserID[$key] == "true") ? $btn_successname : $btnname) : $btnname).'  '.$btnname.'-selector" data-control="'.$prefixid.md5($value).'">
							'.(($successuserID[$key] == "true") ? "<i class='fad fa-".$userfaid."'></i>" : '<i class="fad fa-'.$userfaid.'"></i>').' '.$username[$key].'
						</div>
						</div>
						';
						$d = explode(" ", $username[$key]);
		$a .= "<div id='".$prefixid.md5($value)."' pureid='".md5($value)."' data-success='".$successuserID[$key]."' data-fullname='".$username[$key]."' data-prefix-nameTH='".$d[0]."' data-firstnameTH='".$d[1]."' data-lastnameTH='".$d[2]."' data-filepath='".datastorage.md5($value).dataFile."' data-imagefilepath='".imagestorage.md5($value).imgFile."' data-number='".$NumberNo[$key]."' data data-nickname='".$userNickname[$key]."' ></div>
		";
		$dvxr++;
	}
	return $v.$a;
}
function determination($userarrID){
	foreach ($userarrID as $key => $value) {
		if(file_exists(datastorage.md5($value).dataFile)){
			$f[$key] = "true";
		}else{
			$f[$key] = "false";
		}
	}
	return $f;
}
$successuserID = determination($userdataID);
function allTrue($d){
	$b = "true";
	foreach ($d as $key => $value) {
		if($value == "false"){
			return "false";
		}
	}
	return $b;
}
$dalltrue = allTrue($successuserID);
$f = addPrefix($userArray,$userPrefix);
$ds = deter($userdataID,$f,$userNickname,$NumberNo,$successuserID,"adduserdata","btn-addData","btn-addData-success","btn-success","btn-primary","user-plus");
$ds_edit = deter($userdataID,$f,$userNickname,$NumberNo,$successuserID,"editdata","btn-editdata","btn-editdata-success","btn-warning","btn-primary","user-edit");
$ds_editpic = deter($userdataID,$f,$userNickname,$NumberNo,$successuserID,"editpic","btn-editpicturedata","btn-editpicturedata-success","btn-warning","btn-primary","user-edit");
if(!isset($_GET["addUserData"])){
		if(isset($_GET["editUserPictureData"])){

		}else{
			if(isset($_GET["editUserData"])){

			}else{
				if(isset($_GET["deleteUserData"])){

				}else{
					if(isset($_GET["viewList"])){

					}else{
						if(isset($_GET["home"])){

						}else{

							$urlPattern = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80") ? '' : (($_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])).$_SERVER["PHP_SELF"]."?home";
							?>
							<meta http-equiv="refresh" content="0;url=<?php echo $urlPattern; ?>">
							<?php
						}
					}
				}
			}
		}
	}
?>
	<?php
	if(isset($_GET["home"])){
		$home_hide = '';
		$home_dis = "active";
	}else{
		$home_hide = "display:none;";
		$home_dis = "";
	}
	if(isset($_GET["addUserData"])){
		$addUserData_hide = '';
		$addUserData_dis = "active";
	}else{
		$addUserData_hide = "display:none;";
		$addUserData_dis = "";
	}
	if(isset($_GET["editUserData"])){
		$editUserData_hide = '';
		$editUserData_dis = "active";
	}else{
		$editUserData_hide = "display:none;";
		$editUserData_dis = "";
	}
	if(isset($_GET["editUserPictureData"])){
		$editUserPictureData_hide = '';
		$editUserPictureData_dis = "active";
	}else{
		$editUserPictureData_hide = "display:none;";
		$editUserPictureData_dis = "";
	}
	if(isset($_GET["deleteUserData"])){
		$deleteUserData_hide = '';
		$deleteUserData_dis = "active";
	}else{
		$deleteUserData_hide = "display:none;";
		$deleteUserData_dis = "";
	}
	if(isset($_GET["viewList"])){
		$viewList_hide = '';
		$viewList_dis = "active";
	}else{
		$viewList_hide = "display:none;";
		$viewList_dis = "";
	}
	?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="8cf05f58a4dbd60764babe199a0a4509.png?passwordid=123">
	<meta http-equiv="Cache-Control" content="max-age=3600">
	<!--- <meta http-equiv="Cache-Control" content="no-store" /> --->
	<link rel="stylesheet" type="text/css" href="https://myfs.imfast.io/bootstrap4/css/bootstrap.min.css?v=2.0.1">
	<link rel="stylesheet" type="text/css" href="https://myfs.imfast.io/fa2/css/all.min.css?v=2.0.1">
	<link rel="stylesheet" type="text/css" href="https://myfs.imfast.io/animate/animate.min.css?v=2.0.1">
	<!-- Primary Meta Tags -->
	<title><?php if(isset($_GET["vid"])){?><?php echo $userGetNameForSpanItilPasswordProtect[$_GET["vid"]];?> (<?php echo $userGetNickname[$_GET["vid"]];?>)<?php }else{echo "A Miracle Friendship [V2]";} ?></title>
	<meta name="viewport" content="width=device-width">
	<meta name="title" content="<?php if(isset($_GET["vid"])){?><?php echo $userGetNameForSpanItilPasswordProtect[$_GET["vid"]];?> (<?php echo $userGetNickname[$_GET["vid"]];?>)<?php }else{echo "A Miracle Friendship [V2]";} ?>">
	<meta name="description" content="RB132 3/9 Friendship is a best relationship | We are far away but we not forgotten us anyway! | This website was make by Nawin | a member of [3/9 RB132] with the G character profile.">
	<meta name="keywords" content="Friendship,3/9,RB132,Friend,friend,friendship,เพื่อน,ราชบพิธ,โรงเรียนวัดราชบพิธ,โรงเรียนใกล้ MRT สนามไชย,โรงเรียนใกล้รถไฟฟ้ามหานคร,รถไฟฟ้าหน้าโรงเรียน,โรงเรียนชายล้วน,โรงเรียนชายล้าน 6 แผ่นดิน,ฝึกสอนโรงเรียนชายล้วน,ฝึกสอนโรงเรียนวัดราชบพิธ,ราชบพิธสมาคม,โรงเรียนกูมีดีทุกอย่าง,เกียรติภูมิราชบพิธ,นาย กฤษฎา สายธารทอง,นาย กันตเมศฐ์ ธนินสุขไพสาล,นาย จิรวัฒน์ พวงเพชร,นาย ณัฏฐ์พัฒน์ กฤษณะสมิด,นาย ณัฏฐากร ชานาตา,นาย ณัฐภัทร จรเจริญ,นาย ดุจเพชร ตระการรัตนกุล,นาย แดนสรวง เอริค แดนเจอร์,นาย ต่อพล บัวแก้ว,นาย ธนวิชญ์ นิสุทธิวรรณ,นาย ธนดล รอยลาภเจริญพร,นาย ธนเดช สุวรรณรัตน์,นาย ธนภัทร ทองวิทูโกมาลย์,นาย ธนัยนันท์ กังวาลวิจิตรกุล,นาย ธีรพิชญ์ สิงห์คำวงษ์,นาย นาวิน แซ่เฮ้ง,นาย ปวีณวัชร์ จันทร์วันณา,นาย เปรมพัฒณ์ ลีธนวัฒน์,นาย พลทัต เที่ยงผดุง,นาย พัชรพล สายยศ,นาย ภัทรพล ก. จันทราภานนท์,นาย ภานุวัชร อึ่งไพร,นาย ภูริ ชัยสุภา,นาย รุจิภาส โควาดิสัย,นาย สวิตซ์ นูปกรณ์,นาย สิรภพ จิระบรรจง,นาย สุรชัย ฉัตรปทุมทอง,นาย สุวิศิษฏ์ ลิขิตวนิชกุล,นาย อธิณัฎฐ์ จันทรีศรี,นาย อธิสิชฌ์ สุขตะโก,นาย อภิชาติ แซ่อึ้ง,นาย อภิพล ใจมัง,นาย อิศม์เดช มารุ่ง,นาย ธวัชชัย หวังศิริเวช,นางสาว รพิรัตน์ ตะเภาสิรวิทย์,คุณครู ธวัชชัย หวังศิริเวช,คุณครู รพิรัตน์ ตะเภาสิรวิทย์" />
	<!-- FONT -->
	<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="<?php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80") ? '' : (($_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])).$_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]; ?>">
	<meta property="og:title" content="<?php if(isset($_GET["vid"])){?><?php echo $userGetNameForSpanItilPasswordProtect[$_GET["vid"]];?> (<?php echo $userGetNickname[$_GET["vid"]];?>)<?php }else{echo "A Miracle Friendship [V2]";} ?>">
	<meta property="og:description" content="RB132 3/9 Friendship is a best relationship | We are far away but we not forget us anyway! | This website was make by Nawin | a member of [3/9 RB132] with the G character profile.">
	<meta property="og:image" content="<?php if(isset($_GET["vid"])){
		if(file_exists(imagestorage.$_GET["vid"].imgFile)){
  									echo imagestorage.$_GET["vid"].imgFile."?app=123";
  								}else{
  									echo "storage_image/no-avatar.jpg?app=123";
  								}
	}else{echo "http://friendship309.000webhostapp.com/background/13.jpeg?v=2.0.1";} ?>">
	<!-- Twitter -->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="<?php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80") ? '' : (($_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])).$_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]; ?>">
	<meta property="twitter:title" content="<?php if(isset($_GET["vid"])){
						?>
<?php echo $userGetNameForSpanItilPasswordProtect[$_GET["vid"]];?> (<?php echo $userGetNickname[$_GET["vid"]];?>)<?php }else{echo "A Miracle Friendship [V2]";} ?>">
	<meta property="twitter:description" content="RB132 3/9 Friendship is a best relationship | We are far away but we not forget us anyway! | This website was make by Nawin | a member of [3/9 RB132] with the G character profile.">
	<meta property="twitter:image" content="<?php if(isset($_GET["vid"])){
		if(file_exists(imagestorage.$_GET["vid"].imgFile)){
  									echo imagestorage.$_GET["vid"].imgFile."?app=123";
  								}else{
  									echo "storage_image/no-avatar.jpg?app=123";
  								}
	}else{echo "http://friendship309.000webhostapp.com/background/13.jpeg?v=2.0.1";} ?>">
	<script type="text/javascript" src="https://myfs.imfast.io/jquery/jquery.min.js?v=2.0.1"></script>
	<script type="text/javascript" src="https://myfs.imfast.io/bootstrap4/js/bootstrap.min.js?v=2.0.1"></script>
	<script type="text/javascript" src="https://myfs.imfast.io/fa2/js/all.min.js?v=2.0.1"></script>
	<script type="text/javascript" src="script.js?v=2.0.1"></script>
</head>
<body>
<div class="animated bounceInLeft">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand btn-href" data-pref="home" data-href="?home"><i class="fad fa-book-user"></i> FriendShip</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link btn-href <?php echo $home_dis; ?>" id="home_btn" data-pref="home" data-href="?home"><i class="fad fa-home"></i> หน้าแรก <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fad fa-user-cog"></i> จัดการข้อมูลของคุณ
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item <?php echo $addUserData_dis; ?> btn-href" id="addUserData_btn" data-pref="addUserData" data-href="?addUserData"><i class="fad fa-user-plus"></i> เพิ่มข้อมูลของคุณ</a>
          <a class="dropdown-item <?php echo $editUserData_dis; ?> btn-href" id="editUserData_btn" data-pref="editUserData" data-href="?editUserData"><i class="fad fa-user-edit"></i> แก้ไขข้อมูลของคุณ</a>
          <a class="dropdown-item <?php echo $editUserPictureData_dis; ?> btn-href" id="editUserPictureData_btn" data-pref="editUserPictureData" data-href="?editUserPictureData"><i class="fad fa-user-circle"></i> แก้ไขรูปภาพของคุณ</a>
          <div class="dropdown-divider"></div>
          <!--- <a class="dropdown-item <?php echo $deleteUserData_dis; ?> btn-href" id="deleteUserData_btn" data-pref="deleteUserData" data-href="?deleteUserData"><i class="fad fa-user-times"></i> ลบข้อมูลของคุณ</a> --->
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link btn-href <?php echo $viewList_dis; ?>" id="viewList_btn" data-pref="viewList" data-href="?viewList"><i class="fad fa-users-crown"></i> ดูข้อมูลของเพื่อนๆทั้งหมด</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mailto:igamesecure@aol.com"><i class="fad fa-paper-plane"></i> ติดต่อแจ้งปัญหาการใช้งาน</a>
      </li>
     
    </ul>
  </div>
</nav>


<div class="progress" style="height: 4px;" id='loader-bar-contain'>
  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" id="loader-bar" aria-valuenow="60" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<br />
	<div class="cdh" style="margin-right: 10px;margin-left: 10px;">
		<div id="home" class="animated fadeInLeft " style="<?php echo $home_hide; ?>">
			<!--- Carousal starts --->
<div id="carouselExampleCaptions" class="carousel slide carousel-fade animated fadeInLeft" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="background/cover_2.jpg" class="d-block w-100">
        <div class="carousel-caption d-none d-md-block">
          <h5 class='title-car-carousel text-warning animated fadeInLeft'>หน้าเสาธงโรงเรียน</h5>
          <p class='subtitle-car-carousel text-primary animated fadeInLeft'>ถ่ายเมื่อวันสุดท้ายของการสอบปลายภาค</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="background/cover_3.jpg" class="d-block w-100">
        <div class="carousel-caption d-none d-md-block">
          <h5 class='title-car-carousel text-warning animated fadeInLeft'>ค่ายลูกเสือสุดท้ายของพวกเรา</h5>
          <p class='subtitle-car-carousel text-primary animated fadeInLeft'>ถ่ายเมื่อ 15 มกราคม 2563</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="background/cover_5.jpg" class="d-block w-100">
        <div class="carousel-caption d-none d-md-block">
          <h5 class='title-car-carousel text-warning animated fadeInLeft'>งานกีฬาสี</h5>
          <p class='subtitle-car-carousel text-primary animated fadeInLeft'>ถ่ายเมื่อ 15 ธันวาคม 2562</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

<!--- Carousal end --->
<br /><br />
<div class="card animated fadeInLeft " id="term_home" style="<?php if(isset($_GET["term"])){  }else{echo "display:none;";} ?>margin-bottom: 10px;">
				<div class="card-body" style="">
					ข้อตกลงการใช้งาน
					<ul style="list-style-type: none;">
          					<li>1. ใช้งานฟรีโดยไม่เสียค่าใช้จ่ายใดๆ</li>
          					<li>2. ข้อมูลที่ท่านระบุเข้ามาในระบบของเรา หากตรวจสอบและ มีการหมิ่น ทั้ง 3 สถาบันหลักของประเทศไทย ข้อมูลของท่านมีสิทธิ์ที่จะโดนลบออกจากระบบของเราโดยไม่แจ้งให้ทราบล่วงหน้า</li>
          					<li>3. ห้ามลงรูปภาพที่ส่อถึงการรังเกียจกันในสังคมหรือ รูปอนาจาร หรือ รูปพระมหากษัตริย์ หรือ รุปต่างๆที่ไม่ใช่รูปตัวตนของท่านเองหากตรวจพบจะทำารลบรูปนั้นทันทีโดยไม่แจ้งให้ทราบล่วงหน้า</li>
          					<li>4. หากข้อมูลของท่านไม่เป็นความจริงโดยทีมงานตรวจสอบแล้ว และเห็นชอบว่าไม่เป็นความจริง ข้อมูลของท่านจะถูกลบโดยไม่แจ้งให้ทราบล่วงหน้า</li>
          					<li>5. เรามีสิทธิ์ที่จะเปลื่ยน ข้อตกลงการใช้งานโดยไม่ต้องแจ้งให้ท่านทราบล่วงหน้า</li>
          				</ul>
				</div>
				<div class="card-footer">
					<button class="btn btn-danger font-14" style="float: right;" onclick='resetHome("all");log();'><b>&times;</b> ปิดหน้านี้</button>
				</div>
			</div>
			<div class="card animated fadeInLeft " id="policy_home" style="<?php if(isset($_GET["policy"])){  }else{echo "display:none;";} ?>margin-bottom: 10px;">
				<div class="card-body" style="">
					นโยบายความเป็นส่วนตัว
					<ul style="list-style-type: none;">
          					<li>1. เราไม่มีนโยบายที่จะให้ข้อมูลของทุกคนแก่ผู้อื่น</li>
          					<li>2. ทางเราไม่รับผิดชอบหากท่านนำรหัสผ่านที่ใช้ในการแก้ไขข้อมูลให้แก่ผู้อื่น</li>
          					<li>3. ทางเราจะไม่รับผิดชอบในทุกกรณีที่ข้อมูลของท่านถูกเปลื่ยนโดยผู้ไม่หวังดี</li>
          					<li>4. ข้อมูลบางส่วนที่ท่านระบุจะถูกเปิดเผยเป็นสาธารณะ</li>
          					<li>5. ข้อมูลที่เป็นความลับระบบจะเข้ารหัสไว้เพื่อป้องกันการโจรกรรม</li>
          					<li>6. เรามีสิทธิ์ในการควบคุมข้อมูลของท่าน กล่าวคือ เรามีสิทธิ์เป็นเจ้าของข้อมูลนั้น เทียบเท่ากับท่าน</li>
          					<li>7. การกระทำซึ่งทำให้ระบบของทางเราได้รับความเสียหาย ทางเรามีสิทธิ์ที่จะดำเนินคดีทางกฎหมายกับท่าน</li>
          					<li>8. ไม่อนุญาตให้บันทึก คัดลอก แก้ไข ระบบต่างๆของทางเรา หากฝ่าฝืนจะดำเนินคดีทางกฎหมายสูงสุด</li>
          					<li>9. เราได้จัดเก็บที่อยู่ IP ของท่านไว้ในฐานข้อมูลของทางเราและเข้ารหัสไว้เพื่อใช้ตรวจสอบทางกฏหมายในกรณีที่ท่างทำกระทำการดังที่กล่างไว้ในข้อ 7 และ 8</li>
          					<li>10. ทางเราไม่มีนโยบายในการนำข้อมูลของท่านไปขาย หรือ แสวงหาผลกำไรจากข้อมูลของท่าน</li>
          					<li>11. ทางเราไม่มีนโยบายที่จะเรียกขอหมายเลขประจำตัวประชาชนของท่าน เพื่อประโยชน์หรือผลดีต่อทางเรา ในทุกๆด้าน</li>
          					<li>12. ทางเรามีการเรียกขอ ชื่อ นามสกุลของท่าน วันเกิด หมายเลขโทรศัพท์ ข้อมูล Social media อาทิเช่น Line,Facebook,Instagram เพื่อประโยชน์ของบุคคลที่ความสัมพันธ์เป็นเพื่อนของท่านที่จะมีช่องทางติดต่อท่านเป็นการส่วนตัวและรวดเร็วในการสื่อสาร</li>
          					<li>13. เรามีสิทธิ์ที่จะเปลื่ยน นโยบายความเป็นส่วนตัวโดยไม่ต้องแจ้งให้ท่านทราบล่วงหน้า</li>
          				</ul>
        			</div>

				<div class="card-footer">
					<button class="btn btn-danger font-14" style="float: right;" onclick='resetHome("all");log();'><b>&times;</b> ปิดหน้านี้</button>
				</div>
			</div>
			<div class="card" id="main_home">
				<div class="card-body" style=""><h3>FriendShip | สมุดมิตรภาพ (Virtual FriendShip Book)</h3><div class="row">
					<div class="col-12" style="font-size: 16px;"><b>สมุดมิตรภาพคืออะไร?</b><br /> สมุดมิตรภาพคือ สมุดที่เก็บความทรงจำเกี่ยวกับเพื่อนๆๆ หรือรูปต่างๆที่เคยไปทำกิจกรรมร่วมกันมาเช่น ไป เข้าค่าย หรือ ไปทัศนศึกษา และรวมคุณครูที่ปรึกษาเข้าไว้ด้วยกันในสมุดเล่นนี้<br /><b>แล้วสมุดมิตภาพเล่มนี้มีข้อดีอย่างไร</b><br />ก็ไม่จำเป็นจะต้องใช้สมุดจริงเพื่อมาเขียนให้มันเปลืองและเก็บเป็นไฟล์ดิจิตอลได้ทุกเมื่อ เข้าถึงได้ทุกที่ ทุกคน จากทั่วทุกมุมโลก<br /><b>สมุดมิตรภาพเล่นนี้ทำยากไหม?</b><br />ก็ยากอยู่แต่การมีมิตรภาพที่ดีนั้นหายากกว่าแน่ๆ<br /><b>สุดท้ายนี้</b><br />ผมก็อยากจะบอกว่า โชคดีกับอนาคตนะครับและมีการเรียน การงาน ที่ดี<br /><b>ข้อมูลในเวอร์ชั่นเก่าจะซิงค์กับเวอร์ชั่นนี้ไหม ?</b><br />ไม่ครับ เพราะทำระบบให้รองรับยากมาก เราจะให้เพิ่มข้อมูลใหม่เอง โดย Admin จะเพิ่มให้บางส่วนเฉพาะคนที่มีข้อมูลอยู่ในเว็บเก่า(คนที่แอดใส่ให้ให้ติดต่อรับ password ในการแก้ไขใน เมนูติดต่อแจ้งปัญหาด้านบน ส่ง Email ไปขอรหัสผ่านได้เลย)</div>
					<div class="col-6"><div class="btn btn-block btn-selector-manager_style_adding btn-success" style="font-size:14px;" onclick="resetHome('1');$('#term_home').show('fast');" id="term_btn">Term of use | ข้อตกลงการใช้งาน</div></div>
					<div class="col-6"><div class="btn btn-block btn-selector-manager_style_adding btn-success" style="font-size:14px;" onclick="resetHome('2');$('#policy_home').show('fast');" id="policy_btn">Privacy Policy | นโยบายความเป็นส่วนตัว</div></div>
				</div></div>
			</div>
			<script type="text/javascript">
				$("#policy_btn").on("click",function(){
					window.history.replaceState("<?php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80") ? '' : (($_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])); ?>", document.title, "?home&policy");
				});
				$("#term_btn").on("click",function(){
					window.history.replaceState("<?php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80") ? '' : (($_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])); ?>", document.title, "?home&term");
				});
				function log(){
					window.history.replaceState("<?php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80") ? '' : (($_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])); ?>", document.title, "?home");
				}
			</script>
			
		</div>
		<div id="addUserData" class="animated fadeInLeft " >
			<div class="card" id="main_addUserData" style="<?php if(isset($_GET["addUserData"])){
				if(isset($_GET['userid'])){
					echo "display:none;";
				}else{
					
				}
			}else{
				echo 'display:none;';
			} ?>">
				<div class="card-body">
					<h4>คุณชื่ออะไร ?</h4><hr width="99.6666667%" class="animated fadeInLeft" /><br />
					<div class="row">
						<?php echo $ds; ?>
					</div>
					<hr width="99.6666667%" class="animated fadeInLeft" />
					<h6>หากหาชื่อของท่านไม่เจอให้ติดต่อ Admin เพื่อตรวจสอบหาสาเหตุให้ได้<a href='mailto:igamesecure@aol.com'>ที่นี่</a></h6>
				</div>
			</div>
			<div class="card animated fadeInLeft" id="adduserData_inside" style="<?php if(isset($_GET["addUserData"])){if(isset($_GET['userid'])){if(isset($_GET["lock"])){echo "display:none;";}else{echo "";}}else{echo 'display:none;';}}else{echo 'display:none;';} ?>">
				<div class="card-header animated bounceInLeft" style="animation-delay: .1s"><i class="fad fa-user-plus"></i> เพิ่มข้อมูล ของ <span id="AUD_displayname"><?php if(isset($_GET["userid"])){echo $userGetNameForSpanItilPasswordProtect[explode("-", $_GET["userid"])[1]];} ?></span></div>
				<div class="card-body">
					<label class="animated fadeInLeft">ชื่อ - นามสกุล</label>
					<input type="text" class="form-control animated fadeInLeft" value="<?php if(isset($_GET["userid"])){echo $userGetNameForSpanItilPasswordProtect[explode("-", $_GET["userid"])[1]];} ?>" disabled="" readonly="" placeholder="ใส่ชื่อภาษาไทย" id="name_th" name="nth">
					<label style="animation-delay: .1s" class="animated fadeInLeft">ชื่อ - นามสกุล ภาษาอังกฤษ มีคำนำหน้าด้วย</label>
					<input style="animation-delay: .1s" type="text" class="form-control animated fadeInLeft" placeholder="ใส่ชื่อภาษาอังกฤษ" id="name_en" name="nen">

					<label style="animation-delay: .2s" class="animated fadeInLeft">ชื่อเล่นภาษาไทย</label>
					<input style="animation-delay: .2s" type="text" class="form-control animated fadeInLeft" placeholder="ใส่ชื่อเล่นภาษาไทย" id="nick_th" name="nith">

					<label style="animation-delay: .3s" class="animated fadeInLeft">ชื่อเล่นภาษาอังกฤษ</label>
					<input style="animation-delay: .3s" type="text" value="<?php if(isset($_GET["userid"])){echo $userGetNickname[explode("-", $_GET["userid"])[1]];} ?>" disabled="" readonly="" class="form-control animated fadeInLeft" placeholder="ใส่ชื่อเล่นภาษาอังกฤษ" id="nick_en" name="nien">

					<label style="animation-delay: .4s" class="animated fadeInLeft">เลขที่</label>
					<input style="animation-delay: .4s" type="text" id="number" value="<?php if(isset($_GET["userid"])){echo $userGetNumber[explode("-", $_GET["userid"])[1]];} ?>" disabled="" readonly="" name="Number" class="form-control animated fadeInLeft" placeholder="ใส่เลขที่ของคุณ">

					<label style="animation-delay: .5s" class="animated fadeInLeft">เบอร์โทรศัพท์ที่สามารถติดต่อได้(ไม่ต้องมี - หรือ เว้นวรรค เช่น 0812345678, 0821345678)</label>
					<input style="animation-delay: .5s"type="text" id="phone" name="PhoneNumber" class="form-control animated fadeInLeft" placeholder="ใส่เบอร์โทรศัพท์ของคุณ">

					<label style="animation-delay: .6s" class="animated fadeInLeft">วิชาที่ชอบ</label>
					<input style="animation-delay: .6s" type="text" id="favsubject" name="FavSubject" class="form-control animated fadeInLeft" placeholder="วิชาที่ชื่นชอบ">

					<label style="animation-delay: .7s" class="animated fadeInLeft">วิชาที่ไม่ชอบ</label>
					<input style="animation-delay: .7s" type="text" id="unfavsubject" name="UnfavSubject" class="form-control animated fadeInLeft" placeholder="วิชาที่ไม่ค่อยชอบ">

					<label style="animation-delay: .8s" class="animated fadeInLeft">โรงเรียนที่จบการศึกษาในระดับชั้นประถมศึกษา</label>
					<input style="animation-delay: .8s" type="text" id="p6school" placeholder="โรงเรียนที่จบการศึกษาในระดับชั้นประถมศึกษา" name="p6school" class="form-control animated fadeInLeft">

					<label style="animation-delay: .9s" class="animated fadeInLeft">งานอดิเรก สิ่งที่ทำในเวลาว่าง</label>
					<input style="animation-delay: .9s" type="text" id="adirek" class="form-control animated fadeInLeft" name="adirek" placeholder="งานอดิเรก สิ่งที่ทำในเวลาว่าง">

					<label style="animation-delay: 1s" class="animated fadeInLeft">วันเกิด</label>
					<input style="animation-delay: 1s" type="date" id="birthday" name="BirthDay" placeholder="วันเกิด คลิกเพื่อเลือก" class="form-control datepicker animated fadeInLeft">

					<label style="animation-delay: 1.1s" class="animated fadeInLeft">คติประจำใจ</label>
					<input style="animation-delay: 1.1s" type="text" id="pIH" name="pIH" placeholder="คติประจำใจของคุณ" class="form-control animated fadeInLeft">

					<label style="animation-delay: 1.2s" class="animated fadeInLeft">อัพโหลดรูปภาพของคุณ (ที่ดีที่สุด)</label>
					<br /><div style="animation-delay: 1.2s;"><span style="font-size: 18px;" class="animated fadeInLeft">การอัพโหลดรูปได้ย้ายไปอยู่ที่เมนูแก้ไขรูปแล้ว</span></div><br />
    				<label style="animation-delay: 1.3s" class="animated fadeInLeft">IG, FACEBOOK <span class="" style="color: #00f;" id="fb-help">(เอาจากตรงไหน ?)</span>, LINE ID</label>
					<input style="animation-delay: 1.3s;margin-bottom: 10px;" type="text" id="igurl" name="IG" placeholder="Link IG ของคุณ https://instagram.com/ชื่อไอจี" class="form-control animated fadeInLeft">
					<input style="animation-delay: 1.3s;margin-bottom: 10px;" type="text" id="fburl" name="facebook" style="margin-top: 10px;" placeholder="Link Profile Facebook ของคุณ" class="form-control animated fadeInLeft">
					<input style="animation-delay: 1.3s" type="text" id="lineid" name="lineid" style="margin-top: 10px;" placeholder="Line ID ของคุณ" class="form-control animated fadeInLeft">

					<label style="animation-delay: 1.4s" class="animated fadeInLeft">คำอวยพรให้เพื่อนๆของคุณหรือนักเรียนของคุณ</label>
					<textarea style="animation-delay: 1.4s" name="" id="wishtofriend" cols="50" rows="8" class="form-control animated fadeInLeft"></textarea>

					<label style="animation-delay: 1.5s" class="animated fadeInLeft">Password รหัสผ่านสำหรับการป้องกันการแก้ไขข้อมูล</label>
					<input style="animation-delay: 1.5s" type="text" id="pwprotectdata" name="pwprotectdata" placeholder="รหัสผ่านสำหรับป้องกันการแก้ไขข้อมูล" class="form-control animated fadeInLeft">
					<strong style="color: red;">*ในการเพิ่มข้อมูลครั้งนี้ของท่านหมายถึงท่านยอมรับ<a href="?home&policy" target="_blank">นโยบายความเป็นส่วนตัว</a>และ<a href="?home&term" target="_blank">ข้อตกลงการใช้งาน</a>ของเราแล้ว  </strong>
					<div class="row" style="margin-top:10px;">
						<div style="animation-delay: 1.6s" class="col-6 animated fadeInLeft"><div class="btn btn-success btn-paud-submit btn-block" data-id="<?php if(isset($_GET["userid"])){ echo explode("-", $_GET["userid"])[1];} ?>"><i class="fad fa-save"></i> บันทึกข้อมูล</div></div>
						<div style="animation-delay: 1.6s" class="col-6 animated fadeInLeft"><div class="btn btn-paud-reset btn-block btn-warning"><i class="fad fa-trash"></i> ลบข้อมูล</div></div>
					</div>
					
					
				</div>
				<div class="card-footer">
					<button class="btn btn-danger font-14" style="float: right;" onclick='resetAddUserData("all");refreshAddAllrefreshAddAll("all");resetForm_addUserData();$(".btn-paud-submit").removeAttr("data-id");'><b>&times;</b> ปิดหน้านี้</button>
				</div>
			</div>
		</div>
		<!--- Editor User Data --->
		<!--- Editor User Data --->
		<!--- Editor User Data --->
		<!--- Editor User Data --->
		<!--- Editor User Data --->
		<!--- Editor User Data --->
		<div id="editUserData" class="animated fadeInLeft ">
			<div class="card animated fadeInLeft" id="main_edituserdata"  style="<?php if(isset($_GET["editUserData"])){
			if(isset($_GET["userid"])){
				echo "display: none;";
			}else{
				echo "";
			}
		}else{
			echo "display: none;";
		} ?>">
				<div class="card-header"><i class="fad fa-user-edit"></i> คุณต้องการแก้ไขข้อมูลของใคร ?</div>
				<div class="card-body"><div class="row"><?php echo $ds_edit; ?></div></div>
			</div>
			<div class="card animated fadeInLeft" id="password_protect_editUserData" style="<?php if(isset($_GET["editUserData"])){if(isset($_GET['userid'])){echo "";}else{echo 'display:none;';}}else{echo 'display:none;';} ?>">
				<div class="card-body">
					<i class="fad fa-user-shield"></i> การแก้ไขข้อมูลของ <span id="editUserData_spanProtectorPaasswordTitleName"><?php if(isset($_GET["userid"])){echo $userGetNameForSpanItilPasswordProtect[explode("-", $_GET["userid"])[1]];} ?></span> ได้รับการป้องกัน
					<br />
					<div class="alert alert-danger" style="display: none;" id="alertPasswordDanger"><strong>Warning!</strong> รหัสผ่านไม่ถูกต้อง</div>
					<input type="hidden" id="useridforchkpassword_edituserdata" name="" value="">
					<input type="password" name="pw" class="form-control" placeholder="ระบุรหัสผ่านที่นี่" id="passProtectInputEditUserData">
					<div class="row" style="margin-top:10px;">
						<div class="col-6"><button class="btn btn-block btn-success btn-verify_password_peud" data-id="<?php if(isset($_GET["userid"])){ echo explode("-", $_GET["userid"])[1];} ?>"><i class="fad fa-badge-check"></i> ยืนยันรหัสผ่าน</button></div>
						<div class="col-6"><button class="btn btn-block btn-warning btn-forgot_password_peud" disabled=""><i class="fad fa-puzzle-piece"></i> ลืมรหัสผ่าน(ยังไม่เสร็จ)</button></div>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-danger font-14" style="float: right;" onclick='$("#passProtectInputEditUserData").val("");resetEditUserData("all");'><b>&times;</b> ปิดหน้านี้</button>
				</div>
			</div>
			<div class="card animated fadeInLeft" id="edituserdata_inside" style="<?php if(isset($_GET["editUserData"])){if(isset($_GET['userid'])){if(isset($_GET["lock"])){echo "display:none;";}else{echo "display:none;";}}else{echo 'display:none;';}}else{echo 'display:none;';} ?>">
				<div class="card-header animated bounceInLeft" style="animation-delay: .1s"><i class="fad fa-user-edit"></i> แก้ไขข้อมูล ของ <span id="EUD_displayname"><?php if(isset($_GET["userid"])){echo $userGetNameForSpanItilPasswordProtect[explode("-", $_GET["userid"])[1]];} ?></span></div>
				<div class="card-body">
					<label class="animated fadeInLeft">ชื่อ - นามสกุล</label>
					<input type="text" class="form-control animated fadeInLeft" disabled="" readonly="" placeholder="ใส่ชื่อภาษาไทย" id="editUserData_name_th" name="nth">
					<label style="animation-delay: .1s" class="animated fadeInLeft">ชื่อ - นามสกุล ภาษาอังกฤษ มีคำนำหน้าด้วย</label>
					<input style="animation-delay: .1s" type="text" class="form-control animated fadeInLeft" placeholder="ใส่ชื่อภาษาอังกฤษ" id="editUserData_name_en" name="nen">

					<label style="animation-delay: .2s" class="animated fadeInLeft">ชื่อเล่นภาษาไทย</label>
					<input style="animation-delay: .2s" type="text" class="form-control animated fadeInLeft" placeholder="ใส่ชื่อเล่นภาษาไทย" id="editUserData_nick_th" name="nith">

					<label style="animation-delay: .3s" class="animated fadeInLeft">ชื่อเล่นภาษาอังกฤษ</label>
					<input style="animation-delay: .3s" type="text"  disabled="" readonly=""  class="form-control animated fadeInLeft" placeholder="ใส่ชื่อเล่นภาษาอังกฤษ" id="editUserData_nick_en" name="nien">

					<label style="animation-delay: .4s" class="animated fadeInLeft">เลขที่</label>
					<input style="animation-delay: .4s" type="text"  disabled="" readonly="" id="editUserData_number" value="" name="Number" class="form-control animated fadeInLeft" placeholder="ใส่เลขที่ของคุณ">

					<label style="animation-delay: .5s" class="animated fadeInLeft">เบอร์โทรศัพท์ที่สามารถติดต่อได้(ไม่ต้องมี - หรือ เว้นวรรค เช่น 0812345678, 0821345678)</label>
					<input style="animation-delay: .5s"type="text" id="editUserData_phone" name="PhoneNumber" class="form-control animated fadeInLeft" placeholder="ใส่เบอร์โทรศัพท์ของคุณ">

					<label style="animation-delay: .6s" class="animated fadeInLeft">วิชาที่ชอบ</label>
					<input style="animation-delay: .6s" type="text" id="editUserData_favsubject" name="FavSubject" class="form-control animated fadeInLeft" placeholder="วิชาที่ชื่นชอบ">

					<label style="animation-delay: .7s" class="animated fadeInLeft">วิชาที่ไม่ชอบ</label>
					<input style="animation-delay: .7s" type="text" id="editUserData_unfavsubject" name="UnfavSubject" class="form-control animated fadeInLeft" placeholder="วิชาที่ไม่ค่อยชอบ">

					<label style="animation-delay: .8s" class="animated fadeInLeft">โรงเรียนที่จบการศึกษาในระดับชั้นประถมศึกษา</label>
					<input style="animation-delay: .8s" type="text" id="editUserData_p6school" placeholder="โรงเรียนที่จบการศึกษาในระดับชั้นประถมศึกษา" name="p6school" class="form-control animated fadeInLeft">

					<label style="animation-delay: .9s" class="animated fadeInLeft">งานอดิเรก สิ่งที่ทำในเวลาว่าง</label>
					<input style="animation-delay: .9s" type="text" id="editUserData_adirek" class="form-control animated fadeInLeft" name="adirek" placeholder="งานอดิเรก สิ่งที่ทำในเวลาว่าง">

					<label style="animation-delay: 1s" class="animated fadeInLeft">วันเกิด</label>
					<input style="animation-delay: 1s" type="date" id="editUserData_birthday" name="BirthDay" placeholder="วันเกิด คลิกเพื่อเลือก" class="form-control datepicker animated fadeInLeft">

					<label style="animation-delay: 1.1s" class="animated fadeInLeft">คติประจำใจ</label>
					<input style="animation-delay: 1.1s" type="text" id="editUserData_pIH" name="pIH" placeholder="คติประจำใจของคุณ" class="form-control animated fadeInLeft">
    				<input type="hidden" id="editUserData_filecount" value='0'>
    				<label style="animation-delay: 1.3s" class="animated fadeInLeft">IG, FACEBOOK <span class="" style="color: #00f;" id="editUserData_fb-help">(เอาจากตรงไหน ?)</span>, LINE ID</label>
					<input style="animation-delay: 1.3s;margin-bottom: 10px;" type="text" id="editUserData_igurl" name="IG" placeholder="Link IG ของคุณ https://instagram.com/ชื่อไอจี" class="form-control animated fadeInLeft">
					<input style="animation-delay: 1.3s;margin-bottom: 10px;" type="text" id="editUserData_fburl" name="facebook" style="margin-top: 10px;" placeholder="Link Profile Facebook ของคุณ" class="form-control animated fadeInLeft">
					<input style="animation-delay: 1.3s" type="text" id="editUserData_lineid" name="lineid" style="margin-top: 10px;" placeholder="Line ID ของคุณ" class="form-control animated fadeInLeft">

					<label style="animation-delay: 1.4s" class="animated fadeInLeft">คำอวยพรให้เพื่อนๆของคุณหรือนักเรียนของคุณ</label>
					<textarea style="animation-delay: 1.4s" name="" id="editUserData_wishtofriend" cols="50" rows="8" class="form-control animated fadeInLeft"></textarea>

					<label style="animation-delay: 1.5s" class="animated fadeInLeft">Password รหัสผ่านสำหรับการป้องกันการแก้ไขข้อมูล</label>
					<input style="animation-delay: 1.5s" type="text" id="editUserData_pwprotectdata" name="pwprotectdata" placeholder="รหัสผ่านสำหรับป้องกันการแก้ไขข้อมูล" class="form-control animated fadeInLeft">

					<div class="row" style="margin-top:10px;">
						<div style="animation-delay: 1.6s" class="col-6 animated fadeInLeft"><div class="btn btn-success btn-peud-submit btn-block"><i class="fad fa-save"></i> บันทึกข้อมูล</div></div>
						<div style="animation-delay: 1.6s" class="col-6 animated fadeInLeft"><div class="btn btn-peud-reset btn-block btn-warning"><i class="fad fa-trash"></i> ลบข้อมูล</div></div>
					</div>
					
					
				</div>
				<div class="card-footer">
					<button class="btn btn-danger font-14" style="float: right;" onclick='resetEditUserData("all");resetForm_editUserData();$(".btn-peud-submit").removeAttr("data-id");$("#passProtectInputEditUserData").val("");'><b>&times;</b> ปิดหน้านี้</button>
				</div>
			</div>
		</div>
		<!--- Editor User Picture Data --->
		<!--- Editor User Picture Data --->
		<!--- Editor User Picture Data --->
		<!--- Editor User Picture Data --->
		<!--- Editor User Picture Data --->
		<div id="editUserPictureData" class="animated fadeInLeft ">
			<div class="card" id="main_edituserpicturedata" style="<?php if(isset($_GET["editUserPictureData"])){
			if(isset($_GET["userid"])){
				echo "display: none;dis:1px;";
			}else{
				echo "";
			}
		}else{
			echo "display: none;dis:2px;";
		} ?>">
				<div class="card-header"><i class="fad fa-user-edit"></i> คุณต้องการแก้ไขรูปของใคร ?</div>
				<div class="card-body"><div class="row"><?php echo $ds_editpic; ?></div></div>
			</div>
			<div class="card animated fadeInLeft" id="edituserpicturedata_inside" style="<?php if(isset($_GET["editUserData"])){if(isset($_GET['userid'])){if(isset($_GET["lock"])){echo "display:none;";}else{echo "display:none;";}}else{echo 'display:none;';}}else{echo 'display:none;';} ?>">
				<div class="card-header animated bounceInLeft" style="animation-delay: .1s"><i class="fad fa-user-edit"></i> แก้ไขขรูปของ <span id="EUPDNameDisplay"></span></div>
				<div class="card-body">
					<input type="file" id="file" name='file' class="form-control"><br />
					<strong>* หาก Scale รูปผิดพลาดให้เลือกรูปใหม่นะครับ เพื่อทำให้ profile ของคุณสวยมากขึ้น ด้วยความหวังดีจากเกม</strong><br />
					<center><img src="" class="rounded-circle" style="width: 150px;height: 150px;background-size: contain;border-radius: 100px;margin-bottom:30px;" id="EUPDImageContainer"></center>
					
					<center id="kEUPD" class="" style="display:none;margin-bottom:30px;"><span class="alert alert-warning"><i class="fad fa-tools fa-2x fa-spin"></i> กำลัง<span id="kamlang_EUPD"></span>รูปของคุณอยู่ กรุณารอสักครู่</span></center>
					
					<center id="sEUPD" class="" style="display:none;margin-bottom:30px;"><span class="alert alert-success"><i class="fad fa-tools fa-2x"></i> <span id="success_EUPD"></span>รูปของคุณเสร็จเรียบร้อยแล้ว</span></center>
					
					<center id="wEUPD" class="" style="margin-bottom:30px;"><span class="alert alert-info"><i class="fad fa-tools fa-2x"></i> เลือกรูปเพื่ออัพโหลด</span></center>
					<div class="row" style="margin-top:10px;">
						<div style="animation-delay: 1.6s" class="col-6 animated fadeInLeft"><div class="btn btn-success btn-peupd-upload-picture btn-block" onclick="submitForm()"><i class="fad fa-cloud-upload-alt"></i> อัพโหลดรูปของคุณ</div></div>
						<div style="animation-delay: 1.6s" class="col-6 animated fadeInLeft"><div class="btn btn-peupd-delete-picture btn-block btn-warning"><i class="fad fa-trash"></i> ลบรูปของคุณ</div></div>
					</div>
					<strong>* Support File type : JPG | JPEG | PNG (GIF will support later version)</strong>
				</div>
				<div class="card-footer">
					<button class="btn btn-danger font-14" style="float: right;" onclick='resetEditUserPictureData("all");
					$(".btn-peupd-upload-picture").removeAttr("data-id");$("#passProtectInputEditUserPictureData").val("");$(".btn-peupd-delete-picture").removeAttr("data-id");setTimeout(function(){location.reload();},1220);'><b>&times;</b> ปิดหน้านี้</button>
				</div>
			</div>
			<div class="card animated fadeInLeft" id="password_protect_editUserPictureData" style="<?php if(isset($_GET["editUserPictureData"])){if(isset($_GET['userid'])){echo "";}else{echo 'display:none;';}}else{echo 'display:none;';} ?>">
				<div class="card-body">
					<i class="fad fa-user-shield"></i> การแก้ไขรูปของ <span id="editUserPictureData_spanProtectorPaasswordTitleName"><?php if(isset($_GET["userid"])){echo $userGetNameForSpanItilPasswordProtect[explode("-", $_GET["userid"])[1]];} ?></span> ได้รับการป้องกัน
					<br />
					<div class="alert alert-danger" style="display: none;" id="alertPasswordDangerEUPD"><strong>Warning!</strong> รหัสผ่านไม่ถูกต้อง</div>
					<input type="hidden" id="useridforchkpassword_edituserdataEUPD" name="" value="">
					<input type="password" name="pw" class="form-control" placeholder="ระบุรหัสผ่านที่นี่" id="passProtectInputEditUserPictureData">
					<div class="row" style="margin-top:10px;">
						<div class="col-6"><button class="btn btn-block btn-success btn-verify_password_peupd" data-id="<?php if(isset($_GET["userid"])){ echo explode("-", $_GET["userid"])[1];} ?>"><i class="fad fa-badge-check"></i> ยืนยันรหัสผ่าน</button></div>
						<div class="col-6"><button class="btn btn-block btn-warning btn-forgot_password_peupd" disabled=""><i class="fad fa-puzzle-piece"></i> ลืมรหัสผ่าน(ยังไม่เสร็จ)</button></div>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-danger font-14" style="float: right;" onclick='$("#passProtectInputEditUserPictureData").val("");resetEditUserPictureData("all");'><b>&times;</b> ปิดหน้านี้</button>
				</div>
			</div>
		</div>
		<!--- User List --->
		<!--- User List --->
		<!--- User List --->
		<!--- User List --->
		<!--- User List --->
		<!--- User List --->
		<div id="viewList" class="animated fadeInLeft " style="<?php echo $viewList_hide; ?>">
			<div class="card" id="main_viewlist">
				<div class="card-body">
					<h1 class="text-primary title-car animated fadeInLeft"><i class="fad fa-users text-warning"></i> เพื่อนของพวกเรา (รวมคุณครูที่ปรึกษาแล้ว)</h1><hr width="99.6666667%" class="animated fadeInLeft" />
					<div class="row">
						<script type="text/javascript">
							window.addEventListener('load', function(){
    							var allimages= document.getElementsByTagName('img');
    							for (var i=0; i<allimages.length; i++) {
    							    if (allimages[i].getAttribute('data-src')) {
    							        allimages[i].setAttribute('src', allimages[i].getAttribute('data-src'));
    							    }
    							}
							}, false);
						</script>
					<?php
					$d = 1;
					//$userdataID,$f,$userNickname,$NumberNo,$successuserID
					foreach ($userdataID as $key => $value) {
						if($successuserID[$key] == "false"){
							continue;
						}
						?>
						<div class="col-md-6 col-sm-6 col-xs-6 col-lg-3 col-xl-3 animated fadeInLeft" style="animation-delay: <?php echo $d/10; ?>s;margin-top: 10px;">
							<div class="card">
  								<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" style="width: 150px;height: 150px;background-size: contain;border-radius: 100px;margin-bottom:30px;align-self: center;margin-top: 3px;" class="rounded-circle" data-src="<?php if(file_exists(imagestorage.md5($value).imgFile)){
  									echo imagestorage.md5($value).imgFile."?app=123";
  								}else{
  									echo "storage_image/no-avatar.jpg?app=123";
  								} ?>">
  								<div class="card-body">
    								<h5 class="card-title" style="font-size: 16px;"><?php echo $f[$key]; ?></h5>
    								<p class="card-text" style="font-size: 14spx;">ชื่อเล่น: <?php echo $userNickname[$key]; ?><br />เลขที่: <?php echo $NumberNo[$key]; ?></p>
    								<b><a class="btn btn-primary btn-show-friend text-light" data-control-id="<?php echo md5($value); ?>">ดูข้อมูลเพิ่มเติมของ <?php echo $userNickname[$key]; ?></a></b>
						 		</div>
							</div>
						</div>
						<?php
						$d++;
					}
					 ?>
					 </div>
				</div>	
			</div>
			<br />
			<div class="card animated fadeInLeft" id="methodShowing" style="<?php if(isset($_GET["vid"])){}else{echo"display: none;";} ?>">
					<div class="card-header animated fadeInLeft title-car text-warning" style="font-size:22px !important;animation-delay: .1s;">
						<i class="fad fa-id-card-alt text-primary"></i> ข้อมูลของ <span id="viewlist_param_name_display_title"></span> ( เลขที่ <span id="noNumber_viewListParam"></span> )</span>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
							<img style="animation-delay: .2s;width: 300px;height: 300px;background-size: cover;border-radius: 100px;margin-bottom:30px;align-self: center;margin-top: 3px;vertical-align: center; align-content: center;align-items: center;" id='viewList_param_img' class="rounded-circle animated fadeInLeft" src="">
						</div>
						<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-9 col-xl-9">
							<div class="card">
								<div class="card-body">
									<label class="text-primary animated fadeInLeft" style="font-size:16px !important;animation-delay:.3s;"><b>ชื่อ - นามสกุล</b></label>
									<h1 id="viewList_param_name" class="text-dark animated fadeInLeft" style="animation-delay: .3s;font-size: 20px !important;"><span id="name_th_view"></span> (<span id="name_en_view"></span>)</h1>

<label class="text-primary animated fadeInLeft" style="font-size:16px !important;animation-delay:.3s;"><b>ชื่อเล่น</b></label>
									<h1 id="viewList_param_name" class="text-dark animated fadeInLeft" style="animation-delay: .3s;font-size: 20px !important;"><span id="nick_th_view"></span> (<span id="nick_en_view"></span>)</h1>

									<label class="text-primary animated fadeInLeft" style="font-size:16px !important;animation-delay: .7s;"><b>โรงเรียนในระดับชั้นประถมศึกษา</b></label>
          							<h1 id="viewList_param_p6s" class="text-dark animated fadeInLeft" style="animation-delay: .7s;font-size: 20px !important;">โรงเรียน</h1>

          							<label class="text-primary animated fadeInLeft" style="font-size:16px !important;animation-delay: .7s;"><b>วิชาที่ชอบ / วิชาที่ไม่ชอบ</b></label>
          							<h1 id="viewList_param_fuf" class="text-dark animated fadeInLeft" style="animation-delay: .7s;font-size: 20px !important;">โรงเรียน</h1>

									<label class="text-primary animated fadeInLeft" style="font-size:16px !important;animation-delay: .4s;"><b>วันเกิด</b></label>
									<h1 id="viewList_param_birth" class="text-dark animated fadeInLeft" style="animation-delay: .4s;font-size: 20px !important;">dd/mm/yyyy</h1>

									<label class="text-primary animated fadeInLeft" style="font-size:16px !important;animation-delay: .5s;"><b>อายุ</b></label>
									<h1 id="viewList_param_age" class="text-dark animated fadeInLeft" style="animation-delay: .5s;font-size: 20px !important;">Y ปี M เดือน d วัน H ชั่วโมง i นาที s วินาที (อ้างอิงจากเวลา 7:00 ของวันเกิด)</h1>

									<label class="text-primary animated fadeInLeft" style="font-size:16px !important;animation-delay: .6s;"><b>เบอร์โทรศัพท์</b></label>
          							<h1 id="viewList_param_phone" class="text-dark animated fadeInLeft" style="animation-delay: .6s;font-size: 20px !important;">091-234-5678</h1>

          							<label class="text-primary animated fadeInLeft" style="font-size:16px !important;animation-delay: .7s;"><b>คติประจำใจ</b></label>
          							<h1 id="viewList_param_pIH" class="text-dark animated fadeInLeft" style="animation-delay: .7s;font-size: 20px !important;">ความพยายามไม่เคยทำร้ายสักคนที่ตั้วใจ</h1>

									<label class="text-primary animated fadeInLeft" style="font-size:16px !important;animation-delay: .8s;"><b>งานอดิเรก</b></label>
									<h1 id="viewList_param_adirek" class=" animated fadeInLefttext-dark" style="animation-delay: .8s;font-size: 20px !important;">เล่นเกม</h1>

									<label class="text-primary animated fadeInLeft" style="font-size:16px !important;animation-delay: .9s;"><b>สิ่งที่อยากจะบอกเพื่อนๆ</b></label>
									<textarea style="resize: none;" style="animation-delay: .9s;font-size: 20px !important;" rows="7" id="viewList_param_wif" readonly="" class="form-control animated fadeInLeft text-primary">สู้ๆๆๆๆ
โชคดี</textarea>

<label class="text-primary animated fadeInLeft" style="font-size:16px !important;animation-delay: 1s;"><b>Social Media</b></label>
<div class="row">
	<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 animated fadeInLeft" style="animation-delay: 1.1s">
		<a id="viewList_param_line" style="font-size:16px !important;" class="btn btn-block btn-selector-manager_style_adding title-car-sport text-secondary btn-success btn-line" data-detail="">Line</a>
	</div>
	<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 animated fadeInLeft" style="animation-delay: 1.2s">
		<a id="viewList_param_facebook" style="font-size:16px !important;" class="btn btn-block btn-selector-manager_style_adding title-car-sport text-secondary btn-primary btn-fb" data-detail="">Facebook</a>
	</div>
	<div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 animated fadeInLeft" style="animation-delay: 1.3s">
		<a id="viewList_param_ig" style="font-size:16px !important;" class="btn btn-block btn-selector-manager_style_adding title-car-sport text-secondary btn-warning btn-ig" data-detail="">Instagram</a>
	</div>
</div>
<div class="row">
	<div class="col-6 col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 animated fadeInLeft" style="margin-top:10px;animation-delay: 1.4s;"><b><a href="" style="font-size: 22px;" id="fbShare" target="_blank" class="share-popup text-warning btn btn-block btn-selector-manager_style_adding btn-secondary"><i class="fab fa-facebook"></i> แชร์</a></b></div>
	<div class="col-6 col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 animated fadeInLeft" style="margin-top:10px;animation-delay: 1.5s;"><b><a href="" style="font-size:22px;" id="twitterShare" target="_blank" class="share-popup text-warning btn btn-block btn-selector-manager_style_adding btn-secondary"><i class="fab fa-twitter"></i> แชร์</a></b></div>
	<div class="col-6 col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 animated fadeInLeft" style="margin-top:10px;animation-delay: 1.6s;"><b><a href="" style="font-size:22px;" id="googleShare" target="_blank" class="share-popup text-warning btn btn-block btn-selector-manager_style_adding btn-secondary"><i class="fab fa-google-plus"></i> แชร์</a></b></div>
	<div class="col-6 col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 animated fadeInLeft" style="margin-top:10px;animation-delay: 1.7s;"><b><a id="urlCopy" style="font-size:16px;" class="text-warning btn btn-block btn-selector-manager_style_adding btn-secondary"><i class="fad fa-code"></i> คัดลอก URL</a></b></div>
	<textarea id="url" style="display: none;"></textarea>
</div>
								</div>
							</div>
						</div>
						</div>
					</div>
					<div class="card-footer" style="max-height: 100%;height: 60px !important;">
						<div class="btn btn-danger float-right btn-selector-manager_style_adding" onclick="closeDesk();" style="position: relative;">ปิดหน้านี้</div>
						<span class="float-right" style="font-style: italic; vertical-align: center;margin-top: 10px;position: relative;" id="editLastTimeContain">แก้ไข้ล่าสุดเมื่อ <span id='editLastTime' style="font-style: normal;font-weight: bold;"></span>&nbsp;&nbsp;</span>
					</div>
				</div>
		</div>
	</div>
	<!--- Modal --->
		<!-- Modal -->
<div class="modal fade" id="fbModal" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Facebook URL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="facebook.jpeg" width="60%" height="500px;" style="background-size: contain;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	<?php $endTime = round(microtime(true) * 1000); $elapsed = $endTime - $startTime; ?>
	<div class="" style="margin-top: 50px;">
		<div class="bg-dark text-light" style=""><center style="padding-top: 20px;padding-bottom: 20px;">[ FriendShip System Product Version 2.0.1 ] &copy; Copyright iGameDeveloper x Nawin-<?php echo date("Y");?> All Right Reserved. (Generate Page took <?php echo number_format($elapsed / 1000,2);?> ms)</center></div>
	</div>
	</div>
	<script type="text/javascript">
		//TimeZone Selecter
		let date = new Date(); // 2018-07-24:17:26:00 (Look like GMT+0)
const myTimeZone = 7; // my timeZone 
// my timeZone = 7h = 7 * 60 * 60 * 1000 (millisecond);
// 2018-07-24:17:26:00 = x (milliseconds)
// finally, time in milliseconds (GMT+7) = x + myTimezone 
date.setTime( date.getTime() + myTimeZone * 60 * 60 * 1000 );
		var start_wdh = 0;
		var divID = "";
		function resetForm_editUserData(){
			$("#editUserData_name_en").val("");
			$("#editUserData_nick_th").val("");
			$("#editUserData_phone").val("");
			$("#editUserData_favsubject").val("");
			$("#editUserData_unfavsubject").val("");
			$("#editUserData_p6school").val("");
			$("#editUserData_adirek").val("");
			$("#editUserData_birthday").val("");
			$("#editUserData_pIH").val(""); 
			$("#editUserData_igurl").val("");
			$("#editUserData_fburl").val("");
			$("#editUserData_lineid").val("");
			$("#editUserData_wishtofriend").val("");
			$("#editUserData_pwprotectdata").val("");
		}
		function resetForm_addUserData(){
			$("#name_en").val("");
			$("#nick_th").val("");
			$("#phone").val("");
			$("#favsubject").val("");
			$("#unfavsubject").val("");
			$("#p6school").val("");
			$("#adirek").val("");
			$("#birthday").val("");
			$("#pIH").val(""); 
			$("#igurl").val("");
			$("#fburl").val("");
			$("#lineid").val("");
			$("#wishtofriend").val("");
			$("#pwprotectdata").val("");
		}
		function changeURL(datahref){

		}
		function addWidth(data){
			start_wdh = parseInt(start_wdh) + parseInt(data);
			document.getElementById('loader-bar').style.width = start_wdh + "%";
		}
		function resetHome(type){
				if(type == "1"){
					if ($('#policy_home').is(':visible')) {
  						$('#policy_home').slideUp();
					}
				}else{

				}
				if(type == '2'){
					if ($('#term_home').is(':visible')) {
  						$('#term_home').slideUp();
					}
				}
				if(type == "all"){
					if ($('#term_home').is(':visible')) {
  						$('#term_home').slideUp();
					}
					if ($('#policy_home').is(':visible')) {
  						$('#policy_home').slideUp();
					}
				}	
			}
			function resetAddUserData(t){
				if(t == "all"){
					window.history.replaceState("<?php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80") ? '' : (($_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])); ?>", document.title, "?addUserData");
					if ($('#adduserData_inside').is(':visible')) {
  						$('#adduserData_inside').slideUp();
					}
					if ($('#main_addUserData').is(':hidden')) {
  						$('#main_addUserData').show();
					}
				}
			}
			function resetEditUserData(t){
				if(t == "all"){
					$("#passProtectInputEditUserData").val("");
					window.history.replaceState("<?php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80") ? '' : (($_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])); ?>", document.title, "?editUserData");
					if ($('#edituserdata_inside').is(':visible')) {
  						$('#edituserdata_inside').slideUp();
					}
					if ($('#password_protect_editUserData').is(':visible')) {
  						$('#password_protect_editUserData').slideUp();
					}
					if ($('#main_edituserdata').is(':hidden')) {
  						$('#main_edituserdata').show();
					}
				}
			}
			function resetEditUserPictureData(t){
				if(t == "all"){
					$("#passProtectInputEditUserPictureData").val("");
					window.history.replaceState("<?php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80") ? '' : (($_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])); ?>", document.title, "?editUserPictureData");
					if ($('#edituserpicturedata_inside').is(':visible')) {
  						$('#edituserpicturedata_inside').slideUp();
					}
					if ($('#password_protect_editUserPictureData').is(':visible')) {
  						$('#password_protect_editUserPictureData').slideUp();
					}
					if ($('#main_edituserpicturedata').is(':hidden')) {
  						$('#main_edituserpicturedata').show();
					}
				}
			}
			function resetEditUserPictureDataForRe(t){
				if(t == "all"){
					$("#passProtectInputEditUserPictureData").val("");
					if ($('#edituserpicturedata_inside').is(':visible')) {
  						$('#edituserpicturedata_inside').slideUp();
					}
					if ($('#password_protect_editUserPictureData').is(':visible')) {
  						$('#password_protect_editUserPictureData').slideUp();
					}
					if ($('#main_edituserpicturedata').is(':hidden')) {
  						$('#main_edituserpicturedata').show();
					}
				}
			}
			function resetEditUserDataForRe(t){
				if(t == "all"){
					$("#passProtectInputEditUserData").val("");
					if ($('#edituserdata_inside').is(':visible')) {
  						$('#edituserdata_inside').slideUp();
					}
					if ($('#password_protect_editUserData').is(':visible')) {
  						$('#password_protect_editUserData').slideUp();
					}
					if ($('#main_edituserdata').is(':hidden')) {
  						$('#main_edituserdata').show();
					}
				}
			}
			function refreshAddAllrefreshAddAll(t){
				if(t == "1"){
					if($("#adduserData_inside").is(':visible')){
						$("#adduserData_inside").slideUp();
					}
				}
				if(t == "2"){
					if($("#password_protect_addUserData").is(':visible')){
						$("#password_protect_addUserData").slideUp();
					}
				}
				if(t == "all"){
					if($("#password_protect_addUserData").is(':visible')){
						$("#password_protect_addUserData").slideUp();
					}
					if($("#adduserData_inside").is(':visible')){
						$("#adduserData_inside").slideUp();
					}
				}
			}
		$(document).ready(function(){
			var emc = setInterval(function(){
				addWidth(1);
				chk();
			},50);
			function chk(){
				if(start_wdh == 100){
					clearInterval(emc);
					$("#loader-bar-contain").slideUp();
				}
			}
			
			function toggleAll(){
				$("#home").slideUp();
				$("#addUserData").slideUp();
				$("#editUserData").slideUp();
				$("#editUserPictureData").slideUp();
				$("#viewList").slideUp();
				if($("#main_addUserData").is(":hidden")){
					$("#main_addUserData").show();
				}
				if($("#adduserData_inside").is(":visible")){
					$("#adduserData_inside").slideUp();
				}
			}
			function refreshallDis(){
				$("#home_btn").removeClass("active");
				$("#addUserData_btn").removeClass("active");
				$("#editUserData_btn").removeClass("active");
				$("#editUserPictureData_btn").removeClass("active");
				$("#viewList_btn").removeClass("active");
			}
			$(".btn-addData").on("click",function(){
				divID = $("#"+$(this).attr("data-control"));
				$("#AUD_displayname").empty().append(divID.attr("data-fullname"));
				$("#adduserData_inside").show("slow");
				resetForm_addUserData();
				$('#main_addUserData').slideUp();
				$(".btn-paud-submit").attr("data-id",divID.attr("pureid"));
				console.log(divID);
				$("#number").val(divID.attr("data-number"));
				$("#name_th").val(divID.attr("data-fullname"));
				$("#nick_en").val(divID.attr("data-nickname"));
				refreshAddAllrefreshAddAll("2");
				window.history.replaceState("<?php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80") ? '' : (($_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])); ?>", document.title, "?addUserData&userid="+$(this).attr("data-control"));
			});
			$(".btn-addData-success").on("click",function(){
				divID = $("#"+$(this).attr("data-control"));
				$('#main_addUserData').slideUp();
				refreshAddAllrefreshAddAll("1");
				$("#password_protect_addUserData").show("slow");
				window.history.replaceState("<?php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80") ? '' : (($_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])); ?>", document.title, "?addUserData&lock=true&userid="+$(this).attr("data-control"));
			});
			$(".btn-editdata").on("click",function(){
				resetForm_editUserData();
				divID = $("#"+$(this).attr("data-control"));
				$("EUD_displayname").empty().append(divID.attr("data-fullname"));
				$("#main_edituserdata").slideUp();
				$("#password_protect_editUserData").show("slow");
				$(".btn-verify_password_peud").attr("data-id",divID.attr("pureid"));
				$("#editUserData_spanProtectorPaasswordTitleName").empty().append(divID.attr("data-fullname"));
				$("#useridforchkpassword_edituserdata").val($(this).attr("data-control"));
				window.history.replaceState("<?php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80") ? '' : (($_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])); ?>", document.title, "?editUserData&lock=true&userid="+$(this).attr("data-control"));
			});
			$(".btn-editpicturedata").on("click",function(){
				divID = $("#"+$(this).attr("data-control"));
				$("#main_edituserpicturedata").slideUp();
				$("#password_protect_editUserPictureData").show("slow");
				$(".btn-verify_password_peupd").attr("data-id",divID.attr("pureid"));
				$("#editUserPictureData_spanProtectorPaasswordTitleName").empty().append(divID.attr("data-fullname"));
				$("#useridforchkpassword_edituserdataEUPD").val($(this).attr("data-control"));
				window.history.replaceState("<?php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80") ? '' : (($_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])); ?>", document.title, "?editUserPictureData&lock=true&userid="+$(this).attr("data-control"));
			});
			$(".btn-href").on("click",function(){
				var pref = $(this).attr("data-pref");
				window.history.replaceState("<?php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80") ? '' : (($_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])); ?>", "A Miracle Friendship [V2] - "+pref, "?"+pref);
				toggleAll();
				refreshallDis();
				resetEditUserPictureDataForRe("all");
				resetEditUserDataForRe("all");
				closeDeskForRe();
				refreshAddAllrefreshAddAll("all");
				resetHome("all");
				$("#"+pref).show("fast");
				$("#"+pref+"_btn").addClass("active");
			});
		});
							function getAge2(dateString) {
  var now = new Date();
  var today = new Date(now.getYear(),now.getMonth(),now.getDate());

  var yearNow = now.getYear();
  var monthNow = now.getMonth();
  var dateNow = now.getDate();

  var dob = new Date(dateString.substring(6,10),
                     dateString.substring(0,2)-1,                   
                     dateString.substring(3,5)                  
                     );

  var yearDob = dob.getYear();
  var monthDob = dob.getMonth();
  var dateDob = dob.getDate();
  var age = {};
  var ageString = "";
  var yearString = "";
  var monthString = "";
  var dayString = "";


  yearAge = yearNow - yearDob;

  if (monthNow >= monthDob)
    var monthAge = monthNow - monthDob;
  else {
    yearAge--;
    var monthAge = 12 + monthNow -monthDob;
  }

  if (dateNow >= dateDob)
    var dateAge = dateNow - dateDob;
  else {
    monthAge--;
    var dateAge = 31 + dateNow - dateDob;

    if (monthAge < 0) {
      monthAge = 11;
      yearAge--;
    }
  }

  age = {
      years: yearAge,
      months: monthAge,
      days: dateAge
      };

  if ( age.years > 1 ) yearString = " ปี";
  else yearString = " ปี";
  if ( age.months> 1 ) monthString = " เดือน";
  else monthString = " เดือน";
  if ( age.days > 1 ) dayString = " วัน";
  else dayString = " วัน";


  if ( (age.years > 0) && (age.months > 0) && (age.days > 0) )
    ageString = age.years + yearString + " " + age.months + monthString + " " + age.days + dayString + "";
  else if ( (age.years == 0) && (age.months == 0) && (age.days > 0) )
    ageString = "" + age.days + dayString + "";
  else if ( (age.years > 0) && (age.months == 0) && (age.days == 0) )
    ageString = age.years + yearString + "สุขสันต์วันเกิด";
  else if ( (age.years > 0) && (age.months > 0) && (age.days == 0) )
    ageString = age.years + yearString + " " + age.months + monthString + "";
  else if ( (age.years == 0) && (age.months > 0) && (age.days > 0) )
    ageString = age.months + monthString + " " + age.days + dayString + "";
  else if ( (age.years > 0) && (age.months == 0) && (age.days > 0) )
    ageString = age.years + yearString + " " + age.days + dayString + "";
  else if ( (age.years == 0) && (age.months > 0) && (age.days == 0) )
    ageString = age.months + monthString + " old.";
  else ageString = "ไม่สามารถคำนวนอายุได้";

  return ageString;
}
function replaceBulk( str, findArray, replaceArray ){
  var i, regex = [], map = {}; 
  for( i=0; i<findArray.length; i++ ){ 
    regex.push( findArray[i].replace(/([-[\]{}()*+?.\\^$|#,])/g,'\\$1') );
    map[findArray[i]] = replaceArray[i]; 
  }
  regex = regex.join('|');
  str = str.replace( new RegExp( regex, 'g' ), function(matched){
    return map[matched];
  });
  return str;
}
Number.prototype.pad = function(n) {
    return new Array(n).join('0').slice((n || 2) * -1) + this;
}
				function getAge(dateString) {
					 var dataStr = dateString.split("-");
					 var year = dataStr[0];
					 var month = dataStr[1];
					 var m = ('0' + month).slice(-2);
					 var day = parseInt(dataStr[2]);
					 var d = ('0' + day).slice(-2);
return getAge2(m+"/"+d+"/"+year);
}
function dateToText(dateString){
	
	var dataStr = dateString.split("-");
	var year = parseInt(dataStr[0])+543;
	var month = dataStr[1];
	var m = replaceBulk(('0' + month).slice(-2),['01',"02","03","04","05","06","07","08","09","10","11","12"],["มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม",'มิถุนายน',"กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"]);
	var day = parseInt(dataStr[2]);
	var d = ('0' + day).slice(-2);

	 var xd = new Date(dataStr[0],
                     ('0' + month).slice(-2)-1,                   
                     dataStr[2]                  
                     );
var weekday = new Array(7);
weekday[0] = "อาทิตย์";
weekday[1] = "จันทร์";
weekday[2] = "อังคาร";
weekday[3] = "พุทธ";
weekday[4] = "พฤหัสบดี";
weekday[5] = "ศุกร์";
weekday[6] = "เสาร์";
var n = weekday[xd.getDay()];
 	return "วัน" + n + " ที่ "+d+" เดือน "+m+" พ.ศ. "+year;
}
				function getdata(id){
					if($("#main_viewlist").is(":visible")){
						$("#main_viewlist").slideUp();
					}
					if($("#methodShowing").is(":hidden")){
						$("#methodShowing").show("fast");
					}
					replaceV2(id);
				}
				function viewListRefreshV2(){
					$("#viewlist_param_name_display_title").empty();
					$("#viewList_param_img").empty();
					$("#name_th_view").empty();
					$("#name_en_view").empty();
					$("#nick_th_view").empty();
					$("#nick_en_view").empty();
					$("#viewList_param_birth").empty();
					$("#viewList_param_age").empty();
					$("#viewList_param_phone").empty();
					$("#viewList_param_pIH").empty();
					$("#viewList_param_adirek").empty();
					$("#viewList_param_wif").empty();
					$("#viewList_param_line").removeAttr("data-detail").empty().append("Line");
					$("#viewList_param_facebook").removeAttr("data-detail").empty().append("Facebook");
					$("#viewList_param_ig").removeAttr("data-detail").empty().append("Instagram");
					$("#noNumber_viewListParam").empty();
					$("#viewList_param_p6s").empty();
					$("#viewList_param_fuf").empty();
				}
	function timeago(date) {
    	var seconds = Math.floor(Date.now() / 1000) - parseInt(date);
    	if(Math.floor(seconds/(60*60*24*365.25)) >= 2) return Math.floor(seconds/(60*60*24*365.25)) + " ปีที่แล้ว";
    	else if(Math.floor(seconds/(60*60*24*365.25)) >= 1) return "1 ปีที่แล้ว";
    	else if(Math.floor(seconds/(60*60*24*30.4)) >= 2) return Math.floor(seconds/(60*60*24*30.4)) + " เดือนที่แล้ว";
    	else if(Math.floor(seconds/(60*60*24*30.4)) >= 1) return "1 เดือนที่แล้ว";
    	else if(Math.floor(seconds/(60*60*24*7)) >= 2) return Math.floor(seconds/(60*60*24*7)) + " สัปดาห์ที่แล้ว";
    	else if(Math.floor(seconds/(60*60*24*7)) >= 1) return "1 สัปดาห์ที่แล้ว";
    	else if(Math.floor(seconds/(60*60*24)) >= 2) return Math.floor(seconds/(60*60*24)) + " วันที่แล้ว";
    	else if(Math.floor(seconds/(60*60*24)) >= 1) return "1 วันที่แล้ว";
    	else if(Math.floor(seconds/(60*60)) >= 2) return Math.floor(seconds/(60*60)) + " ชั่วโมงที่แล้ว";
    	else if(Math.floor(seconds/(60*60)) >= 1) return "1 ชั่วโมงที่แล้ว";
    	else if(Math.floor(seconds/60) >= 2) return Math.floor(seconds/60) + " นาทีที่แล้ว";
    	else if(Math.floor(seconds/60) >= 1) return "1 นาทีที่แล้ว";
    	else if(seconds >= 2)return seconds + " วินาทีที่แล้ว";
    	else return seconds + "1 วินาทีที่แล้ว";
	}
				function replaceV2(id){
					$.get({
						url: "appliedv2.php?signature=getUdata&id="+id,
						success: function(data){
							var src = JSON.parse(data);
							console.log(src);
							formattedphone = src.return.phone.substr(0, 3) + '-' + src.return.phone.substr(3, 3) + '-' + src.return.phone.substr(6,4);
							$("#viewlist_param_name_display_title").empty().append(src.return.name_th);
							$("#viewList_param_img").attr("src",src.imgpath);
							window.history.replaceState("<?php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80") ? '' : (($_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])); ?>", src.return.name_th+" ("+src.return.nick_en+")", "?viewList&vid="+id);
							document.title = src.return.name_th+" ("+src.return.nick_en+")";
							$("#name_th_view").empty().append(src.return.name_th);
							$("#name_en_view").empty().append(src.return.name_en);
							$("#nick_th_view").empty().append(src.return.nick_th);
							$("#nick_en_view").empty().append(src.return.nick_en);
							$("#viewList_param_birth").empty().append(dateToText(src.return.birthday));
							$("#viewList_param_age").empty().append(getAge(src.return.birthday));
							$("#viewList_param_phone").empty().append(formattedphone);
							$("#viewList_param_pIH").empty().append(src.return.pIH+"\r\n<br />,"+src.return.nick_en);
							$("#viewList_param_adirek").empty().append(src.return.adirek);
							$("#viewList_param_wif").empty().html(src.return.wishtofriend+"\r\nจาก "+src.return.nick_en);
							$("#viewList_param_line").removeAttr("data-detail").attr("data-detail",src.return.lineid);
							$("#viewList_param_facebook").removeAttr("data-detail").attr("data-detail",src.return.fburl);
							$("#viewList_param_ig").removeAttr("data-detail").attr("data-detail",src.return.igurl);
							$("#noNumber_viewListParam").empty().append(src.return.number);
							$("#viewList_param_p6s").empty().append(src.return.p6school);
							$("#viewList_param_fuf").empty().append(src.return.favsubject+" / "+src.return.unfavsubject);
							$("#editLastTime").empty().append(timeago(src.filetime));
							var title = "Profile ของฉันบนสมุดมิตรภาพ - ("+src.return.nick_th+")";
							$("#fbShare").removeAttr("href").attr("href","http://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent(window.location.href)+"&t="+encodeURIComponent(title));
							$("#googleShare").removeAttr("href").attr("href","http://plus.google.com/share?url="+encodeURIComponent(window.location.href));
							$("#twitterShare").removeAttr("href").attr("href","http://www.twitter.com/intent/tweet?url="+encodeURIComponent(window.location.href)+"&via=FriendShip&text="+encodeURIComponent(title));
							//http://www.facebook.com/sharer/sharer.php?u=URL_HERE&t=TITLE_HERE
							//http://www.twitter.com/intent/tweet?url=URL_HERE&via=TWITTER_HANDLE_HERE&text=TITLE_HERE
							//http://plus.google.com/share?url=URL_HERE
						}
					})
				}
				
				function getdataV2(id){
					if($("#main_viewlist").is(":visible")){
						$("#main_viewlist").slideUp();
					}
					if($("#methodShowing").is(":hidden")){
						$("#methodShowing").show("fast");
					}else{
						$("#methodShowing").show("fast");
					}
					$("#methodShowing").show("fast");
					$("#methodShowing").show("fast");
					replaceV2(id);
				}
				function closeDesk(){
					window.history.replaceState("<?php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80") ? '' : (($_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])); ?>", "A Miracle Friendship [V2]", "?viewList");
					$("#main_viewlist").show("fast");
					$("#methodShowing").slideUp();
					viewListRefreshV2();
					document.title = "A Miracle Friendship [V2]";
				}
				function closeDeskForRe(){
					$("#main_viewlist").show("fast");
					$("#methodShowing").slideUp();
					viewListRefreshV2();
					document.title = "A Miracle Friendship [V2]";
				}
				function pushData(){

				}
				function afb(){
				$("#fbModal").modal();
				}
				<?php if(isset($_GET["vid"])){
						?>
						getdataV2("<?php echo $_GET["vid"]; ?>");
						$("#methodShowing").show("fast");
						document.title = '<?php echo $userGetNameForSpanItilPasswordProtect[$_GET["vid"]];?> (<?php echo $userGetNickname[$_GET["vid"]];?>)';
						<?php
					} ?>
				$(document).ready(function(){
					$("#fb-help").on("click",function(){
						afb();
					});
					$("#editUserData_fb-help").on("click",function(){
						afb();
					});
					$(".btn-fb").on("click",function(){
						window.open($(this).attr("data-detail"),'_blank');
					});
					$(".btn-ig").on("click",function(){
						window.open($(this).attr("data-detail"),'_blank');
					});
					$(".btn-line").on("click",function(){
						jAlert("Line ID: "+$(this).attr("data-detail"),"info","Line ID");
					});
					$(".btn-show-friend").on("click",function(){
						getdata($(this).attr("data-control-id"));
					});
				});
				$(".share-popup").click(function(){
    				var window_size = "width=585,height=511";
    				var url = this.href;
    				var domain = url.split("/")[2];
    				switch(domain) {
        				case "www.facebook.com":
        				    window_size = "width=585,height=368";
        				    break;
        				case "www.twitter.com":
        				    window_size = "width=585,height=261";
        				    break;
        				case "plus.google.com":
            				window_size = "width=517,height=511";
           				break;
    				}
    				window.open(url, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,' + window_size);
    				return false;
				});
	$("#urlCopy").on('click',function(event){
		event.preventDefault;
 		var dummy = document.createElement('input');
    	text = window.location.href;
		document.body.appendChild(dummy);
		dummy.value = text;
		dummy.select();
		document.execCommand('copy');
		document.body.removeChild(dummy);
		jAlert("SuccesFully","success","Copy");
	});
		function EUPDshow(id,id2,id3){
			if($("#sEUPD").is(":visible")){
				$("#sEUPD").slideUp();
			}
			if($("#kEUPD").is(":hidden")){
				$("#kEUPD").show("slow");
			}
			if($("#wEUPD").is(":visible")){
				$("#wEUPD").slideUp();
			}
		}
		function EUPDshow2(id,id2,id3){
			setTimeout(function(){
				if($("#kEUPD").is(":visible")){
					$("#kEUPD").slideUp();
				}
				if($("#sEUPD").is(":hidden")){
					$("#sEUPD").show();
				}
				setTimeout(function(){
					if($("#wEUPD").is(":hidden")){
						$("#wEUPD").show("slow");
					}
					if($("#sEUPD").is(":visible")){
						$("#sEUPD").slideUp();
					}
				},5000);
			},3000);
		}
		function resetAllAlertEUPD(id,id2,id3){
			if($("#sEUPD").is(":visible")){
				$("#sEUPD").slideUp();
			}
			if($("#kEUPD").is(":visible")){
				$("#kEUPD").slideUp();
			}
			if($("#wEUPD").is(":visible")){
				$("#wEUPD").slideUp();
			}
		}
		function successEUPD(type){
			resetAllAlertEUPD($("#sEUPD"),$("#kEUPD"),$("wEUPD"));
			$("#success_EUPD").empty().append(type);
			EUPDshow2($("#sEUPD"),$("#kEUPD"),$("wEUPD"));
		}
		function progressEUPD(type){
			resetAllAlertEUPD();
			$("#kamlang_EUPD").empty().append(type);
			EUPDshow($("#sEUPD"),$("#kEUPD"),$("wEUPD"));
		}
		function deletePicture(id){
			progressEUPD("ลบ");
			$.get({
				url:"appliedv2.php?signature=deletePicture&id="+$(".btn-peupd-upload-picture").attr("data-id"),
				data: {"id":id},
				success:function(data){
					successEUPD("ลบ");
					chkFileCont(id);
				}
			})
		}
		function chkFileCont(id){
			$.get({
				url:"appliedv2.php?signature=chkImage&id="+id,
				data: {"id":id},
				success:function(data){
					$("#EUPDImageContainer").attr("src",data);
				}
			})
			
		}
		function isset(val){
			return !!val;
		}
		function submitForm() {
			progressEUPD("อัพโหลด");
    var fcnt = 0;
    var imgclean = $('#file');
    if(fcnt<=5){
    data = new FormData();
    data.append('file', $('#file')[0].files[0]);

    var imgname  =  $('input[type=file]').val();
     var size  =  $('#file')[0].files[0].size;

    var ext =  imgname.substr( (imgname.lastIndexOf('.') +1) );
    if(ext=='jpg' || ext=='jpeg' || ext=='png' || ext=='gif' || ext=='PNG' || ext=='JPG' || ext=='JPEG'){
     if(size<=1000000){
    $.ajax({
      url: "appliedv2.php?signature=uploadPicture&id="+$(".btn-peupd-upload-picture").attr("data-id"),
      type: "POST",
      data: data,
      enctype: 'multipart/form-data',
      processData: false,  // tell jQuery not to process the data
      contentType: false   // tell jQuery not to set contentType
    }).done(function(data) {
    	chkFileCont($(".btn-peupd-upload-picture").attr("data-id"));
       if(data!='FILE_SIZE_ERROR' || data!='FILE_TYPE_ERROR' ){
       	successEUPD("อัพโหลด");
        fcnt = 1;
        $('#filecount').val(fcnt);
         $('#filename').val();
         $("#EUPDImageContainer").attr("src",data);
         imgclean.replaceWith( imgclean = imgclean.clone( true ) );
       	}else{
         imgclean.replaceWith( imgclean = imgclean.clone( true ) );
         jAlert('SORRY SIZE AND TYPE ISSUE',"error",'Image Uploader');
       }

    });
    return false;
  }//end size
  else
  {
      imgclean.replaceWith( imgclean = imgclean.clone( true ) );//Its for reset the value of file type
    jAlert('Sorry File size exceeding from 1 Mb',"error",'Image Uploader');
  }
  }//end FILETYPE
  else
  {
     imgclean.replaceWith( imgclean = imgclean.clone( true ) );
   jAlert('Sorry Only you can uplaod JPEG|JPG|PNG file type',"error",'Image Uploader');
  }
  }else{    imgclean.replaceWith( imgclean = imgclean.clone( true ) );
    jAlert('You Can not Upload more than 6 Photos',"error",'Image Uploader');
  }
}
		function replaceFunctionEditUserData(id){
			$.get({
				url: "appliedv2.php?signature=getUdata",
				data: {"id":id},
				success: function(data){
					var scr_x = JSON.parse(data);
					var src_x = scr_x.return;
					console.log(scr_x);
					$("#editUserData_name_th").val(src_x["name_th"]);
					$("#editUserData_name_en").val(src_x["name_en"]);
					$("#editUserData_nick_th").val(src_x["nick_th"]);
					$("#editUserData_nick_en").val(src_x["nick_en"]);
					$("#editUserData_number").val(src_x["number"]);
					$("#editUserData_phone").val(src_x["phone"]);
					$("#editUserData_favsubject").val(src_x["favsubject"]);
					$("#editUserData_unfavsubject").val(src_x["unfavsubject"]);
					$("#editUserData_p6school").val(src_x["p6school"]);
					$("#editUserData_adirek").val(src_x["adirek"]);
					$("#editUserData_birthday").val(src_x["birthday"]);
					$("#editUserData_pIH").val(src_x["pIH"]);
					$("#editUserData_igurl").val(src_x["igurl"]);
					$("#editUserData_fburl").val(src_x["fburl"]);
					$("#editUserData_lineid").val(src_x["lineid"]);
					$("#editUserData_wishtofriend").val(src_x["wishtofriend"]);
				}
			})
		}
		$(document).ready(function(){
			var passed = "";

			$(".btn-paud-reset").on("click",function(){
				resetForm_addUserData();
			});
			$(".btn-peud-reset").on("click",function(){
				resetForm_editUserData();
			});
			$(".btn-peupd-delete-picture").on("click",function(){
				deletePicture($(this).attr("data-id"));
			});
		$(".btn-verify_password_peupd").on("click",function(){
			var id = $(this).attr("data-id");
			$.get({
				url:"appliedv2.php?signature=verifyPassword",
				data:{"id":$(this).attr("data-id"),"password":$("#passProtectInputEditUserPictureData").val()},
				success: function(data){
					var src_x = JSON.parse(data);
					if(src_x["result"] == "true"){
						$("#edituserpicturedata_inside").show("slow");
						$("#password_protect_editUserPictureData").slideUp();
						$(".btn-peupd-upload-picture").attr("data-id",id);
						$(".btn-peupd-delete-picture").attr("data-id",id);
						chkFileCont(id);
						$("#EUPDNameDisplay").empty().append($("#editUserPictureData_spanProtectorPaasswordTitleName").html());
					}else{
						$("#passProtectInputEditUserPictureData").val("");
						$("#passProtectInputEditUserPictureData").focus();
						$("#alertPasswordDangerEUPD").show("fast");
						setTimeout(function(){
							$("#alertPasswordDangerEUPD").slideUp();
						},10000);
					}
				}
			});
		});

		$(".btn-verify_password_peud").on("click",function(){
			var id = $(this).attr("data-id");
			$.get({
				url:"appliedv2.php?signature=verifyPassword",
				data:{"id":$(this).attr("data-id"),"password":$("#passProtectInputEditUserData").val()},
				success: function(data){
					var src_x = JSON.parse(data);
					if(src_x["result"] == "true"){
						$("#edituserdata_inside").show("slow");
						$("#password_protect_editUserData").slideUp();
						replaceFunctionEditUserData(id);
						$(".btn-peud-submit").attr("data-id",id);
					}else{
						$("#passProtectInputEditUserData").val("");
						$("#passProtectInputEditUserData").focus();
						$("#alertPasswordDanger").show("fast");
						setTimeout(function(){
							$("#alertPasswordDanger").slideUp();
						},10000);
					}
				}
			});
		});
		$(".btn-peud-submit").on("click",function(){
			var uxr = {};
			uxr["name_th"] = 			$("#editUserData_name_th").val();
			uxr["name_en"] = 			$("#editUserData_name_en").val();
			uxr["nick_th"] = 			$("#editUserData_nick_th").val();
			uxr["nick_en"] = 			$("#editUserData_nick_en").val();
			uxr["number"] = 			$("#editUserData_number").val();
			uxr["phone"] = 				$("#editUserData_phone").val();
			uxr["favsubject"] =  		$("#editUserData_favsubject").val();
			uxr["unfavsubject"] =		$("#editUserData_unfavsubject").val();
			uxr["p6school"] = 			$("#editUserData_p6school").val();
			uxr["adirek"] = 			$("#editUserData_adirek").val();
			uxr["birthday"] = 			$("#editUserData_birthday").val();
			uxr["pIH"] = 				$("#editUserData_pIH").val(); 
			uxr["igurl"] = 				$("#editUserData_igurl").val();
			uxr["fburl"] = 				$("#editUserData_fburl").val();
			uxr["lineid"] = 			$("#editUserData_lineid").val();
			uxr["wishtofriend"] =  		$("#editUserData_wishtofriend").val();
			uxr["pwprotectdata"] = 		$("#editUserData_pwprotectdata").val();
			uxr["fileid"] = 			$(this).attr("data-id");
			uxr["filepath"] =  			$("#"+"edit-"+$(this).attr("data-id")).attr("data-filepath");
if(!isset(uxr["name_th"])){			passed = "false"; errXform = $("#editUserData_name_th");		eNum = "FSNTH-FSERP"; }
if(!isset(uxr["name_en"])){			passed = "false"; errXform = $("#editUserData_name_en");		eNum = "FSNEN-FSERP"; }
if(!isset(uxr["nick_th"])){			passed = "false"; errXform = $("#editUserData_nick_th");		eNum = "FSTHN-FSERP"; }	
if(!isset(uxr["nick_en"])){			passed = "false"; errXform = $("#editUserData_nick_en");		eNum = "FSENN-FSERP"; }	
if(!isset(uxr["number"])){			passed = "false"; errXform = $("#editUserData_number");			eNum = "FSNUM-FSERP"; }	
if(!isset(uxr["phone"])){			passed = "false"; errXform = $("#editUserData_phone");			eNum = "FSPHO-FSERP"; }	
if(!isset(uxr["favsubject"])){		passed = "false"; errXform = $("#editUserData_favsubject");		eNum = "FSFAS-FSERP"; }	
if(!isset(uxr["unfavsubject"])){	passed = "false"; errXform = $("#editUserData_unfavsubject");	eNum = "FSUFS-FSERP"; }	
if(!isset(uxr["p6school"])){		passed = "false"; errXform = $("#editUserData_p6school");		eNum = "FSPSS-FSERP"; }	
if(!isset(uxr["adirek"])){			passed = "false"; errXform = $("#editUserData_adirek");			eNum = "FSADI-FSERP"; }	
if(!isset(uxr["birthday"])){		passed = "false"; errXform = $("#editUserData_birthday");		eNum = "FSBIR-FSERP"; }	
if(!isset(uxr["pIH"])){				passed = "false"; errXform = $("#editUserData_pIH");			eNum = "FSPIH-FSERP"; }	
if(!isset(uxr["igurl"])){			passed = "false"; errXform = $("#editUserData_igurl");			eNum = "FSIGU-FSERP"; }	
if(!isset(uxr["fburl"])){			passed = "false"; errXform = $("#editUserData_fburl");			eNum = "FSFBU-FSERP"; }	
if(!isset(uxr["lineid"])){			passed = "false"; errXform = $("#editUserData_lineid");			eNum = "FSLII-FSERP"; }
if(!isset(uxr["wishtofriend"])){	passed = "false"; errXform = $("#editUserData_wishtofriend");	eNum = "FSWIF-FSERP"; }
if(!isset(uxr["pwprotectdata"])){	passed = "false"; errXform = $("#editUserData_pwprotectdata");	eNum = "FSPWS-FSERP"; }
				if(passed == "false"){
					errXform.focus();
					passed = "true";
					jAlert("กรุณาระบุข้อมูลของคุณให้ครบเพื่อการทำงานที่ไม่ผิดพลาดของระบบ \r\n Error: "+eNum,"error","แก้ไขข้อมูลไม่ได้");
				}else{
				$.post({
					url:"appliedv2.php?signature=postUpdata",
					data:{"ux":uxr},
					success: function(data){
						var src_x = JSON.parse(data);
						if(src_x["result"] == "true"){
							window.history.replaceState("<?php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80") ? '' : (($_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])); ?>", document.title, "?editUserData");
							location.reload();
						}
					}
				});
				}
			});
			<?php if($_SERVER["SERVER_NAME"] == "friendship309.000webhostapp.com"){
				?>
				bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
  	 			bannerNode.parentNode.removeChild(bannerNode);
				<?php
			} ?>
			$(".btn-paud-submit").on("click",function(){
			var ux = {};
				ux["name_th"] = 		$("#name_th").val();
				ux["name_en"] = 		$("#name_en").val();
				ux["nick_th"] = 		$("#nick_th").val();
				ux["nick_en"] = 		$("#nick_en").val();
				ux["number"] = 			$("#number").val();
				ux["phone"] = 			$("#phone").val();
				ux["favsubject"] =  	$("#favsubject").val();
				ux["unfavsubject"] =	$("#unfavsubject").val();
				ux["p6school"] = 		$("#p6school").val();
				ux["adirek"] = 			$("#adirek").val();
				ux["birthday"] = 		$("#birthday").val();
				ux["pIH"] = 			$("#pIH").val(); 
				ux["igurl"] = 			$("#igurl").val();
				ux["fburl"] = 			$("#fburl").val();
				ux["lineid"] = 			$("#lineid").val();
				ux["wishtofriend"] =  	$("#wishtofriend").val();
				ux["pwprotectdata"] = 	$("#pwprotectdata").val();
				ux["fileid"] = 			$(this).attr("data-id");
				ux["filepath"] =  		$("#add-"+$(this).attr("data-id")).attr("data-filepath");
				var vux = $("#add-"+$(this).attr("data-id")).attr("data-success");
		if(!isset(ux["name_th"])){			passed = "false"; errXform = $("#name_th");			eNum = "FSNTH-FSERP"; }
		if(!isset(ux["name_en"])){			passed = "false"; errXform = $("#name_en");			eNum = "FSNEN-FSERP"; }
		if(!isset(ux["nick_th"])){			passed = "false"; errXform = $("#nick_th");			eNum = "FSTHN-FSERP"; }	
		if(!isset(ux["nick_en"])){			passed = "false"; errXform = $("#nick_en");			eNum = "FSENN-FSERP"; }	
		if(!isset(ux["number"])){			passed = "false"; errXform = $("#number");			eNum = "FSNUM-FSERP"; }	
		if(!isset(ux["phone"])){			passed = "false"; errXform = $("#phone");			eNum = "FSPHO-FSERP"; }	
		if(!isset(ux["favsubject"])){		passed = "false"; errXform = $("#favsubject");		eNum = "FSFAS-FSERP"; }	
		if(!isset(ux["unfavsubject"])){		passed = "false"; errXform = $("#unfavsubject");	eNum = "FSUFS-FSERP"; }	
		if(!isset(ux["p6school"])){			passed = "false"; errXform = $("#p6school");		eNum = "FSPSS-FSERP"; }	
		if(!isset(ux["adirek"])){			passed = "false"; errXform = $("#adirek");			eNum = "FSADI-FSERP"; }	
		if(!isset(ux["birthday"])){			passed = "false"; errXform = $("#birthday");		eNum = "FSBIR-FSERP"; }	
		if(!isset(ux["pIH"])){				passed = "false"; errXform = $("#pIH");				eNum = "FSPIH-FSERP"; }	
		if(!isset(ux["igurl"])){			passed = "false"; errXform = $("#igurl");			eNum = "FSIGU-FSERP"; }	
		if(!isset(ux["fburl"])){			passed = "false"; errXform = $("#fburl");			eNum = "FSFBU-FSERP"; }	
		if(!isset(ux["lineid"])){			passed = "false"; errXform = $("#lineid");			eNum = "FSLII-FSERP"; }
		if(!isset(ux["wishtofriend"])){		passed = "false"; errXform = $("#wishtofriend");	eNum = "FSWIF-FSERP"; }
		if(!isset(ux["pwprotectdata"])){	passed = "false"; errXform = $("#pwprotectdata");	eNum = "FSPWS-FSERP"; }
				if(passed == "false"){
					errXform.focus();
					passed = "true";
					jAlert("กรุณาระบุข้อมูลของคุณให้ครบเพื่อการทำงานที่ไม่ผิดพลาดของระบบ \r\n Error: "+eNum,"error","เพิ่มข้อมูลไม่ได้");
				}else{
					if(vux == "false"){
						$.post({
					url:"appliedv2.php?signature=postUpdata",
					data:{"ux":ux},
					success: function(data){
						var src_x = JSON.parse(data);
						if(src_x["result"] == "true"){
							window.history.replaceState("<?php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80") ? '' : (($_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])); ?>", document.title, "?viewList");
							location.reload();
						}
					}
				});
					}else{
						jAlert("ข้อมูลของ " +ux["name_th"] + " ได้รับการเพิ่มเรียบร้อยแล้ว หากต้องการแก่ไขให้ไปที่เมนูแก้ไข","error","เพิ่มข้อมูลไม่ได้");
						window.history.replaceState("<?php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].(($_SERVER["SERVER_PORT"] == "80") ? '' : (($_SERVER["SERVER_PORT"] == "443") ? "" : ":".$_SERVER["SERVER_PORT"])); ?>", document.title, "?editUserData&userid=edit-"+$(this).attr("data-id"));
						location.reload();
					}
				}
			});
		});
	</script>
	<div id="fb-root"></div>
</body>
</html>