<table>
    <thead>
        <tr>
            <th width="200">Roaster Name</th>
            <th width="200">Region</th>
            <th width="150">Founded in</th>
            <th width="150">Coffee Reviews</th>
            <th width="150">Roaster Awards</th>
            <th width="150">Fair Trade</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <?php
            foreach ($data['roasters'] as $roaster) {
                echo "<td>"
            }