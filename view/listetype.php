<?php
include "../controller/typeC.php";
$c = new typeC();
$tab = $c->listetype();
/*if(isset($_GET['searchh']) && empty($_GET['searchh']) ){
    $tab = $c->listetype();

}*/
if (isset($_GET['searchh'])/* && !empty($_GET['searchh'])*/) {
    $searchTerm = $_GET['searchh'];
    $tab = $c->searchtype($searchTerm);
}
if (isset($_GET['sort'])) {
    $tab = $c->trierParnom();

}

?>
<head> 
<link rel="stylesheet" type="text/css" href="listetypes.css">

</head>

<center>
    <h1>List of Type produits</h1>
    <form method="GET">
        <input type="text" id="searchh" name="searchh" placeholder="search" value="<?php echo isset($_GET['searchh']) ? $_GET['searchh'] : ''; ?>">
        <button type="submit" name="sort">Trier</button>
        <input type="submit" value="Search">
    </form>
    <h2>
        <a href="addtype.php">Add type</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id type</th>
        <th>Nom_type</th>
        <th>Desciption_type</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $type) {
    ?>




        <tr>
            <td><?= $type['idtype']; ?></td>
            <td><?= $type['nomtype']; ?></td>
            <td><?= $type['descriptiontype']; ?></td>
            
            <td align="center">
                <form method="POST" action="updatetype.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $type['idtype']; ?> name="idtype">
                </form>
            </td>
            <td>
                <a href="deletetype.php?id=<?php echo $type['idtype']; ?>" >Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>