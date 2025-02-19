<!DOCTYPE html>
<html lang="en">
<?php
//เชื่อมต่อฐานข้อมูล
include("conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- เพิ่ม ส่วน Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- เพิ่มฟอนต์ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            margin-left: 100px;
            margin-top: 50px;
        }

        h1 {
            /* อันนี้กำหนดส่วนย่อหน้าด้านซ้าย */
   
            /* อันนี้กำหนดส่วนย่อหน้าด้านบน */
            margin-top: 50px;
        }
    </style>
    

    <title>เเก้ไขข้อมูลแมว</title>
</head>

<?php
if(isset($_GET['action_even'])=='edit'){
    $cat_id=$_GET['cat_id'];
    $sql="SELECT * FROM cats WHERE cat_id=$cat_id";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
    }else{
        echo"ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ";
    }
    //$conn->close();
}
?>
<h1>แก้ไขข้อมูลแมว</h1>


<form action="edit_1.php" method="POST">
    <input type="hidden"name="cat_id" value="<?php echo$row['cat_id']; ?>">
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> รหัสแมว </label>
        <div class="col-sm-2">
        <label class="col-sm-1 col-form-label"><?php echo$row['cat_id']; ?></label>
        </div>
    </div>
   
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> ชื่อแมว </label>
        <div class="col-sm-2">
        <input type="text" name="cat_name" class="form-control" maxlength="50" value=<?php echo$row['cat_name']; ?> required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> สายพันธ์ </label>
        <div class="col-sm-2">
            <input type="text" name="breed" class="form-control" maxlength="50" value=<?php echo$row['breed']; ?> required>
        </div>
    </div>

    
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> สีแมว </label>
        <div class="col-sm-2">
        <select name="color" class="form-select" aria-label="Default select example">
        <option selected>กรุณาระบุสี</option>
        <option value="ขาว"<?php if ($row['color']=='ขาว'){ echo "selected";} ?>>ขาว</option>
        <option value="ดำ"<?php if ($row['color']=='ดำ'){ echo "selected";} ?>>ดำ</option>
        <option value="ส้ม"<?php if ($row['color']=='ส้ม'){ echo "selected";} ?>>ส้ม</option>
        <option value="เทา"<?php if ($row['color']=='เทา'){ echo "selected";} ?>>เทา</option>
        <option value="น้ำตาล"<?php if ($row['color']=='น้ำตาล'){ echo "selected";} ?>>น้ำตาล</option>
        <option value="อื่นๆ"<?php if ($row['color']=='อื่นๆ'){ echo "selected";} ?>>อื่นๆ</option>
        </select>
        </div>
    </div>


    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> อายุ </label>
        <div class="col-sm-2">
            <input type="text" name="age" class="form-control" maxlength="50" value=<?php echo$row['age']; ?> required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> น้ำหนัก</label>
        <div class="col-sm-2">
            <input type="text" name="weight" class="form-control" maxlength="50" value=<?php echo$row['weight']; ?> required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> วันที่รับเลี้ยง</label>
        <div class="col-sm-2">
            <input type="text" name="adoption_date" class="form-control" maxlength="50" value=<?php echo$row['adoption_date']; ?> required>
        </div>
    </div>
    </div>
    <button type="submit" class="btn btn-primary"> บันทึกข้อมูล</button>
    <button type="reset" class="btn btn-danger"> ยกเลิก</button>
 
</form>
<br> พัฒนาโดย 664485040 นางสาวพัชรภา พลายนุกูล <br>
</head>

</html>