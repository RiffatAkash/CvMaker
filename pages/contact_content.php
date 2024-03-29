<?php
/**
 * Created by PhpStorm.
 * User: Uaday
 * Date: 8/29/2016
 * Time: 2:59 PM
 */

if(isset($_POST['btn']))
{
    $message=$obj_app->make_contact_request($_POST);
}

$result=$obj_app->find_contact();
$row=mysql_fetch_assoc($result);
?>

<h1 style="color:#fff;"><strong>Contact Us</strong></h1>
<form role="form" method="post" enctype="multipart/form-data">
    <div class="panel panel-default">
        <div class="panel-body" style="background: #E5E4E2">

            <div>
                <?php
                if (isset($message)) {
                    if ($message != 'We will Contact you later!!') {
                        ?>
                        <div class="alert alert-danger">
                            <h3 ><?php if (isset($message)) echo $message; ?></h3>
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-success">
                            <h3><?php if (isset($message)) echo $message; ?></h3>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" required="required" type="text" name="name" maxlength="300">
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input class="form-control" required="required" type="email" name="email" maxlength="300">
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input class="form-control" type="number" name="phone" maxlength="300">
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control" required="required" name="message"></textarea>
                </div>
                <div class="panel-body" align="center">
                    <button type="submit" name="btn" class="btn btn-outline  btn-success btn-sm" style="width: 100px;">Submit</button>
                    <button type="reset" class="btn btn-outline btn-warning btn-sm" style="width: 100px">Reset</button>

                </div>

            </div>
            <div class="col-md-6">
                <iframe  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3650.7163676797904!2d90.4037695!3d23.7931124!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc965bb765b666404!2z4KaG4Kau4KeH4Kaw4Ka_4KaV4Ka-4KaoIOCmh-CmqOCnjeCmn-CmvuCmsOCmqOCnjeCmr-CmvuCmtuCmqOCmvuCmsiDgpofgpongpqjgpr_gpq3gpr7gprDgp43gprjgpr_gpp_gpr8t4Kas4Ka-4KaC4Kay4Ka-4Kam4KeH4Ka2!5e0!3m2!1sbn!2sbd!4v1472636613879" width="100%" height="300" frameborder="1" style="border:dotted 1px; " allowfullscreen></iframe>
                <br>
                <b>Address : <?php if (isset($row['address'])) echo $row['address'];?></b><br>
                <b>Phone : <?php if (isset($row['phone'])) echo $row['phone'];?></b><br>
                <b>Email : <?php if (isset($row['email'])) echo $row['email'];?></b>
            </div>

            </div>
        </div>
    </div>
</form>
