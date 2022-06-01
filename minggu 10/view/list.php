<html>

<head></head>

<body>
    <table>
        <tbody>
            <tr>
                <td>Title</td>
                <td>Author</td>
                <td>Description</td>
            </tr>
        </tbody>
        <?php
        foreach ($jurnals as $jurnal) {
            echo '<tr><td><a href="index.php?jurnal=' . $jurnal->title .
                '">' . $jurnal->title .
                '</a></td><td>' . $jurnal->author . '</td><td>' . $jurnal->description . '</td></tr>';
        }
        ?>
    </table>
</body>

</html>