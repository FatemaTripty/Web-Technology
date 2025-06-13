
<?php
        $con = mysqli_connect("localhost", "root", "", "ajax");
        $data = mysqli_query($con, "SELECT name FROM user");

        foreach($data as $data): ?>

        <table>
                <tr><td><?php echo $data["name"]; ?></td></tr>
        </table>

        <?php endforeach; ?>