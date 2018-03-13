<?php   require_once('../function/date.php');
        require_once('../function/function.php'); ?>

    <base href="../lib/kendo/event.html">
   
    <link rel="stylesheet" href="https://techitvn.com/tkb/css/kendo.common-material.min.css" />
    <link rel="stylesheet" href="https://techitvn.com/tkb/css/kendo.material.min.css" />
    <link rel="stylesheet" href="https://techitvn.com/tkb/css/kendo.material.mobile.min.css" />

    <!--<script src="http://kendo.cdn.telerik.com/2018.1.221/js/jquery.min.js"></script>-->
    <!--<script src="http://kendo.cdn.telerik.com/2018.1.221/js/kendo.all.min.js"></script>-->
    <script src="https://techitvn.com/tkb/js/jquery.min.js"></script>
    <script src="https://techitvn.com/tkb/js/kendo.all.min.js"></script>
    <link rel="stylesheet" href="<?php echo $con->get_domain()."/css/examples-offline.css"; ?>">
    <script src="../content/shared/js/console.js"></script>
    <style>
            #calendar { width: 30%;
                        height: 326px;
                        border-radius: 15px;
                        position: absolute;
                        left: 3%;
                        top: 30%;    
                        font-size: 85%;}
            .party {
                    color: green;
                }
            .cocktail {
                    color: green;
                }
            .k-content .k.month {width: 25%;}
            .k-calendar td.k-state-selected {
                    background-color: orange;
                    -webkit-box-shadow: none;
                    box-shadow: none;
                    border-radius: 9px;}
            .k-calendar .k-today {
                    background-color: green;
                    border-radius: 9px;}
    </style>
        
        <div id="info">
            <?php if(isset($_COOKIE['name']) && isset($_COOKIE['msv']) && isset($_COOKIE['class']))
                    echo "<p>";
                    echo "<strong>".$_COOKIE['name']."</strong><br>";
                    echo "<strong>".$_COOKIE['msv']."</strong><br>";
                    echo "<strong>".$_COOKIE['class']. "</strong><br><br>";
                    echo "</p>"; 
                    echo "<a id='logout' href='".$con->get_domain()."/hand/logout.php'> Đăng xuất</a>"
                    
                    ?>
        </div>

         <div id="titl"><h2>Lịch học</h2><p id="date"></p><br></div>

        <div id="calendar"></div>
        <p id="p"></p>
        <p id="j"></p>

        <div id="schedule"> 
            <font style="color:#ffffff"><p id="schedule_"></p></font>
        </div>

       

        <div id="widget-right">
            <iframe src="https://www.silvergames.com/en/smarty-bubbles/iframe" id="game" style="margin:0;padding:0;border:0"></iframe>
        </div>
        
        <div id="other-game">
        <table cellspacing="1%">
            <tr>
                <th><p class="game-other-list" onclick="blog()">(Blog me)</p></th>
                <th><p class="game-other-list" onclick="load()">Bắn Bóng</p></th>
                <th><p class="game-other-list" onclick="load_()">Stick Man</p></th>
                <th><p class="game-other-list" onclick="load__()">Flappy Bird 2</p></th>
                <th><p class="game-other-list" onclick="load___()">Stick Hero</p></th>
                <th><p class="game-other-list" onclick="load____()">Connect</p></th>             
            </tr>
        </table>
        </div>
        
    
<script>
    function load(){
        var id = document.getElementById("game");
        id.src = "https://www.silvergames.com/en/smarty-bubbles/iframe";
    }

    function load_(){
        var id = document.getElementById("game");
        id.src = "http://www.silvergames.com/en/stickman-archer-2/iframe";
    }

    function load__(){
        var id = document.getElementById("game");
        id.src = "https://www.silvergames.com/en/flappy-bird-2/iframe";
    }

    function load___(){
        var id = document.getElementById("game");
        id.src = "https://www.silvergames.com/en/stick-hero/iframe";
    }

     function load____(){
        var id = document.getElementById("game");
        id.src = "https://www.silvergames.com/en/flow-free/iframe";
    }

    function blog(){
        window.open("http://techitvn.com","_blank");
    }
</script>

<script>
    function date_now(){
        var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
    
            var yyyy = today.getFullYear();
            if(dd<10){
                dd='0'+dd;
                } 
            if(mm<10){
                mm='0'+mm;
                } 
            var today = dd+'/'+mm+'/'+yyyy;
    
            return today;
            //document.getElementById("j").innerHTML = today;
    }

    function get_tkb(result,date){
        var obj = JSON.parse(result);
        var temp = "";
        var cout = 0;
    
        if(date == date_now()){
            document.getElementById("date").innerHTML = "(Hôm nay)";
        }
    
        else{
            document.getElementById("date").innerHTML = "(" + date + ")";
        }
    
        for(i = 0; i<obj.data.current.table.length; i++){
            var get_date = obj.data.current.table[i].subjectDate;
    
            if(date == get_date){
                cout += 1;      
                 }
    
            if(cout > 0){
                if(date == get_date){
                    var get_name = obj.data.current.table[i].subjectId;
                    var get_time = obj.data.current.table[i].subjectTime;
                    var get_room = obj.data.current.table[i].subjectPlace;
    
                    var pos = get_name.indexOf("-");
                    var get_name_ok = get_name.substring(0, pos);
    
                    var get_name_br = "<strong>(" + cout + ") " + get_name_ok + "</strong><br>";
                    var get_time_br = "<font size='2.5px'>" + get_time + ". ";
                    var get_room_br = " " + get_room + "</font size='2.5px'><br><br>";
    
                    temp += get_name_br + get_time_br + get_room_br ;
    
                    document.getElementById("schedule_").innerHTML = temp;
                    }
                }
    
            if(cout == 0)
                document.getElementById("schedule_").innerHTML = "(Nghỉ)";
        } 
    }
    
    function readFile(file, date){
       $.ajax({url: file, success: function(result){
            get_tkb(result,date);
        }});
    }
</script>


<script>
    $("#calendar").kendoCalendar({
        change: function() {
            var value = this.value();
           
            function convert(str) {
                var date = new Date(str),
                mnth = ("0" + (date.getMonth()+1)).slice(-2),
                day  = ("0" + date.getDate()).slice(-2);
                var ouput = [ day, mnth, date.getFullYear() ].join("/");
                var url = "<?php echo $url_file ?>";
                readFile(url,ouput);
            }
            convert(value);
        }
    });
</script>

