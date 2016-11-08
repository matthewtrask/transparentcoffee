<div class="row">
    <div class="small-12 medium-12 large-12 columns">
        <br>
        <h2>Excel Files</h2>

        <p>Select what data you want to generate the CSV</p>
        
    </div>
</div>
<div class="row panel">
    <p>* These reports will return <em>all</em> of the respective coffees, roasters, or growers.</p>
    <div class="small-4 medium-4 large-4 columns">
       <p class="panel">All Coffees   <a href="/admin/csv/coffees" target="_blank"><button id="coffees" onClick="coffeeClick()">Coffees</button></a></p>
<!--        <p>Downloads: <span id="coffeeDownloads">0</span></p>-->
    </div>
    <div class="small-4 medium-4 large-4 columns">
        <p class="panel">All Roaster  <a href="/admin/csv/roasters" target="_blank"><button id="roasters" onClick="roasterClick()">Roasters</button></a></p>
<!--        <p>Downloads: <span id="roasterDownloads">0</span></p>-->

    </div>
    <div class="small-4 medium-4 large-4 columns">
        <p class="panel">All Growers  <a href="/admin/csv/growers" target="_blank"><button id="growers" onClick="growerClick()">Growers</button></a></p>
<!--        <p>Downloads: <span id="growerDownloads">0</span></p>-->

    </div>
</div>


<script>

var coffeeClick = 0;
var roasterClick = 0;
var growerClick = 0;

function coffeeClick() {
    coffeeClick += 1;
    document.getElementById("coffeeDownloads").innerHTML = clicks;
}
function roasterClick() {
    roasterClick += 1;
    document.getElementById("roasterDownloads").innerHTML = clicks;
}
function growerClick() {
    growerClick += 1;
    document.getElementById("growerDownloads").innerHTML = clicks;
}

</script>