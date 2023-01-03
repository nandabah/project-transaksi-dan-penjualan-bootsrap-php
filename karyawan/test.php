<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<?php
require'../koneksi/conn.php';

$result = mysqli_query($koneksi,"SELECT * FROM menu");

?>
<body>
    <h1 class="text-center">Table</h1>
    <!-- Table Data -->
    <div class="container">
        <hr>
        <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="Name">

        <table class="table" id="myTable" data-filter-control="true" data-show-search-clear-button="true">
            <tr>
                <th>Company</th>
                <th>Contact</th>
                <th>Country</th>
            </tr>
            <?php while( $row = mysqli_fetch_array($result)){ ?>
            <tr>
            <td><?= $row['nama_menu'] ?></td>
            
            
            
                <td>Maria Anders</td>
            

            </tr>
            <?php }?>
        </table>
    </div>

    <script type="application/javascript">
        function tableSearch() {
            let input, filter, table, tr, td, txtValue;

            //Intialising Variables
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for (let i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }

        }
    </script>
</body>

<footer></footer>

</html>