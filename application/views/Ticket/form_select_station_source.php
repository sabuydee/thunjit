<div style="padding: 30px;">
    
    <h4 style="text-align: center;">เลือกต้นทาง</h4>
    <?=br(1)?>
    
    <label>จังหวัด</label>
    <select id="province" style="width: auto;"><?= $province_option_tag ?></select>
    <?=br(2)?>
    
    <span id="ctn_station"></span>

</div>
<script>
    
    $(function(){

        getStation($("#province").val());
        $("#province").change(function(){
            
            getStation($(this).val());
        });
    });
    
    function getStation(province_id){

        getView("Ticket/get_station_source/"+province_id,"#ctn_station");
    }
</script>