<?php require_once("userheader.php"); ?>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <?php include("sidebar.php");
        $insertb = new mainfuntion;
        $buss = new Users;
        if (isset($_POST['permit_submit'])) {
            if ($_POST['code'] != '') {
                if ($_POST['code']) {
                    $id = $_POST['code'];
                    header("location:permit_details.php?text=e&id=" . $id . "");
                } else {
    echo "<script>alert('Something wrong');</script>";
    }
    }
    }
    if (isset($_POST['bsubmit'])) {
    if ($_POST['name'] != '' && $_POST['address'] != '' && $_POST['size'] != '' && $_POST['type'] != '' && $_POST['pname'] != '' && $_POST['pno'] != '' && $_POST['email'] != '' && $_POST['bno'] != '' && $_POST['state'] != '' && $_POST['government'] != '' && $_POST['year'] != '') {
    $perno = '+234' . $_POST['pno'];
    $bsno = '+234' . $_POST['bno'];
    $sql = $insertb->insertbusiness($_SESSION['id'], $_POST['name'], $_POST['address'], $_POST['size'], $_POST['type'], $_POST['pname'], $perno, $_POST['email'], $bsno, $_POST['state'], $_POST['government'], $_POST['year']);
    if ($sql) {
    $id = $sql;
    header("location:success.php?text=b&id=" . $id . "");
    } else {
    echo "<script>alert('Something wrong');</script>";
    }
    }
    }
    if (isset($_POST['vsubmit'])) {
    if ($_POST['ownername'] != '' && $_POST['registrationno'] != '' && $_POST['chasisno'] != '' && $_POST['make'] != '' && $_POST['manufactureyear'] != '' && $_POST['vgovernment'] != '' && $_POST['vstate'] != '' && $_POST['type'] != '' && $_POST['year'] != '' && $_POST['address'] != '' && $_POST['mobile'] != '' && $_POST['duration'] != '' && $_POST['town'] != '' && $_POST['email'] != '') {
    $sql = $insertb->insertvehicle($_SESSION['id'], $_POST['ownername'], $_POST['registrationno'], $_POST['chasisno'], $_POST['make'], $_POST['manufactureyear'], $_POST['vgovernment'], $_POST['vstate'], $_POST['type'], $_POST['year'], $_POST['address'], $_POST['mobile'], $_POST['duration'], $_POST['town'], $_POST['email']);
    if ($sql) {
    $id = $sql;
    header("location:success.php?text=v&id=" . $id . "");
    } else {
    echo "<script>alert('Something wrong');</script>";
    }
    }
    }
    if (isset($_POST['psubmit'])) {
    if ($_POST['title'] != '' && $_POST['mobile'] != '' && $_POST['address1'] != '' && $_POST['address2'] != '' && $_POST['pgovernment'] != '' && $_POST['pstate'] != '' && $_POST['type'] != '' && $_POST['year'] != '') {
    // echo '<pre>';print_r($_POST);die();
        $mobile = '+234' . $_POST['mobile'];
        $sql = $insertb->insertproperty($_SESSION['id'], $_POST['title'], $mobile, $_POST['address1'], $_POST['address2'], $_POST['pstate'], $_POST['pgovernment'], $_POST['type'], $_POST['year']);
        if ($sql) {
        $id = $sql;
        header("location:success.php?text=p&id=" . $id . "");
        } else {
        echo "<script>alert('Something wrong');</script>";
        }
        }
        }
        if (isset($_POST['bsubmit_exem'])) {
        if ($_POST['name'] != '' && $_POST['address'] != '' && $_POST['size'] != '' && $_POST['type'] != '' && $_POST['pno'] != '' && $_POST['email'] != '' && $_POST['state'] != '' && $_POST['government'] != '' && $_POST['year'] != '') {
        $perno = '+234' . $_POST['pno'];
        $sql = $insertb->insertbusiness_exemptions($_SESSION['id'], $_POST['name'], $_POST['address'], $_POST['size'], $_POST['type'], $perno, $_POST['email'], $_POST['state'], $_POST['government'], $_POST['year'], $_POST['town'], $_POST['duration'], $_POST['tell_us']);
        if ($sql) {
        $id = $sql;
        header("location:success_exem.php?text=b&id=" . $id . "");
        } else {
        echo "<script>alert('Something wrong');</script>";
        }
        }
        }
        if (isset($_POST['vsubmit_exem'])) {
        if ($_POST['ownername'] != '' && $_POST['registrationno'] != '' && $_POST['chasisno'] != '' && $_POST['make'] != '' && $_POST['manufactureyear'] != '' && $_POST['vgovernment'] != '' && $_POST['vstate'] != '' && $_POST['year'] != '' && $_POST['address'] != '' && $_POST['mobile'] != '' && $_POST['duration'] != '' && $_POST['town'] != '' && $_POST['email'] != '') {
        $sql = $insertb->insertvehicle_exemption($_SESSION['id'], $_POST['ownername'], $_POST['registrationno'], $_POST['chasisno'], $_POST['make'], $_POST['manufactureyear'], $_POST['vgovernment'], $_POST['vstate'], $_POST['year'], $_POST['address'], $_POST['mobile'], $_POST['duration'], $_POST['town'], $_POST['email'], $_POST['tell_us']);
        if ($sql) {
        $id = $sql;
        header("location:success_exem.php?text=v&id=" . $id . "");
        } else {
        echo "<script>alert('Something wrong');</script>";
        }
        }
        }
        if (isset($_POST['psubmit_exem'])) {
        if ($_POST['title'] != '' && $_POST['mobile'] != '' && $_POST['address1'] != '' && $_POST['pgovernment'] != '' && $_POST['pstate'] != '' && $_POST['type'] != '' && $_POST['year'] != '') {
        $mobile = '+234' . $_POST['mobile'];
        $sql = $insertb->insertproperty_exemption($_SESSION['id'], $_POST['title'], $mobile, $_POST['address1'], $_POST['pgovernment'], $_POST['pstate'], $_POST['type'], $_POST['year'], $_POST['town'], $_POST['email'], $_POST['tell_us'], $_POST['cperson'], $_POST['duration']);
        if ($sql) {
        $id = $sql;
        header("location:success_exem.php?text=p&id=" . $id . "");
        } else {
        echo "<script>alert('Something wrong');</script>";
        }
        }
        }
        ?>
        <!-- partial -->
            <div class="main-panel">
                    <div class="content-wrapper">
                            <div class="page-header">
                                    <h3 class="page-title">Business Registration </h3>
                            </div>
                            <div class="business-warning">
                                    <p>Warning!!! It is a punishable offence to give false declaration of your Business, Property, Vehicle
                                            use type.<br> Commercial Activities & Properties within Religious Premises other than that used for
                                        Worship or Parsonage are NOT EXEMPTED</p>
                            </div>
                            <div class="radio-button-choose business-button-choose">
                    <input type="radio" id="business-register" name="new-register" value="business-register" <?php if (isset($_GET['text']) && $_GET['text'] == 'b') {
                    echo 'checked';
                    } ?>> <label for="business-register">Business</label>
                    <input type="radio" id="vehicle-register" name="new-register" value="vehicle-register" <?php if (isset($_GET['text']) && $_GET['text'] == 'v') {
                    echo 'checked';
                    } ?>> <label for="vehicle-register">Vehicle Radio & Parking Permit</label>
                    <input type="radio" id="property-register" name="new-register" value="property-register" <?php if (isset($_GET['text']) && $_GET['text'] == 'p') {
                    echo 'checked';
                    } ?>> <label for="property-register">Property</label>
                    <input type="radio" id="exemption-register" name="new-register" value="exemption-register" <?php if (isset($_GET['text']) && $_GET['text'] == 'e') {
                    echo 'checked';
                    } ?>> <label for="exemption-register">Exemption</label>
                            </div>
                <div class="business-register business-new <?php if (isset($_GET['text']) && $_GET['text'] == 'b') {
                    echo 'show" style="display: block;"';
                    } ?>">
                                    <form class="business-form" method="post" action="" enctype="multipart/form-data">
                                            <div class="row">
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label">Name of Business <sup> *</sup></label>
                                                                    <input type="text" class="" name="name" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label"> Business Address<sup> *</sup></label>
                                                                    <input type="text" class="" name="address" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label">Size of Business<sup> *</sup></label>
                                                                    <select id="Business-selector" name="size" required>
                                                                            <option value="" selected>-- Select Business Size --</option>
                                                                            <!-- <option value="small">Small (Self Managed With less than 2 support staff)</option>
                                                                            <option value="medium">Medium (Self managed with less than 4 support Staff)
                                                                            </option>
                                                                            <option value="large">Large ( Self managed with 4 staffs and above)</option> -->
                                        <?php
                                        $bt = new Users;
                                        $tob = $bt->getbusinesssize();
                                        echo  $tob;
                                        foreach ($tob as $row) {
                                        ?>
                                        <!-- echo  $tob;die(); -->
                                        <option value="<?php echo $row['sizeofbusiness']; ?>"><?php echo $row['sizeofbusiness']; ?>
                                                                            </option>
                                        <?php } ?>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label"> Business Type<sup> *</sup></label>
                                                                    <select id="Business-selector" name="type" required>
                                        <?php
                                        $bt = new Users;
                                        $tob = $bt->getbusinesstype();
                                        echo  $tob;
                                        foreach ($tob as $row) {
                                        ?>
                                        <!-- echo  $tob;die(); -->
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['typeofbusiness']; ?>
                                                                            </option>
                                        <?php } ?>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label"> Contact Person<sup> *</sup></label>
                                                                    <input type="text" class="" name="pname" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field" id="mobilecode">
                                                                    <label class="input-label">Contact Person Tel( xxxxxxxxxx) <sup> *</sup></label>
                                                                    <span class="btn btn-secondary">+234</span><input type="tel" class="" name="pno"
                                                                        pattern="[0-9]{3}[0-9]{3}[0-9]{4}" maxlength="10" size="10" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label"> Business Mail<sup> *</sup></label>
                                                                    <input type="email" class="" name="email" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field" id="mobilecode">
                                                                    <label class="input-label">Business Tel( xxxxxxxxxx) <sup> *</sup></label>
                                                                    <span class="btn btn-secondary">+234</span><input type="tel" class="" name="bno"
                                                                        pattern="[0-9]{3}[0-9]{3}[0-9]{4}" maxlength="10" size="10" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label"> State where business is located<sup> *</sup></label>
                                                                    <select name="state" class="state" required>
                                        <?php
                                        $state = $bt->getstate();
                                        foreach ($state as $row) {
                                        for ($i = 0; $i < 1; $i++) {
                                        echo '<option value="' . $row['state'] . '" >' . $row['state'] . '</option>';
                                        }
                                        }
                                        ?>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label">Local Government Authority where business is located <sup>
                                                                            *</sup></label>
                                                                    <select name="government" class="government">
                                                                            <option>Select State first</option>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label">Year of Validity <sup> *</sup></label>
                                                                    <input type="text" class="" name="year" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="submit-form-btn">
                                                                    <input type="submit" Value="Register" name="bsubmit">
                                                            </div>
                                                    </div>
                                            </div>
                                    </form>
                            </div>
                <div class="vehicle-register business-new <?php if (isset($_GET['text']) && $_GET['text'] == 'v') {
                    echo 'show" style="display: block;"';
                    } ?>">
                                    <form class="business-form" method="post" action="" enctype="multipart/form-data">
                                            <div class="row">
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label">Name of Owner <sup> *</sup></label>
                                                                    <input type="text" class="" name="ownername" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label">Registration Number <sup> *</sup></label>
                                                                    <input type="text" class="" name="registrationno" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="row">
                                                                    <div class="col-md-4">
                                                                            <div class="input-field">
                                                                                    <label class="input-label">Chasis Number <sup> *</sup></label>
                                                                                    <input type="text" class="" name="chasisno" required>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                            <div class="input-field">
                                                                                    <label class="input-label">Makeof Vehicle <sup> *</sup></label>
                                                                                    <input type="text" class="" name="make" required>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                            <div class="input-field">
                                                                                    <label class="input-label">Manfct. Year <sup> *</sup></label>
                                                                                    <input type="text" class="" name="manufactureyear" required>
                                                                            </div>
                                                                    </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label">Owner’s Contact Address <sup> *</sup></label>
                                                                    <input type="text" class="" name="address" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label">Owner’s Contact Email <sup> *</sup></label>
                                                                    <input type="text" class="" name="email" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="input-field" id="mobilecode">
                                                                    <label class="input-label">Owner’s Contact Tel. <sup> *</sup></label>
                                                                    <span class="btn btn-secondary">+234</span><input type="tel" class="" name="mobile"
                                                                        pattern="[0-9]{3}[0-9]{3}[0-9]{4}" maxlength="10" size="10" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label"> State<sup> *</sup></label>
                                                                    <select name="vstate" class="vstate" required>
                                        <?php $state1 = $bt->getstate();
                                        foreach ($state1 as $row) {
                                        for ($i = 0; $i < 1; $i++) {
                                        echo '<option value="' . $row['state'] . '" >' . $row['state'] . '</option>';
                                        }
                                        }
                                        ?>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label">Local Government <sup> *</sup></label>
                                                                    <select name="vgovernment" class="vgovernment" required>
                                                                            <option>Select State first</option>
                                        <?php $state1 = $bt->getgovt();
                                        foreach ($state1 as $row) {
                                        for ($i = 0; $i < 1; $i++) {
                                        echo '<option value="' . $row['government'] . '" >' . $row['government'] . '</option>';
                                        }
                                        }
                                        ?>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                            <div class="input-field">
                                                                    <label class="input-label"> Use Type<sup> *</sup></label>
                                                                    <select name="type" required>
                                                                            <option value="">-- Select Use Type --</option>
                                                                            <!-- <option value="Private">Private (N 1500)</option>
                                                                            <option value="INTRA - STATE COMMERCIAL">INTRA - STATE COMMERCIAL (N 3000)</option>
                                                                            <option value="INTER - STATE COMMERCIAL">INTER - STATE COMMERCIAL (N 5000)</option>
                                                                            <option value="Tricycle(KEKE NAPEP or KEKE MARWA)">Tricycle (KEKE NAPEP or KEKE
                                                                                MARWA)(N500)</option>
                                                                            <option value="Vehicles other than Mini Buses and Vans">Vehicles other than Mini
                                                                                Buses and Vans e.g Trucks, Luxury Buses, etc (N2000)</option> -->
                                        <?php
                                        $bt = new Users;
                                        $tob = $bt->getusetype();
                                        echo  $tob;
                                        foreach ($tob as $row) {
                                        ?>
                                        <!-- echo  $tob;die(); -->
                                        <option value="<?php echo $row['usetypeofvrp']; ?>"><?php echo $row['usetypeofvrp']; ?>
                                                                            </option>
                                        <?php } ?>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                            <div class="input-field">
                                                                    <label class="input-label">Year of Validity <sup> *</sup></label>
                                                                    <input type="text" class="" name="year" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                            <div class="input-field">
                                                                    <label class="input-label">Duration <sup> *</sup></label>
                                                                    <select name="duration" required>
                                                                            <option value="">-- Select Duration --</option>
                                                                            <option value="Daily">Daily</option>
                                                                            <option value="1 Week">1 Week</option>
                                                                            <option value="1 Month">1 Month</option>
                                                                            <option value="Quarterly">Quarterly</option>
                                                                            <option value="6 Months">6 Months</option>
                                                                            <option value="One Year">One Year</option>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                            <div class="input-field">
                                                                    <label class="input-label">Town <sup> *</sup></label>
                                                                    <input type="text" class="" name="town" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="submit-form-btn">
                                                                    <input type="submit" Value="Register" name="vsubmit">
                                                            </div>
                                                    </div>
                                            </div>
                                    </form>
                            </div>
                <div class="property-register business-new <?php if (isset($_GET['text']) && $_GET['text'] == 'p') {
                    echo 'show" style="display: block;"';
                    } ?>">
                                    <form class="business-form" method="post" action="" enctype="multipart/form-data">
                                            <div class="row">
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label">Property Title <sup> *</sup></label>
                                                                    <input type="text" class="" name="title" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label"> Address Line 1 <sup> *</sup></label>
                                                                    <input type="text" class="" name="address1" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label">Address Line 2 <sup> *</sup></label>
                                                                    <input type="text" class="" name="address2" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="input-field" id="mobilecode">
                                                                    <label class="input-label">Contact Person Number( xxxxxxxxxx) <sup> *</sup></label>
                                                                    <span class="btn btn-secondary">+234</span><input type="tel" class="" name="mobile"
                                                                        pattern="[0-9]{3}[0-9]{3}[0-9]{4}" maxlength="10" size="10" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label">State where Property is located<sup> *</sup></label>
                                                                    <select name="pstate" class="pstate" required>
                                        <?php $state2 = $bt->getstate();
                                        foreach ($state2 as $row) {
                                        for ($i = 0; $i < 1; $i++) {
                                        echo '<option value="' . $row['state'] . '" >' . $row['state'] . '</option>';
                                        }
                                        } ?>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label">Local Government where Property is located<sup>
                                                                            *</sup></label>
                                                                    <select name="pgovernment" class="pgovernment" required>
                                                                            <option>Select State first</option>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label"> Type of Property<sup> *</sup></label>
                                                                    <select name="type" required>
                                                                            <!-- <option value="small">Small(Small Rooms apartment, Bedsitters, self-contain)
                                                                            </option>
                                                                            <option value="medium">Medium(Bungalow of not more than 3 bedrooms, storey building
                                                                                of not more than 4 units, Duplexes of not more than 4 bedrooms)</option>
                                                                            <option value="large">Large(Duplexes of more than 4 bedrooms, storey buildings of
                                                                                more than 4 units, Plazas, Warehouse)</option>
                                                                            <option value="multipurpose">Multipurpose: (Hotels, Owned school premises, Event
                                                                                    Halls & Tent, Resort and Relaxation centers, Hospital, Ultra Mart, Medical
                                                                                Centres etc.)</option> -->
                                        <?php
                                        $bt = new Users;
                                        $tob = $bt->getpropertytype();
                                        echo  $tob;
                                        foreach ($tob as $row) {
                                        ?>
                                        <!-- echo  $tob;die(); -->
                                        <option value="<?php echo $row['typeofproperty']; ?>"><?php echo $row['typeofproperty']; ?>
                                                                            </option>
                                        <?php } ?>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label">Year of Validity <sup> *</sup></label>
                                                                    <input type="text" class="" name="year" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="submit-form-btn">
                                                                    <input type="submit" Value="Register" name="psubmit">
                                                            </div>
                                                    </div>
                                            </div>
                                    </form>
                            </div>
                <div class="exemption-register business-new <?php if (isset($_GET['text']) && $_GET['text'] == 'e') {
                    echo 'show" style="display: block;"';
                    } ?>">
                                    <br>
                                    <div class="radio-button-choose business-button-choose">
                                            <label>Select Type Of Exemption</label><br>
                                            <select id="select1" onchange="setForm(this.value)">
                                                    <option value="">Select Form</option>
                                                    <option value="business-register">Business Exemption</option>
                                                    <option value="vehicle-register">Vehicle Radio & Parking Permit Exemption</option>
                                                    <option value="property-register">Property Exemption</option>
                                                    <option value="print-exemption">Click To Print Exemption Permit If Already Send A Code</option>
                                            </select>
                                    </div><br>
                                    <form class="exemption-form" method="post" action="" enctype="multipart/form-data" id="form1">
                                            <div class="row">
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label">Name of Business <sup> *</sup></label>
                                                                    <input type="text" class="" name="name" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label">Address Of Business<sup> *</sup></label>
                                                                    <input type="text" class="" name="address" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label">Size of Business<sup> *</sup></label>
                                                                    <select id="Business-selector" name="size" required>
                                                                            <option value="" selected>-- Select Business Type --</option>
                                                                            <option value="small">Small (Self Managed With less than 2 support staff)</option>
                                                                            <option value="medium">Medium (Self managed with less than 4 support Staff)
                                                                            </option>
                                                                            <option value="large">Large ( Self managed with 4 staffs and above)</option>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label">Type Of Business <sup> *</sup></label>
                                                                    <select id="Business-selector" name="type" required>
                                        <?php
                                        $bt = new Users;
                                        $tob = $bt->getbusinesstype();
                                        foreach ($tob as $row) {
                                        ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['typeofbusiness']; ?>
                                                                            </option>
                                        <?php } ?>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field" id="mobilecode">
                                                                    <label class="input-label">Contact Tel. <sup> *</sup></label>
                                                                    <span class="btn btn-secondary">+234</span><input type="tel" class="" name="pno"
                                                                        pattern="[0-9]{3}[0-9]{3}[0-9]{4}" maxlength="10" size="10" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label"> Contact Email Address<sup> *</sup></label>
                                                                    <input type="text" class="" name="email" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label"> State <sup> *</sup></label>
                                                                    <select name="state" class="state" required>
                                        <?php $state = $bt->getstate();
                                        foreach ($state as $row) {
                                        for ($i = 0; $i < 1; $i++) {
                                        echo '<option value="' . $row['state'] . '" >' . $row['state'] . '</option>';
                                        }
                                        }
                                        ?>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label">Local Government <sup> *</sup></label>
                                                                    <select name="government" class="government">
                                                                            <option>Select State first</option>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                            <div class="input-field">
                                                                    <label class="input-label">Town <sup> *</sup></label>
                                                                    <input type="text" class="" name="town" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                            <div class="input-field">
                                                                    <label class="input-label">Year <sup> *</sup></label>
                                                                    <input type="text" class="" name="year" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                            <div class="input-field">
                                                                    <label class="input-label">Duration <sup> *</sup></label>
                                                                    <select name="duration" required>
                                                                            <option value="">-- Select Duration --</option>
                                                                            <option value="Daily">Daily</option>
                                                                            <option value="1 Week">1 Week</option>
                                                                            <option value="1 Month">1 Month</option>
                                                                            <option value="Quarterly">Quarterly</option>
                                                                            <option value="6 Months">6 Months</option>
                                                                            <option value="One Year">One Year</option>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label">Tell Us Why Your Business Need An Exemption <sup>
                                                                            *</sup></label>
                                                                    <input type="text" class="" name="tell_us" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="submit-form-btn">
                                                                    <input type="submit" Value="Register" name="bsubmit_exem">
                                                            </div>
                                                    </div>
                                            </div>
                                    </form>
                                    <form class="exemption-form" method="post" action="" enctype="multipart/form-data" id="form2">
                                            <div class="row">
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label">Name of Owner <sup> *</sup></label>
                                                                    <input type="text" class="" name="ownername" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label">Registration Number <sup> *</sup></label>
                                                                    <input type="text" class="" name="registrationno" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="row">
                                                                    <div class="col-md-4">
                                                                            <div class="input-field">
                                                                                    <label class="input-label">Chasis Number <sup> *</sup></label>
                                                                                    <input type="text" class="" name="chasisno" required>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                            <div class="input-field">
                                                                                    <label class="input-label">Makeof Vehicle <sup> *</sup></label>
                                                                                    <input type="text" class="" name="make" required>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                            <div class="input-field">
                                                                                    <label class="input-label">Manfct. Year <sup> *</sup></label>
                                                                                    <input type="text" class="" name="manufactureyear" required>
                                                                            </div>
                                                                    </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label">Owner’s Contact Address <sup> *</sup></label>
                                                                    <input type="text" class="" name="address" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label">Owner’s Contact Email <sup> *</sup></label>
                                                                    <input type="text" class="" name="email" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="input-field" id="mobilecode">
                                                                    <label class="input-label">Owner’s Contact Tel. <sup> *</sup></label>
                                                                    <span class="btn btn-secondary">+234</span><input type="tel" class="" name="mobile"
                                                                        pattern="[0-9]{3}[0-9]{3}[0-9]{4}" maxlength="10" size="10" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label"> State<sup> *</sup></label>
                                                                    <select name="vstate" class="vstate" required>
                                        <?php $state1 = $bt->getstate();
                                        foreach ($state1 as $row) {
                                        for ($i = 0; $i < 1; $i++) {
                                        echo '<option value="' . $row['state'] . '" >' . $row['state'] . '</option>';
                                        }
                                        }
                                        ?>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label">Local Government <sup> *</sup></label>
                                                                    <select name="vgovernment" class="vgovernment" required>
                                                                            <option>Select State first</option>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                            <div class="input-field">
                                                                    <label class="input-label">Town <sup> *</sup></label>
                                                                    <input type="text" class="" name="town" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                            <div class="input-field">
                                                                    <label class="input-label">Year of Exemption <sup> *</sup></label>
                                                                    <input type="text" class="" name="year" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                            <div class="input-field">
                                                                    <label class="input-label">Duration <sup> *</sup></label>
                                                                    <select name="duration" required>
                                                                            <option value="">-- Select Duration --</option>
                                                                            <option value="Daily">Daily</option>
                                                                            <option value="1 Week">1 Week</option>
                                                                            <option value="1 Month">1 Month</option>
                                                                            <option value="Quarterly">Quarterly</option>
                                                                            <option value="6 Months">6 Months</option>
                                                                            <option value="One Year">One Year</option>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label">Tell Us Why Your Vehicle Need Exemption <sup> *</sup></label>
                                                                    <input type="text" class="" name="tell_us" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="submit-form-btn">
                                                                    <input type="submit" Value="Register" name="vsubmit_exem">
                                                            </div>
                                                    </div>
                                            </div>
                                    </form>
                                    <form class="exemption-form" method="post" action="" enctype="multipart/form-data" id="form3">
                                            <div class="row">
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label">Property Title <sup> *</sup></label>
                                                                    <input type="text" class="" name="title" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label"> Address Of Property <sup> *</sup></label>
                                                                    <input type="text" class="" name="address1" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label">Contact Person <sup> *</sup></label>
                                                                    <input type="text" class="" name="cperson" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label">Contact Person Email <sup> *</sup></label>
                                                                    <input type="text" class="" name="email" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field" id="mobilecode">
                                                                    <label class="input-label">Contact Person Number( xxxxxxxxxx) <sup> *</sup></label>
                                                                    <span class="btn btn-secondary">+234</span><input type="tel" class="" name="mobile"
                                                                        pattern="[0-9]{3}[0-9]{3}[0-9]{4}" maxlength="10" size="10" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label">State <sup> *</sup></label>
                                                                    <select name="pstate" class="pstate" required>
                                        <?php $state2 = $bt->getstate();
                                        foreach ($state2 as $row) {
                                        for ($i = 0; $i < 1; $i++) {
                                        echo '<option value="' . $row['state'] . '" >' . $row['state'] . '</option>';
                                        }
                                        } ?>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label">Local Government <sup> *</sup></label>
                                                                    <select name="pgovernment" class="pgovernment" required>
                                                                            <option>Select State first</option>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label">Town <sup> *</sup></label>
                                                                    <input type="text" class="" name="town" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label">Year of Validity <sup> *</sup></label>
                                                                    <input type="text" class="" name="year" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label"> Type of Property<sup> *</sup></label>
                                                                    <select name="type" required>
                                                                            <option value="small">Small(Small Rooms apartment, Bedsitters, self-contain)
                                                                            </option>
                                                                            <option value="medium">Medium(Bungalow of not more than 3 bedrooms, storey building
                                                                                of not more than 4 units, Duplexes of not more than 4 bedrooms)</option>
                                                                            <option value="large">Large(Duplexes of more than 4 bedrooms, storey buildings of
                                                                                more than 4 units, Plazas, Warehouse)</option>
                                                                            <option value="multipurpose">Multipurpose: (Hotels, Owned school premises, Event
                                                                                    Halls & Tent, Resort and Relaxation centers, Hospital, Ultra Mart, Medical
                                                                                Centres etc.)</option>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label">Duration <sup> *</sup></label>
                                                                    <select name="duration" required>
                                                                            <option value="">-- Select Duration --</option>
                                        <!-- <option value="Daily">Daily</option>
                                           <option value="1 Week">1 Week</option>
                                        <option value="1 Month">1 Month</option> -->
                                                                            <option value="Quarterly">Quarterly</option>
                                        <!-- <option value="6 Months">6 Months</option> -->
                                                                            <option value="One Year">One Year</option>
                                                                    </select>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="input-field">
                                                                    <label class="input-label">Tell Us Why Your Property Need Exemption <sup>
                                                                            *</sup></label>
                                                                    <input type="text" class="" name="tell_us" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="submit-form-btn">
                                                                    <input type="submit" Value="Register" name="psubmit_exem">
                                                            </div>
                                                    </div>
                                            </div>
                                    </form>
                                    <form class="exemption-form" method="post" action="" enctype="multipart/form-data" id="form4">
                                            <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="input-field">
                                                                    <label class="input-label">Enter Your Exemption Code <sup> *</sup></label>
                                                                    <input type="text" class="" name="code" required>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                            <div class="submit-form-btn">
                                                                    <input type="submit" Value="View Permit" name="permit_submit">
                                                            </div>
                                                    </div>
                                            </div>
                                    </form><br>
                    <?php
                    if (!empty($sql)) {
                    foreach ($sql as $key => $value) {
                    # code...
                    ?>
                                    <div class="dashboard-table-list">
                                            <div class="dashboard-table-list-title">
                                                    <h2>List of Business, Property and Vehicle Radio & Parking Permit Registered to this profile
                                                    </h2>
                                            </div>
                                            <div class="table-responsive">
                                                    <div class="row">
                                                            <div class="col-md-4">
                                                                    <td>Code</td>
                                                            </div>
                                                            <div class="col-md-4">
                                    <td><?php echo $value['code'] ?></td>
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <h3>QRCODE</h3>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="table-all-see-btn"><a href="businesslist.php">See All List</a></div>
                                    </div>
                    <?php
                    }
                    }
                    ?>
                            </div>
                    </div>
            <?php include("userfooter.php"); ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                    $(document).ready(function() {
                        $('.state').on('change', function() {
                            var stateID = $(this).val();
                            if (stateID) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'ajaxdata.php',
                                    data: 'state_id=' + stateID,
                                    success: function(html) {
                                        //alert(html);
                                        $('.government').html(html);
                                    }
                                });
                            } else {
                                $('.government').html('<option value="">Select State first</option>');
                            }
                        });
                        $('.vstate').on('change', function() {
                            var vstateID = $(this).val();
                            if (vstateID) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'ajaxdata.php',
                                    data: 'state_id=' + vstateID,
                                    success: function(html) {
                                        //alert(html);     
                                        $('.vgovernment').html(html);
                                    }
                                });
                            } else {
                                $('.vgovernment').html('<option value="">Select State first</option>');
                            }
                        });
                        $('.pstate').on('change', function() {
                            var pstateID = $(this).val();
                            if (pstateID) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'ajaxdata.php',
                                    data: 'state_id=' + pstateID,
                                    success: function(html) {
                                        //alert(html);     
                                        $('.pgovernment').html(html);
                                    }
                                });
                            } else {
                                $('.pgovernment').html('<option value="">Select State first</option>');
                            }
                        });
                    });
            </script>
            <script>
                    $(document).ready(function() {
                        $("select#Business-selector").change(function() {
                            $(this).find("option:selected").each(function() {
                                var optionValue = $(this).attr("value");
                                if (optionValue) {
                                    $(".business-type-size").not("." + optionValue).hide();
                                    $("." + optionValue).show();
                                } else {
                                    $(".business-type-size").hide();
                                }
                            });
                        }).change();
                    });
                    $(document).ready(function() {
                        $('.business-button-choose input[type="radio"]').click(function() {
                            var inputValue = $(this).attr("value");
                            var targetBox = $("." + inputValue);
                            $(".business-new").not(targetBox).hide();
                            $(targetBox).show();
                        });
                    });
                    ('.dropdown-submenu > a').on("click", function(e) {
                        var submenu = $(this);
                        $('.dropdown-submenu .dropdown-menu').removeClass('show');
                        submenu.next('.dropdown-menu').addClass('show');
                        e.stopPropagation();
                    });
                    $('.dropdown').on("hidden.bs.dropdown", function() {
                        // hide any open menus when parent closes
                        $('.dropdown-menu.show').removeClass('show');
                    });
            </script>
            <script type="text/javascript">
                    $(document).ready(function() {
                        $("#form1").hide();
                        $("#form2").hide();
                        $("#form3").hide();
                        $("#form4").hide();
                        $("#select1").on('change', function() {
                            var optionValue = $(this).val();
                            if (optionValue == 'business-register') {
                                $("#form1").show();
                                $("#form2").hide();
                                $("#form3").hide();
                                $("#form4").hide();
                            }
                            if (optionValue == 'vehicle-register') {
                                $("#form2").show();
                                $("#form3").hide();
                                $("#form1").hide();
                                $("#form4").hide();
                            }
                            if (optionValue == 'property-register') {
                                $("#form3").show();
                                $("#form1").hide();
                                $("#form2").hide();
                                $("#form4").hide();
                            }
                            if (optionValue == 'print-exemption') {
                                $("#form4").show();
                                $("#form1").hide();
                                $("#form2").hide();
                                $("#form3").hide();
                            }
                            if (optionValue == '') {
                                $("#form4").hide();
                                $("#form1").hide();
                                $("#form2").hide();
                                $("#form3").hide();
                            }
                        });
                    });
            </script>