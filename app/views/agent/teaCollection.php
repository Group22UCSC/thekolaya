<link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/teacollection.css">

<div class="page" id="teapopup">
    <div class="title">
        Update Tea Weight
    </div>

    <div class="form">
        <form method="POST" id="teaUpdateForm">
            <div class="inputfield">
                <label>Landowner ID</label>
                <input type="text" class="input" id="lid" name="lid" readonly>
            </div>
            <div class="inputfield">
                <label><span id="tea">Initial</span> Tea Weight</label>
                <input type="number" class="input" name="weight" id="weight">
            </div>
            <div class="inputfield" id="btnset">
                <button type="button" class="btn" id="myBtn"> Add<span id="weightbtn"> Weight</span> </button>
                <button type="button" class="back" onclick="closeteaform()">Back</button>
            </div>
        </form>


    </div>
</div>

<script></script>
<!-- onclick="openpopup()" -->