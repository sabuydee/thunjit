function get_loader() {
    return '<div id="noTrespassingOuterBarG"><div id="noTrespassingFrontBarG" class="noTrespassingAnimationG"><div class="noTrespassingBarLineG"></div><div class="noTrespassingBarLineG"></div><div class="noTrespassingBarLineG"></div><div class="noTrespassingBarLineG"></div><div class="noTrespassingBarLineG"></div><div class="noTrespassingBarLineG"></div></div>';
}


Date.prototype.getTime = function() {

    return this.getHours().zeroPad(2) + ":" + this.getMinutes().zeroPad(2);
}

Date.prototype.getDateTh = function() {

    var thday = new Array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์");
    var thmonth = new Array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    return this.getDate() + " " + thmonth[this.getMonth()] + " " + (0 + this.getFullYear() + 543);
}

String.prototype.toDate = function() {

    var strYear = this.slice(0, 4);
    var strMonth = this.slice(5, 7);
    var strDay = this.slice(8, 10);
    var strHour = this.slice(11, 13);
    var strMinute = this.slice(14, 16);
    var strSecond = this.slice(17, 19);
    return new Date(strYear, strMonth - 1, strDay, strHour, strMinute, strSecond);
}

String.prototype.isTel = function() {

    if (this.slice(0, 2) != "08" && this.slice(0, 2) != "09")
        return false;
    if (this.length != 10)
        return false;
    if (String(parseInt(this)).length != 9)
        return false;
    return true;
}

Number.prototype.zeroPad = function(size) {
    var s = String(this);
    while (s.length < size) {
        s = "0" + s;
    }
    return s;
}

String.prototype.checkCardID = function()
{
    if (this.length != 13 || isNaN(this))
        return false;

    var checkLastCardID = function(id)
    {
        //var id = this;
        if (id.length != 12 || isNaN(id)) {
            return false;
        }
        var base = 100000000000; //สร้างตัวแปร เพื่อสำหรับให้หารเพื่อเอาหลักที่ต้องการ  
        var basenow; //สร้างตัวแปรเพื่อเก็บค่าประจำหลัก  
        var sum = 0; //สร้างตัวแปรเริ่มตัวผลบวกให้เท่ากับ 0  
        for (var i = 13; i > 1; i--) { //วนรอบตั้งแต่ 13 ลงมาจนถึง 2  
            basenow = Math.floor(id / base); //หาค่าประจำตำแหน่งนั้น ๆ  
            id = id - basenow * base; //ลดค่า id ลงทีละหลัก  
            sum += basenow * i; //บวกค่า sum ไปเรื่อย ๆ ทีละหลัก  
            base = base / 10; //ตัดค่าที่ใช้สำหรับการหาเลขแต่ละหลัก  
        }
        var checkbit = (11 - (sum % 11)) % 10; //คำนวณค่า checkbit  
        return checkbit; //แสดงค่า checkbit ที่ได้
    }


    if (checkLastCardID(this.slice(0, 12)) == this.slice(12, 13))
        return true;
    return false;
}

function option_tag_thai_date(dataJson, valueColumn, dateColumn) {

    if ($.isEmptyObject(dataJson))
        return '<option>*** ไม่มีข้อมูล ***</option>';

    tmpHtml = "";
    dataJson.forEach(function(row) {

        tmpDate = new Date(row[dateColumn]).getDateTh();
        tmpHtml += '<option value="' + row[valueColumn] + '">' + tmpDate + '</option>';
    });
    return tmpHtml;
}

function option_tag(dataJson, valueColumn, titleColumn) {

    if ($.isEmptyObject(dataJson))
        return '<option>*** ไม่มีข้อมูล ***</option>';
    tmpHtml = "";
    dataJson.forEach(function(row) {
        tmpHtml += '<option value="' + row[valueColumn] + '">' + row[titleColumn] + '</option>';
    });
    return tmpHtml;
}