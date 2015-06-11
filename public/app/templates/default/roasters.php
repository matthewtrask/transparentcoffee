<div class="img-overlay">
    <img src="<?php echo helpers\url::template_path() . 'img/Baskets.jpg'?>">
    <div class="text-wrapper">
        <h1 class="scrpi-header image-text">Specialty Coffee Retail Price Index</h1>
    </div>
</div>
<div class="row">
    <div id='roasters-text' class="small-offset-1 small-10 columns text-left">
        <p>To create the Specialty Coffee Retail Price Index (SCRPI), we began following a roster of 60 “blue chip” coffee roasters; those that set standards in the North American specialty coffee market. We started by focusing on roasters whose coffees receive the lion’s share of attention from Coffee Review, and those who receive many of the Good Food Awards and Roast Magazine Awards. SCRPI roasters received about 60% of the more than 1,500 coffee reviews published up to early 2014, and more than 70% of the Good Food and Roast Magazine awards during the same period.</p>
    </div>
</div>
<div class="row">
    <div class="small-offset-1 small-10 columns text-left">
        <p>The list was then balanced in terms of geography, with 10% coming from Canada and 42% coming from the more coffee-obsessed western United States. We also ensured that Fair Trade roasters are appropriately represented. Twenty of the original 60 SCRPI roasters were listed on the Fair Trade USA or FairTrade Canada websites in early 2014.</p>
    </div>
</div>
<div class="row">
    <div class="small-offset-1 small-10 columns text-left">
        <p>The following is a list of the original 60 SCRPI roasters:</p>
    </div>
</div>
<div class="row">
    <div class="small-offset-1 small-10 columns">
        <br>
        <table id="roasters-table" role="grid">
            <thead>
                <tr>
                    <th width="350">Roaster Name</th>
                    <th width="125">Region</th>
                    <th width="125">Founded in</th>
                    <th width="125">Coffee Reviews</th>
                    <th width="125">Roaster Awards</th>
                    <th width="125">Fair Trade</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($data['roasters'] as $roaster) {
                        echo "<tr>";
                        echo "<td class='custom-table-cell'>" . $roaster->roaster_name . "</td>";
                        echo "<td class='custom-table-cell'>" . $roaster->region . "</td>";
                        echo "<td class='custom-table-cell'>" . $roaster->founded . "</td>";
                        echo "<td class='custom-table-cell'>" . $roaster->coffee_reviews . "</td>";
                        echo "<td class='custom-table-cell'>" . $roaster->roaster_awards . "</td>";
                        echo "<td class='custom-table-cell'>" . $roaster->fair_trade . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>