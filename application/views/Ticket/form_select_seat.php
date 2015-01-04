<form id="form_select_seat" action="Ticket/booking" container="#option" style="text-align: center;">

    <h3 style="text-align: center;">เลือกที่นั่ง</h3><br>
    <p>
    <div style="display: inline-block;">
        <img src="assets/images/van/seat1.png" alt=""/>
        <p>ที่นั่งยังว่างอยู่</p>
    </div>
    <div style="display: inline-block; margin-left: 20px; margin-right: 20px;">
        <img src="assets/images/van/seat4.png" alt=""/>
        <p>ที่นั่งที่คุณเลือก</p>
    </div>
    <div style="display: inline-block;">
        <img src="assets/images/van/seat2.png" alt=""/>
        <p>ที่นั่งไม่ว่าง</p>
    </div>

</p>

<div style="display: inline-block;">
    <input type="hidden" id="seat" name="seat">
    <div id="van14"></div>
</div>

<div style="display: inline-block; vertical-align: top; margin-left: 50px; text-align: left;">
    
    <label>ชื่อผู้โดยสาร</label>
    <?= br(2) ?>
    <input type="text" name="passenger">
    <?= br(2) ?>
    
    <label>เพศ</label>
    <?= br(2) ?>
    <select name="gander">
        <option value="1">ชาย</option>
        <option value="2">หญิง</option>
    </select>
    <?= br(2) ?>

    <label>โทรศัพท์</label>
    <?= br(2) ?>
    <input type="text" name="tel">
    <?= br(2) ?>
    
    <input type="checkbox" name="price_select" checked>
    <label>ใช้ราคาตั๋วที่ตั้งในระบบ</label>
    <?= br(2) ?>
    <input type="text" name="price">
    <?= br(2) ?>

    <label>หมายเหตุ</label>
    <?= br(2) ?>
    <textarea name="details" style="height: 100px;"></textarea>
    <?= br(3) ?>

    <button type="submit" class="btn btn-info btn-lg">
        <span class="glyphicon glyphicon-ok"></span> ยืนยันการจอง
    </button>
</div>
<?= br(5) ?>
</form>

<script>
    
    $("#van14").van14();
    $("#van14").van14(<?=$set_seat?>);
    $("#form_select_seat").submit(function() {
        
        $("#seat").val($("#van14").van14("get"));
    });
</script>