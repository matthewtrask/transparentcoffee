<div class="row">
    <div class="small-offset-1 small-10 columns">
        <br>
        <table id="roasters-table">
            <thead>
                <tr>
                    <th width="250">Roaster Name</th>
                    <th width="150">Region</th>
                    <th width="150">Founded in</th>
                    <th width="160">Coffee Reviews</th>
                    <th width="170">Roaster Awards</th>
                    <th width="140">Fair Trade</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($data['roasters'] as $roaster) {
                        echo "<tr>";
                        echo "<td>" . $roaster->roaster_name . "</td>";
                        echo "<td>" . $roaster->region . "</td>";
                        echo "<td>" . $roaster->founded . "</td>";
                        echo "<td>" . $roaster->coffee_reviews . "</td>";
                        echo "<td>" . $roaster->roaster_awards . "</td>";
                        echo "<td>" . $roaster->fair_trade . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>