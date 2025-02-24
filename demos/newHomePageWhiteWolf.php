<?php 
//demos/newHomePageWhiteWolf.php 
require '../vendor/autoload.php';

?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New White Wolf Test</title>
    <link rel="stylesheet" href="screen2.css">
    <link rel="stylesheet" href="newHomePage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include '../includes/return_button.php'?>

  </head>
  <body>
    <main>           
    </main>
        <div class="searchGrid"> <!--the top part of the page with the searches-->
            <div class="searchByPL"><h9>Search By Print Date And Location</h9></div>
            <div><h9>Search By Work Order</h9></div>
            <div class="leftRightGridPL">
                <div class="selectForPL">
                    <select>
                        <option value="bensenville">BENSENVILLE</option>
                        <option value="foster">FOSTER</option>
                        <option value="valparaiso">VALPARAISO</option>
                    </select>
                </div>
            </div>
            <div class="leftRightGridPD">
                <div>
                    <input type="date" id="date" style="width:100%; height:60%;font-size:1vw;">
                </div>
                <div>
                    <button  style="height:65%;color:red;" onclick="runSearch()">Search (PRESS THIS FOR DEMO!!!!)</button>
                </div>
            </div>
            <div class="leftRightGrid">
                <div>
                    <input type="text" style="height:60%;font-size:1vw;width:100%;">
                </div>
                <div>
                    <button style="height:70%;" onclick="runSearch()">Search</button>
                </div>

            </div>
            
        </div>
        <div class="optionGrid"> <!-- grid for the "show all machines", "open All OPS" and Set All button -->
            <div>
                <button onclick="showAllMachines(1,'showAllMachineButton')" id="showAllMachineButton" class="showAllButton" disabled="true">Show all Machines</button>
            </div>
            <div>
                <button class="openAllButton" id="openAllButton" onclick="openAll()" disabled="true">Open All OPS</button>
            </div>
            <div>
                <div class="setAllGrid"><!--set all button-->
                <div>Set All Selected Icons</div>
                <div class="selectAllDiv">
                    <select id = "selectAll">
                        <option value="select">Select:</option>
                        
                    </select>
                </div>
                <div>
                    <button onclick="setAllSelects('selectAll')" style="width:50%;height:70%;"><b>Set</b></button>
                </div>
                
            </div>
        </div>
        </div>
        <div class="MWOsearchGrid" id="MWOsearchGrid1"> <!--section for the mwo item-->

        </div>
        <div class="mainWWGrid" id="mainWWGrid1"><!--section for the pwo items-->

        </div>
        
        <button class="saveButtonForWW" onclick="saveAllChanged()">SAVE</button> <!--save button-->
        <!--This commented out bit is useful to understand the structure of the website-->
       <!--<div class="MWOsearchGrid1"> 
            <div class="greenMWOworkCenterLabel">
                MWO 4014405
            </div>
            <div class="MWOtext">
                W20BC10/.0100-L.750-RBS
                <br>
                C10030J-AX
            </div>
            <div>
                <select id="mwoSelect1">
                    <option value="select">Select:</option>
                    <option value="BL1_B">BL1_B</option>
                    <option value="BL1_B">BL1_B</option>
                    <option value="BL1_B">BL1_B</option>
                    <option value="BL1_B">BL1_B</option>
                </select>
                <br>
                <button class="MWObuttonSetAll">Set For All OP in MWO 4014405</button>
            </div>

        </div>-->
        <!--<div class="mainWWGrid" id="mainWWGrid1">
            <div class="PWOClassificationItem">
                <div class="titleForOperations">Done</div>
                <div class="titleForOperations">On Hold</div>
                <div class="titleForOperations">PWO</div>
                <div class="titleForOperations">Lake Part</div>
                <div class="titleForOperations">Order Qty</div>
                <div class="titleForOperations">No. of OP</div>
                <div>
                    <input type="checkbox" class="PWOclassificationInput">
                </div>
                <div>
                    <input type="checkbox" class="PWOclassificationInput">
                </div>
                <div>1111598</div>
                <div>C228T19/1007-NJ</div>
                <div>44000</div>
                <div>2</div>
            </div>
            <div class="containerOfOperations">
                <div class="operationBoxes" id="operationBox1">
                    <div class="workCenterLabel" id="workCenterLabel1">Work Center</div>
                    <div class="WWselectionItem" id="WWselectionItem1">
                    
                            <select id="select1">
                                <option value="select">Select:</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                            </select>
            
                        <div class="expandOperation" id="expand1">
                            <button onclick="openMenu('WWselectionItem1','Open',  'expand1','operationBox1','workCenterLabel1','operationNum1','button1','1','arrow1','1111598','10')" id="button1"><i class="fa fa-angle-left" id="arrow1"></i></button>
                        </div>
                        <div class="selectBoxForOperation" id="selectBoxForOperation1">
                            select:
                            <input type="checkbox" id="inputBoxForAll1">
                        </div>

                    </div>
                    <div id="operationNum1">10 INS</div>
                </div>
                <div class="operationBoxes" id="operationBox2">
                    <div class="workCenterLabel" id="workCenterLabel2">Work Center</div>
                    <div class="WWselectionItem" id="WWselectionItem2">
                            <select id="select2">
                                <option value="select">Select:</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                            </select>
                        <div class="expandOperation" id="expand2">
                            <button onclick="openMenu('WWselectionItem2','Open',  'expand2','operationBox2','workCenterLabel2','operationNum2','button2','2','arrow2','1111598','20')" id="button2"><i class="fa fa-angle-left" id="arrow2"></i></button>
                        </div>
                        <div class="selectBoxForOperation" id="selectBoxForOperation2">
                            select:
                            <input type="checkbox" id="inputBoxForAll2">
                        </div>
                    </div>
                    <div id="operationNum2">20 INS</div>
                </div>
                <div class="operationBoxes" id="operationBox3">
                    <div class="workCenterLabel" id="workCenterLabel3">Work Center</div>
                    <div class="WWselectionItem" id="WWselectionItem3">
                            <select id="select3">
                                <option value="select">Select:</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                            </select>
                        <div class="expandOperation" id="expand3">
                            <button onclick="openMenu('WWselectionItem3','Open',  'expand3','operationBox3','workCenterLabel3','operationNum3','button3','3','arrow3','1111598','30')" id="button3"><i class="fa fa-angle-left" id="arrow3"></i></button>
                        </div>
                        <div class="selectBoxForOperation" id="selectBoxForOperation3">
                            select:
                            <input type="checkbox" id="inputBoxForAll3">
                        </div>
                    </div>
                    <div id="operationNum3">30 INS</div>
                </div>
                <div class="operationBoxes" id="operationBox4">
                    <div class="workCenterLabel" id="workCenterLabel4">Work Center</div>
                    <div class="WWselectionItem" id="WWselectionItem4">
                            <select id="select4">
                                <option value="select">Select:</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                            </select>
                        <div class="expandOperation" id="expand4">
                            <button onclick="openMenu('WWselectionItem4','Open',  'expand4','operationBox4','workCenterLabel4','operationNum4','button4','4','arrow4','1111598','40')" id="button4"><i class="fa fa-angle-left" id="arrow4"></i></button>
                        </div>
                        <div class="selectBoxForOperation" id="selectBoxForOperation4">
                            select:
                            <input type="checkbox" id="inputBoxForAll4">
                        </div>
                    </div>
                    <div id="operationNum4">40 INS</div>
                </div>
                <div class="operationBoxes" id="operationBox5">
                    <div class="greenMWOworkCenterLabel" id="workCenterLabel5">MWO 4014405</div>
                    <div class="WWselectionItem" id="WWselectionItem5">
                            <select id="select5">
                                <option value="select">Select:</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                            </select>
                        <div class="expandOperation" id="expand5">
                            <button onclick="openMenu('WWselectionItem5','Open',  'expand5','operationBox5','workCenterLabel5','operationNum5','button5','5','arrow5','1111598','50')" id="button5"><i class="fa fa-angle-left" id="arrow5"></i></button>
                        </div>
                        <div class="selectBoxForOperation" id="selectBoxForOperation5">
                            select:
                            <input type="checkbox" id="inputBoxForAll5">
                        </div>
                    </div>
                    <div id="operationNum5">50 INS</div>
                </div>
                <div class="operationBoxes" id="operationBox6">
                    <div class="workCenterLabel" id="workCenterLabel6">Work Center</div>
                    <div class="WWselectionItem" id="WWselectionItem6" >
                            <select id="select6">
                                <option value="select">Select:</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                            </select>
                        <div class="expandOperation" id="expand6">
                            <button onclick="openMenu('WWselectionItem6','Open',  'expand6','operationBox6','workCenterLabel6','operationNum6','button6','6','arrow6','1111598','60')" id="button6"><i class="fa fa-angle-left" id="arrow6"></i></button>
                        </div>
                        <div class="selectBoxForOperation" id="selectBoxForOperation6">
                            select:
                            <input type="checkbox"id="inputBoxForAll6">
                        </div>
                    </div>
                    <div id="operationNum6">60 INS</div>
                </div>
                <div class="operationBoxes" id="operationBox7">
                    <div class="workCenterLabel" id="workCenterLabel7">Work Center</div>
                    <div class="WWselectionItem" id="WWselectionItem7">
                            <select id="select7">
                                <option value="select">Select:</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                                <option value="BL1_B">BL1_B</option>
                            </select>
                        <div class="expandOperation" id="expand7">
                            <button onclick="openMenu('WWselectionItem7','Open',  'expand7','operationBox7','workCenterLabel7','operationNum7','button7','7','arrow7','1111598','70')" id="button7"><i class="fa fa-angle-left" id="arrow7"></i></button>
                        </div>
                        <div class="selectBoxForOperation" id="selectBoxForOperation7">
                            select:
                            <input type="checkbox" id="inputBoxForAll7">
                        </div>
                    </div>
                    <div id="operationNum7">70 INS</div>
                </div>
            </div>
        </div>-->
    </main>
	<script type="text/javascript">
        allMachine = ["BL1_B","BL2_B","BL3_B","BL4_B","BL7_B","BL8_B","BL9_B","BL12_B","D1_B","D2_B","D3_B","D4_B","BL6_B","Braid","NH2_B","NH3_B","PT1_B","PT2_B","BL10_B","BL11_B","HOLD_B","Cook24A","Imach1_B","Taping_B","Cook36A_B","Cook36B_B","Cook36C_B","Braid_36_B","Braid_42_B","Testing_line","PRECESSIONTWNR"];
    const data = [{"MWOsearch":"1","MWOnum":"4014405","MWOconductor":"W14BC41/.0100-L1.500-RBS","MWOcompound":"C10030J-AX","MWOpossible_lines":["BL1_B","BL2_B","BL5_B","Braid"],"MWOselected_line":"select"},{"PWO":"1111598","lakePart":"C228T19/1007-NJ","order_qty":"44000","noOfOp":"11","OPnum1":"10","operation1":"INS","done_10":"0","onHold_10":"1","possible_lines1":["BL1_B","BL2_B","BL3_B","BL4_B"],"selected_line_10":"Braid","OPnum2":"30","operation2":"INS","done_30":"1","onHold_30":"0","possible_lines2":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_30":"0","OPnum3":"40","operation3":"INS","done_40":"1","onHold_40":"0","possible_lines3":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_40":"BL2_B","MWOnum3":"4014405","OPnum4":"50","operation4":"INS","done_50":"1","onHold_50":"0","possible_lines4":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_50":"0","OPnum5":"60","operation5":"INS","done_60":"1","onHold_60":"0","possible_lines5":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_60":"BL2_B","OPnum6":"70","operation6":"INS","done_70":"1","onHold_70":"0","possible_lines6":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_70":"0","OPnum7":"80","operation7":"INS","done_80":"1","onHold_80":"0","possible_lines7":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_80":"0","OPnum8":"90","operation8":"INS","done_90":"1","onHold_90":"0","possible_lines8":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_90":"0","OPnum9":"110","operation9":"INS","done_110":"1","onHold_110":"0","possible_lines9":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_110":"0","OPnum10":"120","operation10":"INS","done_120":"1","onHold_120":"0","possible_lines10":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_120":"0","OPnum11":"130","operation11":"INS","done_130":"1","onHold_130":"0","MWOnum11":"323001","possible_lines11":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_130":"0"},
                {"PWO":"1139899-2","lakePart":"14B41-16-C10081-TA-09","order_qty":"9000","noOfOp":"3","OPnum1":"10","operation1":"INS","done_10":"0","onHold_10":"0","possible_lines1":["BL1_B","BL3_B","BL8_B","BL9_B","BL12_B"],"selected_line_10":"0","OPnum2":"40","operation2":"JAC","done_40":"0","onHold_40":"0","possible_lines2":["BL1_B","BL3_B","BL8_B","BL9_B","BL12_B"],"selected_line_40":"0","OPnum3":"60","operation3":"INS","done_60":"1","onHold_60":"1","possible_lines3":["BL1_B","BL2_B","BL3_B","BL4_B"],"selected_line_60":"Braid","MWOnum3":"4014405"},{"PWO":"1111598","lakePart":"C228T19/1007-NJ","order_qty":"44000","noOfOp":"11","OPnum1":"10","operation1":"INS","done_10":"1","onHold_10":"1","possible_lines1":["BL1_B","BL2_B","BL3_B","BL4_B"],"selected_line_10":"Braid","OPnum2":"30","operation2":"INS","done_30":"1","onHold_30":"0","possible_lines2":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_30":"0","OPnum3":"40","operation3":"INS","done_40":"1","onHold_40":"0","possible_lines3":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_40":"BL2_B","MWOnum3":"4014405","OPnum4":"50","operation4":"INS","done_50":"1","onHold_50":"0","possible_lines4":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_50":"0","OPnum5":"60","operation5":"INS","done_60":"1","onHold_60":"0","possible_lines5":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_60":"BL2_B","OPnum6":"70","operation6":"INS","done_70":"1","onHold_70":"0","possible_lines6":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_70":"0","OPnum7":"80","operation7":"INS","done_80":"1","onHold_80":"0","possible_lines7":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_80":"0","OPnum8":"90","operation8":"INS","done_90":"1","onHold_90":"0","possible_lines8":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_90":"0","OPnum9":"110","operation9":"INS","done_110":"1","onHold_110":"0","possible_lines9":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_110":"0","OPnum10":"120","operation10":"INS","done_120":"1","onHold_120":"0","possible_lines10":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_120":"0","OPnum11":"130","operation11":"INS","done_130":"1","onHold_130":"0","MWOnum11":"323001","possible_lines11":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_130":"0"},{"PWO":"1111598","lakePart":"C228T19/1007-NJ","order_qty":"44000","noOfOp":"11","OPnum1":"10","operation1":"INS","done_10":"1","onHold_10":"1","possible_lines1":["BL1_B","BL2_B","BL3_B","BL4_B"],"selected_line_10":"Braid","OPnum2":"30","operation2":"INS","done_30":"1","onHold_30":"0","possible_lines2":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_30":"0","OPnum3":"40","operation3":"INS","done_40":"1","onHold_40":"0","possible_lines3":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_40":"BL2_B","MWOnum3":"4014405","OPnum4":"50","operation4":"INS","done_50":"1","onHold_50":"0","possible_lines4":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_50":"0","OPnum5":"60","operation5":"INS","done_60":"1","onHold_60":"0","possible_lines5":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_60":"BL2_B","OPnum6":"70","operation6":"INS","done_70":"1","onHold_70":"0","possible_lines6":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_70":"0","OPnum7":"80","operation7":"INS","done_80":"1","onHold_80":"0","possible_lines7":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_80":"0","OPnum8":"90","operation8":"INS","done_90":"1","onHold_90":"0","possible_lines8":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_90":"0","OPnum9":"110","operation9":"INS","done_110":"1","onHold_110":"0","possible_lines9":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_110":"0","OPnum10":"120","operation10":"INS","done_120":"1","onHold_120":"0","possible_lines10":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_120":"0","OPnum11":"130","operation11":"INS","done_130":"1","onHold_130":"0","MWOnum11":"323001","possible_lines11":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_130":"0"},{"PWO":"1111598","lakePart":"C228T19/1007-NJ","order_qty":"44000","noOfOp":"11","OPnum1":"10","operation1":"INS","done_10":"1","onHold_10":"1","possible_lines1":["BL1_B","BL2_B","BL3_B","BL4_B"],"selected_line_10":"Braid","OPnum2":"30","operation2":"INS","done_30":"1","onHold_30":"0","possible_lines2":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_30":"0","OPnum3":"40","operation3":"INS","done_40":"1","onHold_40":"0","possible_lines3":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_40":"BL2_B","MWOnum3":"4014405","OPnum4":"50","operation4":"INS","done_50":"1","onHold_50":"0","possible_lines4":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_50":"0","OPnum5":"60","operation5":"INS","done_60":"1","onHold_60":"0","possible_lines5":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_60":"BL2_B","OPnum6":"70","operation6":"INS","done_70":"1","onHold_70":"0","possible_lines6":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_70":"0","OPnum7":"80","operation7":"INS","done_80":"1","onHold_80":"0","possible_lines7":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_80":"0","OPnum8":"90","operation8":"INS","done_90":"1","onHold_90":"0","possible_lines8":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_90":"0","OPnum9":"110","operation9":"INS","done_110":"1","onHold_110":"0","possible_lines9":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_110":"0","OPnum10":"120","operation10":"INS","done_120":"1","onHold_120":"0","possible_lines10":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_120":"0","OPnum11":"130","operation11":"INS","done_130":"1","onHold_130":"0","MWOnum11":"323001","possible_lines11":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_130":"0"},{"PWO":"1111598","lakePart":"C228T19/1007-NJ","order_qty":"44000","noOfOp":"11","OPnum1":"10","operation1":"INS","done_10":"1","onHold_10":"1","possible_lines1":["BL1_B","BL2_B","BL3_B","BL4_B"],"selected_line_10":"Braid","OPnum2":"30","operation2":"INS","done_30":"1","onHold_30":"0","possible_lines2":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_30":"0","OPnum3":"40","operation3":"INS","done_40":"1","onHold_40":"0","possible_lines3":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_40":"BL2_B","MWOnum3":"4014405","OPnum4":"50","operation4":"INS","done_50":"1","onHold_50":"0","possible_lines4":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_50":"0","OPnum5":"60","operation5":"INS","done_60":"1","onHold_60":"0","possible_lines5":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_60":"BL2_B","OPnum6":"70","operation6":"INS","done_70":"1","onHold_70":"0","possible_lines6":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_70":"0","OPnum7":"80","operation7":"INS","done_80":"1","onHold_80":"0","possible_lines7":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_80":"0","OPnum8":"90","operation8":"INS","done_90":"1","onHold_90":"0","possible_lines8":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_90":"0","OPnum9":"110","operation9":"INS","done_110":"1","onHold_110":"0","possible_lines9":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_110":"0","OPnum10":"120","operation10":"INS","done_120":"1","onHold_120":"0","possible_lines10":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_120":"0","OPnum11":"130","operation11":"INS","done_130":"1","onHold_130":"0","MWOnum11":"323001","possible_lines11":["BL1_B","BL2_B","BL3_B","BL5_B"],"selected_line_130":"0"}]
    let string_data = JSON.stringify(data);
    let newerData = JSON.parse(string_data);
    let slicedData = newerData.slice(1);
    string_data2 = JSON.stringify(data);
    newerData2 = JSON.parse(string_data);
    slicedDataPart2 = newerData2.slice(1)
    idTable = [];
    searchRun = 0;
    reBuildTable()
    addDonesAndOnHolds()
    function reBuildTable(){ //rebuilds the table into a format thats can be read by the code
        for (i=0;i<slicedData.length;i++){ 
            let parseAmount = parseInt(slicedData[i]["noOfOp"])
            let doneCount = 0
            let savedDoneData = []

            let onHoldCount = 0
            let savedOnHoldData = []

            let SLCount = 0
            let savedSLData = []

            for(key in slicedData[i]){
                if(key.search("done_")==0){
                    savedDoneData.push(slicedData[i][key])
                    delete slicedData[i][key]
                    doneCount++
                }
                if(key.search("onHold_")==0){
                    savedOnHoldData.push(slicedData[i][key])
                    delete slicedData[i][key]
                    onHoldCount++
                }
                if(key.search("selected_line_")==0){
                    savedSLData.push(slicedData[i][key])
                    delete slicedData[i][key]
                    SLCount++
                }
            }
            let varDoneCount = 10
            let varHoldCount = 10
            let varSLCount = 10
            for(j=0; j<doneCount; j++){
               slicedData[i]["done_"+varDoneCount] = savedDoneData[j]
                varDoneCount+=10
            }
            for(j=0; j<onHoldCount; j++){
                slicedData[i]["onHold_"+varHoldCount] = savedOnHoldData[j]
                varHoldCount+=10
            }
            for(j=0; j<SLCount; j++){
               slicedData[i]["selected_line_"+varSLCount] = savedSLData[j]
                varSLCount+=10
            }
        }
    }
    function addDonesAndOnHolds(){ //adds done and onHold variables to the data
        for(i=0;i<slicedData.length;i++){
            setDZero = false
            setOHZero = false
            parseAmount = parseInt(slicedData[i]["noOfOp"])
            for(j = 1; j <= parseAmount; j++){
                if(slicedData[i]["done_"+j+"0"] == "0"){
                    setDZero = true
                }
                if(slicedData[i]["onHold_"+j+"0"] == "0"){
                    setOHZero = true
                }
            }
            if(setDZero==true){
                slicedData[i]["done"] = "0"
            }
            else{
                slicedData[i]["done"] = "1"
            }
            if(setOHZero==true){
                slicedData[i]["onHold"] = "0"
            }
            else{
                slicedData[i]["onHold"] = "1"
            }
    }
}
    function openAll(){//opens all operations up
        for(i=0;i<slicedData.length;i++){
            parseAmount = parseInt(slicedData[i]["noOfOp"])
            for(j = 1; j <= parseAmount; j++){
                button = document.getElementById("button"+JSON.stringify(j)+'in'+JSON.stringify(i))
                buttonOpenCheck = document.getElementById('onHoldDiv'+JSON.stringify(j)+'in'+JSON.stringify(i))
                if(buttonOpenCheck == null && button != null){
                    button.click()
                }
            }
        }
        openAllButton = document.getElementById("openAllButton")
        openAllButton.setAttribute('onclick','closeAll()')
        openAllButton.innerHTML = ""
        openAllButton.appendChild(document.createTextNode("Close All OPS"))
    }

    function closeAll(){ //closes all operations
        for(i=0;i<slicedData.length;i++){
            parseAmount = parseInt(slicedData[i]["noOfOp"])
            for(j = 1; j <= parseAmount; j++){
                button = document.getElementById("button"+JSON.stringify(j)+'in'+JSON.stringify(i))
                buttonOpenCheck = document.getElementById('onHoldDiv'+JSON.stringify(j)+'in'+JSON.stringify(i))
                if(buttonOpenCheck != null){
                    button.click()
                }
            }
        }
        openAllButton = document.getElementById("openAllButton")
        openAllButton.setAttribute('onclick','openAll()')
        openAllButton.innerHTML = ""
        openAllButton.appendChild(document.createTextNode("Open All OPS"))
    }

        function runSearch(){
            showAllMachine = document.getElementById("showAllMachineButton")
            showAllMachine.disabled = false;
            if(searchRun > 0){
                return //this is just so that they cant spam the search button and duplicate the searches multiple times, might be unnecesary once backend is complete
            }
            if (data[0]["MWOsearch"] == 0){ //if the search is not an mwo search...
                buildSite(slicedData, "mainWWGrid1")
            }
            if (data[0]["MWOsearch"] == 1){ //if the search is an mwo search...
                buildMWO(data, "MWOsearchGrid1")
            }
            searchRun += 1
        }
        function saveAllChanged(){ //saves all variables that need to be sent to the backend
            maskingDiv = document.createElement("div") //before result
            maskingDiv.setAttribute('id','mask')
            document.body.appendChild(maskingDiv)
            maskingDiv.appendChild(document.createTextNode("saving"))
            runThree()
            setTimeout("maskingDiv.remove()",5000)
            setTimeout("location.reload()",5000)
            dataFirst = []
            for (i=0;i<slicedData.length;i++){
                openCheck = document.getElementsByClassName("PWOclassificationInput")
                if(openCheck.length == 0){
                    break
                }
                dictVar = {}
                dictVar["PWO"] = slicedData[i]["PWO"]
                parseAmount = parseInt(slicedData[i]["noOfOp"])
                for(j = 1; j <= parseAmount; j++){
                    selected = document.getElementById('select'+JSON.stringify(j)+'in'+JSON.stringify(i))
                    selectVal = selected.value
                    if (selectVal == "select"){
                        selectVal = "0"
                    }
                    slicedData[i]["selected_line_"+j+"0"] = selectVal
                } 
                varDone = 10
                varOnHold = 10
                varSL = 10
                for(key in slicedDataPart2[i]){
                    if(key.search("done_") == 0){
                        dictVar[key] = slicedData[i]["done_"+varDone]
                        varDone+=10
                    }
                    if(key.search("onHold_") == 0){
                        dictVar[key] = slicedData[i]["onHold_"+varOnHold]
                        varOnHold+=10
                    }
                    if(key.search("selected_line_") == 0){
                        dictVar[key] = slicedData[i]["selected_line_"+varSL]
                        varSL+=10
                    }
                }
                dataFirst.push(dictVar)
            }
            dataSecond = JSON.parse(JSON.stringify(dataFirst))
            for (i=0;i<slicedData.length;i++){
                dataChange = false
                pwo = ""
                for (key in dataFirst[i]){
                    if(slicedDataPart2[i][key] == dataFirst[i][key] && key != "PWO"){
                        delete dataSecond[i][key]
                    }
                    else if(key != "PWO"){
                        dataChange = true
                    }
                }
                if(dataChange == false){
                    delete dataSecond[i]
                }
            }
            dataThird = JSON.parse(JSON.stringify(dataSecond))
            len = dataThird.length, i;
            for(i = 0; i < len; i++ ){
                dataThird[i] && dataThird.push(dataThird[i])
            }; 
            dataThird.splice(0 , len);
            if(dataThird.length == 0){
                console.log("nothing to save")
            }
            else{
                console.log(dataThird)
                console.log("save button pressed")
            }
            
        }
        function runThree(){ //function for ...
            setTimeout("addLoad(1)",200)
            setTimeout("addLoad(2)",400)
            setTimeout("addLoad(3)",600)
        }
        function addLoad(numDots){ //function for ...
            maskingDiv = document.getElementById('mask')
            if(document.getElementById('mask') == null){
                return
            }
            if (numDots == 1){maskingDiv.innerHTML = "saving."}
            if (numDots == 2){maskingDiv.innerHTML = "saving.."}
            if (numDots == 3){
                maskingDiv.innerHTML = "saving..." 
                if(document.getElementById('mask') != null){
                    runThree()
                }
            }
        }
        function buildSite(newData,sectionId,MWOnum,MWOmachine,setAll){ //builds the site using grids and traversing through the data array
            mainSection = document.getElementById(sectionId)
            for(i=0;i<slicedData.length;i++){
                pwoClassItem = document.createElement("div")
                pwoClassItem.setAttribute('class','PWOClassificationItem')
                doneTitle= document.createElement("div")
                onHoldTitle=document.createElement("div")
                PWOTitle=document.createElement("div")
                lakePartTitle=document.createElement("div")
                orderQtyTitle=document.createElement("div")
                noOfOpTitle=document.createElement("div")

                doneTitle.setAttribute('class','titleForOperations')
                onHoldTitle.setAttribute('class','titleForOperations')
                PWOTitle.setAttribute('class','titleForOperations')
                lakePartTitle.setAttribute('class','titleForOperations')
                orderQtyTitle.setAttribute('class','titleForOperations')
                noOfOpTitle.setAttribute('class','titleForOperations')


                doneText= document.createTextNode("Done")
                onHoldText=document.createTextNode("OnHold")
                PWOText=document.createTextNode("PWO")
                lakePartText=document.createTextNode("Lake Part")
                orderQtyText=document.createTextNode("Order Qty")
                noOfOpText=document.createTextNode("# of OP")

                doneTitle.appendChild(doneText)
                onHoldTitle.appendChild(onHoldText)
                PWOTitle.appendChild(PWOText)
                lakePartTitle.appendChild(lakePartText)
                orderQtyTitle.appendChild(orderQtyText)
                noOfOpTitle.appendChild(noOfOpText)

                pwoClassItem.appendChild(doneTitle)
                pwoClassItem.appendChild(onHoldTitle)
                pwoClassItem.appendChild(PWOTitle)
                pwoClassItem.appendChild(lakePartTitle)
                pwoClassItem.appendChild(orderQtyTitle)
                pwoClassItem.appendChild(noOfOpTitle)

                doneCheckBoxDiv = document.createElement("div")
                onHoldCheckBoxDiv = document.createElement("div")

                doneCheckBoxDivInput = document.createElement("input")
                doneCheckBoxDivInput.type = "checkbox"
                doneCheckBoxDivInput.setAttribute('id','PWOclassificationInputD'+i)

                
                if(slicedData[i]["done"] == "0"){
                    doneCheckBoxDivInput.checked = false
                }
                else if(slicedData[i]["done"] == "1"){
                    doneCheckBoxDivInput.checked = true
                }
                onHoldCheckBoxDivInput = document.createElement("input")
                onHoldCheckBoxDivInput.type = "checkbox"
                onHoldCheckBoxDivInput.setAttribute('id','PWOclassificationInputOH'+i)

                
                if(slicedData[i]["onHold"] == "0"){
                    onHoldCheckBoxDivInput.checked = false
                }
                else if(slicedData[i]["onHold"] == "1"){
                    onHoldCheckBoxDivInput.checked = true
                }
                onHoldCheckBoxDivInput.setAttribute('class','PWOclassificationInput')
                onHoldCheckBoxDivInput.setAttribute('onchange','changeAllButtons(PWOclassificationInputOH'+i+',"onHold",'+i+')')

                doneCheckBoxDivInput.setAttribute('class','PWOclassificationInput')
                doneCheckBoxDivInput.setAttribute('onchange','changeAllButtons(PWOclassificationInputD'+i+',"done",'+i+')')

               
                doneCheckBoxDiv.appendChild(doneCheckBoxDivInput)
                onHoldCheckBoxDiv.appendChild(onHoldCheckBoxDivInput)

                pwoClassItem.appendChild(doneCheckBoxDiv)
                pwoClassItem.appendChild(onHoldCheckBoxDiv)

                pwoNum = document.createTextNode(slicedData[i]["PWO"])
                lakePart = document.createTextNode(slicedData[i]["lakePart"])
                orderQty = document.createTextNode(slicedData[i]["order_qty"])
                noOfOp1 = document.createTextNode(slicedData[i]["noOfOp"])

                pwoNumDiv= document.createElement("div")
                lakePartDiv= document.createElement("div")
                orderQtyDiv= document.createElement("div")
                noOfOp1Div= document.createElement("div")

                pwoNumDiv.appendChild(pwoNum)
                lakePartDiv.appendChild(lakePart)
                orderQtyDiv.appendChild(orderQty)
                noOfOp1Div.appendChild(noOfOp1)

                pwoClassItem.appendChild(pwoNumDiv)
                pwoClassItem.appendChild(lakePartDiv)
                pwoClassItem.appendChild(orderQtyDiv)
                pwoClassItem.appendChild(noOfOp1Div)

                mainSection.appendChild(pwoClassItem)

                containerOfOps = document.createElement("div")
                containerOfOps.setAttribute('class','containerOfOperations')
                mainSection.appendChild(containerOfOps)
                parseAmount = parseInt(slicedData[i]["noOfOp"])
                for(j = 1; j <= parseAmount; j++){
                    setSelect = false
                    idTable.push(JSON.stringify(j)+'in'+JSON.stringify(i))
                    operationBox = document.createElement("div")
                    operationBox.setAttribute('class','operationBoxes')
                    operationBox.setAttribute('id','operationBox'+JSON.stringify(j)+'in'+JSON.stringify(i))
                    containerOfOps.appendChild(operationBox)

                    workCenterL = document.createElement("div")
                    workCenterL.setAttribute('class','workCenterLabel')
                    workCenterL.setAttribute('id','workCenterLabel'+JSON.stringify(j)+'in'+JSON.stringify(i))
                    setColor = false
                    if(slicedData[i]["MWOnum"+j] == undefined){
                        workCenterL.appendChild(document.createTextNode("Work Center"))
                    }
                    else{
                        if(MWOnum == slicedData[i]["MWOnum"+j] && machine != null){
                            setSelect = true
                            setColor = true
                        }
                        else if(MWOnum == JSON.stringify(slicedData[i]["MWOnum"+j])){
                            setColor = true
                        }
                        workCenterL.appendChild(document.createTextNode("MWO "+slicedData[i]["MWOnum"+j]))
                        workCenterL.setAttribute('class','greenMWOworkCenterLabel')
                    }

                    WWselectionItem = document.createElement("div")
                    WWselectionItem.setAttribute('class','WWselectionItem')
                    WWselectionItem.setAttribute('id','WWselectionItem'+JSON.stringify(j)+'in'+JSON.stringify(i))


                    WWselectionItemSelect = document.createElement("select")
                    WWselectionItemSelect.setAttribute('id','select'+JSON.stringify(j)+'in'+JSON.stringify(i))
                    newMachineOption = document.createElement("option")
                    newMachineOption.value = "select"
                    newMachineOption.appendChild(document.createTextNode("Select: "))
                    WWselectionItemSelect.appendChild(newMachineOption)
                    hasSelectVal = false
                    hasMachineVal = false
                    if(setAll == true){
                        for (h = 0; h < allMachine.length; h++){
                            newMachineOption = document.createElement("option")
                            newMachineOption.value = allMachine[h]
                            newMachineOption.appendChild(document.createTextNode(allMachine[h]))
                            WWselectionItemSelect.appendChild(newMachineOption)
                            if(allMachine[h] ==  slicedData[i]["selected_line_"+j+"0"])
                            {hasSelectVal = true}
                        }
                    }
                    else{
                        for (h=0; h<slicedData[i]["possible_lines"+j].length;h++){

                            newMachineOption = document.createElement("option")
                            newMachineOption.value = slicedData[i]["possible_lines"+j][h]
                            newMachineOption.appendChild(document.createTextNode(slicedData[i]["possible_lines"+j][h]))
                            WWselectionItemSelect.appendChild(newMachineOption)
                            if(slicedData[i]["possible_lines"+j][h] ==  slicedData[i]["selected_line_"+j+"0"])
                            {hasSelectVal = true}
                    }
                    }
                    
                    if(setColor == true){
                        workCenterL.setAttribute('class','greenMWOworkCenterLabelMain2')
                    }
                    if(setSelect==true){
                        WWselectionItemSelect.value = machine
                    }
                    else{

                        selectValue = slicedData[i]["selected_line_"+j+"0"]
                        if (selectValue == "0"){
                            WWselectionItemSelect.value = "select"
                        }
                        else if(hasSelectVal == true){
                            WWselectionItemSelect.value = selectValue
                        }
                        else{
                            newMachineOption = document.createElement("option")
                            newMachineOption.value = slicedData[i]["selected_line_"+j+"0"]
                            newMachineOption.appendChild(document.createTextNode(slicedData[i]["selected_line_"+j+"0"]))
                            WWselectionItemSelect.appendChild(newMachineOption)
                            WWselectionItemSelect.value = selectValue
                        }
                    }
                    WWselectionItem.appendChild(WWselectionItemSelect)

                    expandOperationDiv = document.createElement("div")
                    expandOperationDiv.setAttribute('class','expandOperation')
                    expandOperationDiv.setAttribute('id','expand'+JSON.stringify(j)+'in'+JSON.stringify(i))

                    expandOperationButton = document.createElement("button")
                    expandOperationButton.setAttribute('id','button'+JSON.stringify(j)+'in'+JSON.stringify(i))
                    expandOperationButton.setAttribute('class','expandOperationButton')
                    WWselectionId = "WWselectionItem"+JSON.stringify(j)+'in'+JSON.stringify(i)
                    expandId = "expand"+JSON.stringify(j)+'in'+JSON.stringify(i)
                    operationBoxId="operationBox"+JSON.stringify(j)+'in'+JSON.stringify(i)
                    workCenterLabelId="workCenterLabel"+JSON.stringify(j)+'in'+JSON.stringify(i)
                    operationNumId="operationNum"+JSON.stringify(j)+'in'+JSON.stringify(i)
                    buttonId="button"+JSON.stringify(j)+'in'+JSON.stringify(i)
                    id=JSON.stringify(j)+'in'+JSON.stringify(i)
                    arrowId="arrow"+JSON.stringify(j)+'in'+JSON.stringify(i)
                    operationNum=slicedData[i]["OPnum"+j]
                    expandOperationButton.setAttribute('onclick', 'openMenu('+JSON.stringify(WWselectionId)+',"Open",'+JSON.stringify(expandId)+','+JSON.stringify(operationBoxId)+','+JSON.stringify(workCenterLabelId)+','+JSON.stringify(operationNumId)+','+JSON.stringify(buttonId)+','+JSON.stringify(id)+','+JSON.stringify(arrowId)+','+JSON.stringify(pwoNum.textContent)+','+JSON.stringify(operationNum)+','+JSON.stringify(i)+','+JSON.stringify(j)+')')
                    expandOperationDiv.appendChild(expandOperationButton)

                    expandOperationI = document.createElement("i")
                    expandOperationI.setAttribute('class','fa fa-angle-left')
                    expandOperationI.setAttribute('id','arrow'+JSON.stringify(j)+'in'+JSON.stringify(i))
                    expandOperationButton.appendChild(expandOperationI)

                    WWselectionItem.appendChild(expandOperationDiv)
                    
                    selectBoxForOp = document.createElement("div")
                    selectBoxForOp.setAttribute('class','selectBoxForOperation')
                    selectBoxForOp.setAttribute('id','selectBoxForOperation'+JSON.stringify(j)+'in'+JSON.stringify(i))
                    WWselectionItem.appendChild(selectBoxForOp)
                    selectBoxForOpInput = document.createElement("input")
                    selectBoxForOpInput.type = "checkbox"
                    selectBoxLabel = document.createElement("label")
                    selectBoxLabel.appendChild(document.createTextNode("select"))
                    selectBoxLabel.appendChild(selectBoxForOpInput)
                    selectBoxForOpInput.setAttribute('id','inputBoxForAll'+JSON.stringify(j)+'in'+JSON.stringify(i))
                    selectBoxForOpInput.setAttribute('onclick','changeSelect('+i+','+j+')')
                    selectBoxForOp.appendChild(selectBoxLabel)

                    operationNum = document.createElement("div")
                    operationNum.setAttribute('id','operationNum'+JSON.stringify(j)+'in'+JSON.stringify(i))
                    operationNumText = document.createTextNode(slicedData[i]["OPnum"+j]+" "+slicedData[i]["operation"+j])
                    operationNum.appendChild(operationNumText)
                    operationNum.setAttribute('class','operationNumbers')

                    operationBox.appendChild(workCenterL)
                    operationBox.appendChild(WWselectionItem)
                    operationBox.appendChild(operationNum)

                }
                
            }
            openAllOps = document.getElementById("openAllButton")
            openAllOps.disabled = false;
           //buildHorizontalScroll("containerOfOperations")
        }
        function buildHorizontalScroll(contClass){
            const conts = document.getElementsByClassName(contClass)
            contsArray = Array.from(conts)
            secondContsArray = Array.from(conts)
            for(i=0;i<contsArray.length;i++){
                hasHorizontalScrollbar = contsArray[i].scrollWidth > contsArray[i].clientWidth;
                if(hasHorizontalScrollbar == false){
                    index = secondContsArray.indexOf(contsArray[i])
                    secondContsArray.splice(index,1)
                }
            }
            contsArray = secondContsArray
            contsArray.forEach(element => element.addEventListener('wheel', event => {
                const toLeft  = event.deltaY < 0 //&& element.scrollLeft > 0
                const toRight = event.deltaY > 0 //&& element.scrollLeft < element.scrollWidth - element.clientWidth
                if (toLeft || toRight) {
                    event.preventDefault()
                    element.scrollLeft += event.deltaY
                }
            }, {passive: false}))
        }
        function changeAllButtons(button, DorOH,i){ //changes all buttons to match the main button when its clicked
            if(button.checked == false){
                checkAmount = "0"
            }
            if(button.checked == true){
                checkAmount = "1"
            }
            slicedData[i][DorOH] = checkAmount
            trueOrFalse = true
            if (button.checked == true){
                trueOrFalse = true
            }
            if(button.checked == false){
                trueOrFalse = false
            }
            parseAmount = parseInt(slicedData[i]["noOfOp"])
            for(j = 1; j <= parseAmount; j++){
                slicedData[i][DorOH+"_"+j+"0"] = checkAmount
                id=JSON.stringify(j)+'in'+JSON.stringify(i)
                doneCheckBox = document.getElementById(DorOH+'CheckBoxInput'+id)   
                if(doneCheckBox != null){
                    doneCheckBox.checked = trueOrFalse            
                }
            }
        }
        function updateAndCheckForMain(button,i,j,DorOH){ //updates the button to match the data, checks if the main button is checked and unchecks it if the button is unchecked
            if(button.checked == false){
                checkAmount = "0"
            }
            if(button.checked == true){
                checkAmount = "1"
            }
            slicedData[i][DorOH+"_"+j+"0"] = checkAmount
            if(DorOH == "done"){
                mainCheckBox = document.getElementById('PWOclassificationInputD'+i)
            }
            if(DorOH == "onHold"){
                mainCheckBox = document.getElementById('PWOclassificationInputOH'+i)
            }
            if(mainCheckBox.checked != button.checked && button.checked == false){
                mainCheckBox.checked = false
                slicedData[i][DorOH] = checkAmount
            }
        }
        function changeSelect(i,j){//changes the background color of selected operation to grey when clicked and white when not clicked
            expandOpBut = document.getElementById('button'+JSON.stringify(j)+'in'+JSON.stringify(i)) //select box
            WWselectionItem = document.getElementById("WWselectionItem"+JSON.stringify(j)+'in'+JSON.stringify(i))
            operationBox = document.getElementById("operationBox"+JSON.stringify(j)+'in'+JSON.stringify(i))
            selectBox = document.getElementById('inputBoxForAll'+JSON.stringify(j)+'in'+JSON.stringify(i))

            if(selectBox.checked == true){
                expandOpBut.setAttribute('class','expandOperationButtonGrey')
                WWselectionItem.setAttribute('class','WWselectionItemGrey')
                operationBox.setAttribute('class','operationBoxesGrey')
            }
            else if(selectBox.checked == false){
                expandOpBut.setAttribute('class','expandOperationButton')
                WWselectionItem.setAttribute('class','WWselectionItem')
                operationBox.setAttribute('class','operationBoxes')
            }
        }
        function buildMWO(data,sectionId){ //this builds the big MWO section at the start if the search is an MWO search
            mwoSection = document.getElementById(sectionId)
            mwoLabelDiv = document.createElement("div")
            mwoLabelDiv.setAttribute('class','greenMWOworkCenterLabelMain')
            mwoLabelDiv.appendChild(document.createTextNode("MWO "+data[0]["MWOnum"]))
            mwoSection.appendChild(mwoLabelDiv)


            mwoText = document.createElement("div")
            mwoText.setAttribute('class','MWOtext')
            breaking = document.createElement("br")
            mwoText.appendChild(document.createTextNode(data[0]["MWOconductor"]))
            mwoText.appendChild(breaking)
            mwoText.appendChild(document.createTextNode(data[0]["MWOcompound"]))
            mwoSection.appendChild(mwoText)


            mwoSelectDiv = document.createElement("div")
            mwoSelectDiv.setAttribute('class','mwoSelectDiv')
            mwoSelect = document.createElement("select")
            mwoSelect.setAttribute('id','mwoSelect1')
            machineOption = document.createElement("option")
            machineOption.value = "select"
            machineOption.appendChild(document.createTextNode("Select: "))
            mwoSelect.appendChild(machineOption)
            hasLine = false
            for(i=0; i<data[0]["MWOpossible_lines"].length;i++){
                machineOption = document.createElement("option")
                machineOption.setAttribute('class','machineOptionFew')
                machineOption.value = data[0]["MWOpossible_lines"][i]
                machineOption.appendChild(document.createTextNode(data[0]["MWOpossible_lines"][i]))
                mwoSelect.appendChild(machineOption)
                if( data[0]["MWOpossible_lines"][i] == data[0]["MWOselected_line"] ){
                    hasLine = true
                }
            }
            if(hasLine == true || data[0]["MWOselected_line"] == "select"){
                mwoSelect.value = data[0]["MWOselected_line"]
            }
            else{
                machineOption = document.createElement("option")
                machineOption.value = data[0]["MWOselected_line"]
                machineOption.appendChild(document.createTextNode(data[0]["MWOselected_line"]))
                mwoSelect.appendChild(machineOption)
                mwoSelect.value = data[0]["MWOselected_line"]
            }
            mwoSection.appendChild(mwoSelectDiv)
            breaking = document.createElement("br")
            mwoSelect.appendChild(breaking)
            mwoSelectDiv.appendChild(mwoSelect)
            mwoButtonSet = document.createElement("button")
            mwoButtonSet.setAttribute('class','MWObuttonSetAll')
            mwoButtonSet.setAttribute('id','MWObuttonSetAll1')
            mwoButtonSet.appendChild(document.createTextNode("Set For All OP in MWO "+data[0]["MWOnum"]))
            mwoButtonSet.setAttribute('onclick','setAllMWOandOpenPWO('+JSON.stringify(data.slice(1))+',"mainWWGrid1",'+JSON.stringify(data[0]["MWOnum"])+',1)')
            mwoSelectDiv.appendChild(mwoButtonSet)

            mwoSecondButton = document.createElement("button")
            mwoSecondButton.setAttribute('class','MWObuttonSkipSet')
            mwoSecondButton.setAttribute('id','MWObuttonSkipSet1')
            mwoSecondButton.appendChild(document.createTextNode("Show PWO"))
            mwoSecondButton.setAttribute('onclick','setAllMWOandOpenPWO('+JSON.stringify(data.slice(1))+',"mainWWGrid1",null,3)')
            mwoSelectDiv.appendChild(mwoSecondButton)
        }
        function setAllMWOandOpenPWO(slicedData,sectionName,MWOnum,phase){ //this function sets all mwo operations in the pwo to the same as the main mwo panel
            mwoSelect = document.getElementById("mwoSelect1")
            machine = mwoSelect.value
            options = mwoSelect.children
            setAll = false
            showButton = document.getElementById("showAllMachineButton")
            if(showButton.innerHTML == "Hide all Machines"){
                setAll = true
            }
            if (phase == 1){
                mwoSelect = document.getElementById("mwoSelect1")
                machine = mwoSelect.value
                
                buildSite(slicedData,sectionName,MWOnum,machine,setAll)
                mwoButton = document.getElementById("MWObuttonSetAll1")
                mwoButton.setAttribute('onclick','setAllMWOandOpenPWO('+JSON.stringify(slicedData)+',"mainWWGrid1",'+JSON.stringify(data[0]["MWOnum"])+',2)')
                mwoButton2 = document.getElementById("MWObuttonSkipSet1")
                mwoButton2.remove()


            }
            if(phase==2){
                items = document.getElementsByClassName('greenMWOworkCenterLabel')
                for(i=0;i<slicedData.length;i++){
                    parseAmount = parseInt(slicedData[i]["noOfOp"])
                    for(j = 1; j <= parseAmount; j++){
                        workCenterLabelId="workCenterLabel"+JSON.stringify(j)+'in'+JSON.stringify(i)
                        workCenterLabel = document.getElementById(workCenterLabelId)
                        if (workCenterLabel.innerHTML == ("MWO "+ data[0]["MWOnum"])){
                            selectItem= document.getElementById('select'+JSON.stringify(j)+'in'+JSON.stringify(i))
                            mwoSelect = document.getElementById("mwoSelect1")
                            machine = mwoSelect.value
                            selectItem.value = machine
                        }
                    }
                }
            }
            if(phase==3){
                mwoButton2 = document.getElementById("MWObuttonSkipSet1")
                mwoButton = document.getElementById("MWObuttonSetAll1")

                buildSite(slicedData,sectionName,JSON.stringify(data[0]["MWOnum"]),null,setAll)
                mwoButton2.setAttribute('onclick','')
                mwoButton.setAttribute('onclick','setAllMWOandOpenPWO('+JSON.stringify(slicedData)+',"mainWWGrid1",'+JSON.stringify(data[0]["MWOnum"])+',2)')
                mwoButton2.remove()
            }
        }
        
        function openMenu(WWselectionId, openOrClose, expandId, operationBoxId, workCenterLabelId, operationNumId,buttonId, id,arrowId, pwoNum, operationNumber,idNum,secondIdNum){
            //opens the side menu for the individual operations
            operationBox = document.getElementById(operationBoxId)
            operationNumE = document.getElementById(operationNumId)
            workCenterLabel = document.getElementById(workCenterLabelId)
            WWselection = document.getElementById(WWselectionId)
            button = document.getElementById(buttonId)
            arrow = document.getElementById(arrowId)
            if (openOrClose == "Open"){
                arrow.setAttribute('class','fa fa-angle-right')
                button.setAttribute('onclick', 'openMenu('+JSON.stringify(WWselectionId)+',"Close",'+JSON.stringify(expandId)+','+JSON.stringify(operationBoxId)+','+JSON.stringify(workCenterLabelId)+','+JSON.stringify(operationNumId)+','+JSON.stringify(buttonId)+','+JSON.stringify(id)+','+JSON.stringify(arrowId)+','+JSON.stringify(pwoNum)+','+JSON.stringify(operationNumber)+','+JSON.stringify(idNum)+','+JSON.stringify(secondIdNum)+')')
                operationBox = document.getElementById(operationBoxId)
                operationNumE = document.getElementById(operationNumId)
                workCenterLabel = document.getElementById(workCenterLabelId)
                WWselection = document.getElementById(WWselectionId)
                operationBox.style.gridColumnStart = "span 2"
                operationBox.style.gridTemplateColumns = ".5fr .5fr 1fr"
                WWselection.style.gridColumnStart = "3"
                workCenterLabel.style.gridColumnStart = "3"
                operationNumE.style.gridColumnStart = "3"
                
                doneDiv = document.createElement("div")
                onHoldDiv = document.createElement("div")
                doneCheckBox = document.createElement("div")
                onHoldCheckBox = document.createElement("div")
                writeNoteDiv = document.createElement("div")

                doneDiv.setAttribute('id', 'doneDiv'+id) //change this later to be dynamic
                onHoldDiv.setAttribute('id', 'onHoldDiv'+id)
                doneCheckBox.setAttribute('id', 'doneCheckBox'+id)
                onHoldCheckBox.setAttribute('id', 'onHoldCheckBox'+id)
                writeNoteDiv.setAttribute('id', 'writeNoteDiv'+id)
                doneDiv.setAttribute("class",'doneDiv')
                onHoldDiv.setAttribute("class",'onHoldDiv')
                doneCheckBox.setAttribute("class",'doneCheckBox')
                onHoldCheckBox.setAttribute("class",'onHoldCheckBox')
                writeNoteDiv.setAttribute("class",'writeNoteDiv')

                doneDivText = document.createTextNode("Done")
                onHoldDivText = document.createTextNode("OnHold")

                doneDiv.appendChild(doneDivText)
                onHoldDiv.appendChild(onHoldDivText)

                doneCheckBoxInput = document.createElement('input')
                doneCheckBoxInput.type = "checkbox"
                doneCheckBoxInput.setAttribute('onchange','updateAndCheckForMain(doneCheckBoxInput'+id+','+idNum+','+secondIdNum+',"done")')

                doneCheckBoxInput.setAttribute('class','doneCheckBoxInput')
                doneCheckBoxInput.setAttribute('id','doneCheckBoxInput'+id)

                if(slicedData[idNum]["done_"+secondIdNum+"0"] == "0"){
                    doneCheckBoxInput.checked = false
                }
                else if(slicedData[idNum]["done_"+secondIdNum+"0"] == "1"){
                    doneCheckBoxInput.checked = true
                }
                doneCheckBox.appendChild(doneCheckBoxInput)

                onHoldCheckBoxInput = document.createElement('input')
                onHoldCheckBoxInput.type = "checkbox"
                if(slicedData[idNum]["onHold_"+secondIdNum+"0"] == "0"){
                    onHoldCheckBoxInput.checked = false
                }
                else if(slicedData[idNum]["onHold_"+secondIdNum+"0"] == "1"){
                    onHoldCheckBoxInput.checked = true
                }
                onHoldCheckBoxInput.setAttribute('class','onHoldCheckBoxInput')
                onHoldCheckBoxInput.setAttribute('id','onHoldCheckBoxInput'+id)
                onHoldCheckBoxInput.setAttribute('onchange','updateAndCheckForMain(onHoldCheckBoxInput'+id+','+idNum+','+secondIdNum+',"onHold")')


                onHoldCheckBox.appendChild(onHoldCheckBoxInput)
                writeNoteDivButton = document.createElement("button")
                writeNoteDivText = document.createTextNode("Write Note")
                writeNoteDivButton.setAttribute('onclick', 'notesForScreen('+JSON.stringify(pwoNum)+','+JSON.stringify(operationNumber)+')')
                
                writeNoteDivButton.appendChild(writeNoteDivText)
                writeNoteDiv.appendChild(writeNoteDivButton)

                mainDoneCheckBox = document.getElementById('PWOclassificationInputD'+idNum)
                mainOnHoldCheckBox = document.getElementById('PWOclassificationInputOH'+idNum)

                operationBox.appendChild(doneDiv)
                operationBox.appendChild(onHoldDiv)
                operationBox.appendChild(doneCheckBox)
                operationBox.appendChild(onHoldCheckBox)
                operationBox.appendChild(writeNoteDiv)

                
            }
            
            if(openOrClose == "Close"){
                arrow.setAttribute('class','fa fa-angle-left')
                button.setAttribute('onclick', 'openMenu('+JSON.stringify(WWselectionId)+',"Open",'+JSON.stringify(expandId)+','+JSON.stringify(operationBoxId)+','+JSON.stringify(workCenterLabelId)+','+JSON.stringify(operationNumId)+','+JSON.stringify(buttonId)+','+JSON.stringify(id)+','+JSON.stringify(arrowId)+','+JSON.stringify(pwoNum)+','+JSON.stringify(operationNumber)+','+JSON.stringify(idNum)+','+JSON.stringify(secondIdNum)+')')
                let doneDiv = document.getElementById('doneDiv'+id)
                let onHoldDiv = document.getElementById('onHoldDiv'+id)
                let doneCheckBox = document.getElementById('doneCheckBox'+id)
                let onHoldCheckBox = document.getElementById('onHoldCheckBox'+id)
                let writeNoteDiv = document.getElementById('writeNoteDiv'+id)
                operationBox.removeChild(doneDiv)
                operationBox.removeChild(onHoldDiv)
                operationBox.removeChild(doneCheckBox)
                operationBox.removeChild(onHoldCheckBox)
                operationBox.removeChild(writeNoteDiv)

                operationBox.style.gridColumnStart = "span 1"
                operationBox.style.gridTemplateColumns = "1fr"
                WWselection.style.gridColumnStart = "1"
                workCenterLabel.style.gridColumnStart = "1"
                operationNumE.style.gridColumnStart = "1"
            }
        }
        function setAllSelects(selectId){
            //sets all selects as the select for the "set all selected icons" box
            selectAll = document.getElementById(selectId)
            for (i=0;i<idTable.length;i++){
                hasOption = false
                checkBoxForSet = document.getElementById('inputBoxForAll'+idTable[i])
                if(checkBoxForSet.checked == true){
                    selectItem = document.getElementById('select'+idTable[i])
                    selectItemChildren = selectItem.children
                    for(j=0;j<selectItemChildren.length;j++){
                        if (selectItemChildren[j].value==selectAll.value){
                            hasOption = true
                        }
                    }
                    if (hasOption == true){
                        selectItem.value = selectAll.value
                    }
                    if(hasOption == false){
                        machineOption = document.createElement("option")
                        machineOption.value = selectAll.value
                        machineOption.appendChild(document.createTextNode(selectAll.value))
                        selectItem.appendChild(machineOption)
                        selectItem.value = selectAll.value
                    }
                    checkBoxForSet.checked = false
                }
            }
            for(i=0; i<slicedData.length;i++){
                parseAmount = parseInt(slicedData[i]["noOfOp"])
                for(j = 1; j <= parseAmount; j++){
                    changeSelect(i,j)
                }
            }
            
        }
        
        function notesForScreen(pwoNum, operationNum){ //builds the notes for screen image that is seen when clicking write note
            newButton = document.createElement('button')
            newButton.setAttribute('id','newButton')
            newButton.setAttribute('class','notesButton')
            newButton.setAttribute('onclick','deleteButtonandNotes()')
            newButton.style.opacity = 0.5
            document.body.appendChild(newButton)
            notesTextDiv = document.createElement('div')
            notesTextDiv.setAttribute('id','notesTextDiv')
            notesTextDiv.appendChild(document.createTextNode("Notes For PWO: " + JSON.stringify(pwoNum) + " Operation #: "+ JSON.stringify(operationNum)))
            notesInput = document.getElementById('notesInput')
            
            notesInput = document.createElement('textarea')
            notesInput.setAttribute('class','notesInput')
            notesInput.setAttribute('id','notesInput')
            notesSaveButton = document.createElement('button')
            notesSaveButton.setAttribute('id','notesSaveButton')
            notesSaveButtonText = document.createTextNode("SAVE")
            notesSaveButton.setAttribute('onclick','saveButtonNotes('+JSON.stringify(pwoNum)+','+JSON.stringify(operationNum)+','+JSON.stringify("notesInput")+')')
            notesSaveButton.appendChild(notesSaveButtonText)
            notesGrid = document.createElement('div')
            notesGrid.setAttribute('class','notesGrid')
            notesGrid.setAttribute('id','notesGrid')
            notesGrid.appendChild(notesTextDiv)
            notesGrid.appendChild(notesInput)
            notesGrid.appendChild(notesSaveButton)
            document.body.appendChild(notesGrid)


        }
        function deleteButtonandNotes(){ //deletes the button and its notes when the grey outside border is clicked
            newButton = document.getElementById('newButton')
            notesTextDiv= document.getElementById("notesTextDiv")
            notesSaveButton = document.getElementById("notesSaveButton")
            notesInput = document.getElementById('notesInput')
            notesGrid = document.getElementById('notesGrid')
            document.body.removeChild(newButton)
            document.body.removeChild(notesGrid)
        }
        function saveButtonNotes(pwoN, operationN, notesI){
            //save functionality for notes (to be added)
            saveData = {"operationNum":"","PWOnum":"","notes":""} //["operationNum",'PWOnum',"notes"]
            saveData["PWOnum"] = pwoN 
            saveData["operationNum"] = operationN
            saveData["notes"] = document.getElementById(notesI).value
            if(saveData["notes"] != ""){
                console.log(saveData)
            }
            else{
                console.log(nothingToSave)
            }

        }
        function showAllMachines(phase,buttonId){ //show all machines button when clicked will run this function that goes through each select and sets them to show all the machines,
                                                  //when selected again it will hide all the extra machines
            button = document.getElementById(buttonId)
            if(phase == 1){
                mwoSelect = document.getElementById("mwoSelect1")
                if(mwoSelect != null){
                    oldMwoVal = mwoSelect.value
                    hasMwoVal = false
                    mwoSelect.innerHTML = ""
                    newMachineOption = document.createElement("option")
                    newMachineOption.value = "select"
                    newMachineOption.appendChild(document.createTextNode("Select:"))
                    mwoSelect.appendChild(newMachineOption)
                    for(h=0; h < allMachine.length; h++){
                        newMachineOption = document.createElement("option")
                        newMachineOption.value = allMachine[h]
                        newMachineOption.appendChild(document.createTextNode(allMachine[h]))
                        mwoSelect.appendChild(newMachineOption)
                        if (allMachine[h] == oldMwoVal){
                            hasMwoVal = true
                        }
                    }
                    if (hasMwoVal){
                        mwoSelect.value = oldMwoVal
                    }
                    else if(oldMwoVal == "select"){
                        mwoSelect.value = oldMwoVal
                    }
                    else{
                        newMachineOption = document.createElement("option")
                        newMachineOption.value = oldMwoVal
                        newMachineOption.appendChild(document.createTextNode(oldMwoVal))
                        mwoSelect.appendChild(newMachineOption)
                        mwoSelect.value = oldMwoVal
                    }
                }
                
                for(i=0;i<slicedData.length;i++){
                    parseAmount = parseInt(slicedData[i]["noOfOp"])
                    for(j = 1; j <= parseAmount; j++){
                        selection = document.getElementById('select'+JSON.stringify(j)+'in'+JSON.stringify(i))
                        if(selection == null){
                            break
                        }
                        oldSelectionVal = selection.value
                        hasSelectionVal = false
                        selection.innerHTML = ""
                        newMachineOption = document.createElement("option")
                        newMachineOption.value = "select"
                        newMachineOption.appendChild(document.createTextNode("Select:"))
                        selection.appendChild(newMachineOption)
                        for(h=0; h< allMachine.length; h++){
                            newMachineOption = document.createElement("option")
                            newMachineOption.value = allMachine[h]
                            newMachineOption.appendChild(document.createTextNode(allMachine[h]))
                            selection.appendChild(newMachineOption)
                            if (allMachine[h] == oldSelectionVal){
                                hasSelectionVal = true
                            }
                        }
                        if (hasSelectionVal){
                            selection.value = oldSelectionVal
                        }
                        else if(oldSelectionVal == "select"){
                            selection.value = oldSelectionVal
                        }
                        else{
                            newMachineOption = document.createElement("option")
                            newMachineOption.value = oldSelectionVal
                            newMachineOption.appendChild(document.createTextNode(oldSelectionVal))
                            selection.appendChild(newMachineOption)
                            selection.value = oldSelectionVal
                        }
                    }
                 }
                 button.setAttribute('onclick','showAllMachines(2,'+JSON.stringify(buttonId)+')')
                 button.innerHTML = ""
                button.appendChild(document.createTextNode("Hide all Machines"))
             }
            if(phase == 2){
                mwoSelect = document.getElementById("mwoSelect1")
                if(mwoSelect != null){
                    oldMwoVal = mwoSelect.value
                    hasMwoVal = false
                    mwoSelect.innerHTML = ""
                    
                    newMachineOption = document.createElement("option")
                    newMachineOption.value = "select"
                    newMachineOption.appendChild(document.createTextNode("Select:"))
                    mwoSelect.appendChild(newMachineOption)
                    for(i=0; i<data[0]["MWOpossible_lines"].length;i++){
                        machineOption = document.createElement("option")
                        machineOption.setAttribute('class','machineOptionFew')
                        machineOption.value = data[0]["MWOpossible_lines"][i]
                        machineOption.appendChild(document.createTextNode(data[0]["MWOpossible_lines"][i]))
                        mwoSelect.appendChild(machineOption)
                        if (data[0]["MWOpossible_lines"][i] == oldMwoVal){
                            hasMwoVal = true
                        }
                    }
                    
                    if (hasMwoVal){
                        mwoSelect.value = oldMwoVal
                    }
                    else if(oldMwoVal == "select"){
                            mwoSelect.value = oldMwoVal
                        }
                    else{
                        newMachineOption = document.createElement("option")
                        newMachineOption.value = oldMwoVal
                        newMachineOption.appendChild(document.createTextNode(oldMwoVal))
                        mwoSelect.appendChild(newMachineOption)
                        mwoSelect.value = oldMwoVal
                    }
                }
                for(i=0;i<slicedData.length;i++){
                    parseAmount = parseInt(slicedData[i]["noOfOp"])
                    for(j = 1; j <= parseAmount; j++){
                        selection = document.getElementById('select'+JSON.stringify(j)+'in'+JSON.stringify(i))
                        if(selection == null){
                            break
                        }
                        oldSelectionVal = selection.value
                        hasSelectionVal = false
                        selection.innerHTML = ""
                        newMachineOption = document.createElement("option")
                        newMachineOption.value = "select"
                        newMachineOption.appendChild(document.createTextNode("Select:"))
                        selection.appendChild(newMachineOption)
                        for (h=0; h<slicedData[i]["possible_lines"+j].length;h++){
                                newMachineOption = document.createElement("option")
                                newMachineOption.value = slicedData[i]["possible_lines"+j][h]
                                newMachineOption.appendChild(document.createTextNode(slicedData[i]["possible_lines"+j][h]))
                                selection.appendChild(newMachineOption)
                                if (slicedData[i]["possible_lines"+j][h] == oldSelectionVal){
                                    hasSelectionVal = true
                                }
                            }
                        if (hasSelectionVal){
                            selection.value = oldSelectionVal
                        }
                        else if(oldSelectionVal == "select"){
                            selection.value = oldSelectionVal
                        }
                        else{
                            newMachineOption = document.createElement("option")
                            newMachineOption.value = oldSelectionVal
                            newMachineOption.appendChild(document.createTextNode(oldSelectionVal))
                            selection.appendChild(newMachineOption)
                            selection.value = oldSelectionVal
                        }

                        }
                    }
            button.setAttribute('onclick','showAllMachines(1,'+JSON.stringify(buttonId)+')')
            button.innerHTML = ""
            button.appendChild(document.createTextNode("Show all Machines"))

        }
        }
        function fillSelectAll(){ //function that puts all the machines inside select all
            selectAll = document.getElementById('selectAll')
            for (i = 0; i < allMachine.length; i++){
                newMachineOption = document.createElement("option")
                newMachineOption.value = allMachine[i]
                newMachineOption.appendChild(document.createTextNode(allMachine[i]))
                selectAll.appendChild(newMachineOption)
            }
        }
        fillSelectAll()
    </script>
  </body>
</html>