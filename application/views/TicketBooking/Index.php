<form class="well">

    <h4 style=" text-align: center;">จองตั๋วรถตู้</h4><hr>

    <div class="form-group">
        <label class="col-sm-4 control-label">ต้นทาง</label>
        <div class="col-sm-8 input-group input-group-sm">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-flag"></span> จังหวัด
            </span>
            <select class="form-control" id="pv_s" name="pv_s"></select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8 input-group input-group-sm">
            <span class="input-group-addon" id="sizing-addon3">
                <span class="glyphicon glyphicon-map-marker"></span> จุดขึ้นรถ
            </span>
            <select class="form-control">
                <option>--ระบุ--</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">ปลายทาง</label>
        <div class="col-sm-8 input-group input-group-sm">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-flag"></span> จังหวัด
            </span>
            <select class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8 input-group input-group-sm">
            <span class="input-group-addon" id="sizing-addon3">
                <span class="glyphicon glyphicon-map-marker"></span> จุดลงรถ
            </span>
            <select class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">ประเภทรถ</label>
        <div class="col-sm-8 input-group input-group-sm">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </span>
            <select class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">เวลาเดินทาง</label>
        <div class="col-sm-8 input-group input-group-sm">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-time"></span>
            </span>
            <select class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-4 control-label">วันที่เดินทาง</label>
        <div class="datepicker" style="display: inline-block;"></div>
    </div>

    <hr>
    <p style=" text-align: center;">
        <button type="submit" class="btn btn-success btn-lg">เลือกที่นั่ง</button>
    </p>
</form>
<pre id="test"></pre>
<script>

    $(function() {

        $(".datepicker").datepicker({
            dateFormat: 'dd-mm-yy',
            buttonImageOnly: false,
            changeMonth: true,
            changeYear: true
        });
        
        $("#pv_s").load("ticketbooking/province_source",function(){
            
            $("#st_s").load("ticketbooking/station_source/"+$("#pv_s").val());
            $("#test").load("ticketbooking/station_source/"+$("#pv_s").val());
        });
        
        
        
    });
</script>