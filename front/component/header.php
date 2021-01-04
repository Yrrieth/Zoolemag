<div id="header" class="d-flex container-fluid mb-0 p-0">
    <a href="index.php"><img src="../image/logo.png" alt="Logo du site" title="Logo du site Zoolemag"></a>
    <form class="form-inline ml-auto mr-2" action="../pages/rechercher.php" method="POST">
        <input class="form-control mx-1 py-0" type="search" placeholder="Rechercher" aria-label="Search" name="recherche" value="<?php if (isset($_POST['recherche'])) { echo $_POST['recherche']; }?>">
        <button id="button-search" class="btn mx-1 py-0" type="submit">Rechercher</button>
    </form>
</div>