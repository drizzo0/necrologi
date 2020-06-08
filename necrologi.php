<?php
    include 'dbconnect.php';
    if (!isset($_GET['idNecrologio'])){
        $necrologi = $sql->query("SELECT * FROM necrologi");
        while ($necrologio = $necrologi->fetch_assoc()){
            $data .= "
                <tr>
                    <td>".$necrologio['idNecrologio']."</td>
                    <td><img width='100' height='100' src='data: ".$necrologio['tipoMimeFoto'].";base64,".$necrologio['foto']."'/></td>
                    <td>".$necrologio['nome']."</td>
                    <td>".$necrologio['cognome']."</td>
                    <td>".$necrologio['eta']."</td>
                    <td>".$necrologio['luogoResidenza']."</td>
                    <td>".$necrologio['cittaCelebrazione']."</td>
                    <td>".$necrologio['luogoCelebrazione']."</td>
                    <td>".$necrologio['dataCelebrazione']."</td>
                    <td>".$necrologio['luogoRiposo']."</td>
                    <td>".$necrologio['necrologio']."</td>
                </tr>
            ";
        }
        ?>
        <table>
            <tr>
                <td>ID</td>
                <td>Foto</td>
                <td>Nome</td>
                <td>Cognome</td>
                <td>Et&agrave</td>
                <td>Citt&agrave di residenza</td>
                <td>Citt&agrave celebrazione</td>
                <td>Chiesa celebrazione</td>
                <td>Data celebrazione</td>
                <td>Luogo di riposo</td>
                <td>Necrologio</td>
            </tr>
            <?php echo $data; ?>
        </table>
        <?php
    }else{
        $idNecrologio = $_GET['idNecrologio'];
        $necrologio = $sql->query("SELECT * FROM necrologi WHERE idNecrologio = $idNecrologio")->fetch_array();
        $datiNecrologio = "Nome: ".$necrologio['nome']."<br>";
        $datiNecrologio .= "Cognome: ".$necrologio['cognome']."<br>";
        $datiNecrologio .= "Foto:<br><img width='100' height='100' src='data: ".$necrologio['tipoMimeFoto'].";base64,".$necrologio['foto']."'/>";
        $pensieriSql = $sql->query("SELECT * FROM pensieriNecrologi WHERE idNecrologio = $idNecrologio");
        if($pensieriSql->num_rows == 0){
            $pensieri = "Non è stato ancora inserito nessun pensiero.";
        }else{
            while ($pensieriArray = $pensieriSql->fetch_assoc()){
                $pensieri .= "Nome: ".$pensieriArray['nome']." ".$pensieriArray['cognome']." - Inserito il ".$pensieriArray['dataInserimento']."<br>";
                $pensieri .= $pensieriArray['pensiero']."<br>";
            }
        }
        ?>
        <div style="width: 70%; float:left; height:100%; text-align: center; align-content: center">
            <h1>Necrologio</h1>
            <?php echo $datiNecrologio; ?>
        </div>
        <div style="width: 30%; float:left; height:100%; text-align: center; align-content: center">
            <h1>Pensieri</h1>
            <?php echo $pensieri; ?>
        </div>
        <?php
    }