<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application lafleur
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 *
 * @package default
 * @author Patrice Grand
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoFFF
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=FFF';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoFFF = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
	{
    		PdoFFF::$monPdo = new PDO(PdoFFF::$serveur.';'.PdoFFF::$bdd, PdoFFF::$user, PdoFFF::$mdp);
			PdoFFF::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoFFF::$monPdo = null;
	}

    public  static function getPdoFFF()
    {
        if(PdoFFF::$monPdoFFF == null)
        {
            PdoFFF::$monPdoFFF= new PdoFFF();
        }
        return PdoFFF::$monPdoFFF;
    }

    //Tout ce qui touche aux clubs
    //Récupère toutes les infos de tous les clubs
    public function getLesClubs()
    {
        $req = "select * from club";
        //echo $req;
        $res = PdoFFF::$monPdo->query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;

    }

    //Récupère les infos du club selon l'id
    public function getLeClub($id){
        $req = "select * from club where NumClub='".$id."'";
        //echo $req;
        $res = PdoFFF::$monPdo->query($req);
        $lesLignes = $res->fetch();
        return $lesLignes;
    }

    //Récupère les informations du nouveau club créé selon son nom (que l'on suppose unique)
    public function getLeNouveauClub($nom){
        $req = "select * from club where NomClub='".$nom."'";
        //echo $req;
        $res = PdoFFF::$monPdo->query($req);
        $lesLignes = $res->fetch();
        return $lesLignes;
    }

    //Ajoute le club à la bdd
    public function ajouterClub($nom, $adresse, $cp, $ville, $tel, $mail){
        $req = "insert into `club`(`NomClub`, `AdresseClub`, `CPClub`, `VilleClub`, `TelClub`, `MailClub`, `imgClub`) values('".$nom."', '".$adresse."', ".$cp.", '".$ville."', ".$tel.", '".$mail."', 'images/ph.png')";
        //echo $req;
        $res = PdoFFF::$monPdo->query($req);
        $lesLignes = $res -> fetch();
        return $lesLignes;

    }

    //Supprime le club de la bdd
    public function deleteLeClub($id){
        $req = "delete from club where NumClub='".$id."'";
        //echo $req;
        $res = PdoFFF::$monPdo->exec($req);
    }

    //Modifie les infos du club
    public function modifClub($id, $nom, $adresse, $cp, $ville, $tel, $mail){
        $req = "update club set NomClub = '".$nom."', AdresseClub='".$adresse."', CPClub=".$cp.", VilleClub='".$ville."', TelClub=".$tel.", MailClub='".$mail."' where NumClub=".$id;
        $res = PdoFFF::$monPdo->query($req);
        //echo $req;
    }





    //Tout ce qui touche aux joueurs
    //Récupère toutes les infos de tous les joueurs
    public function getLesJoueurs()
    {
        $req = "select * from joueur";
        //echo $req;
        $res = PdoFFF::$monPdo->query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;

    }

    //Récupère les infos d'un joueur d'un club spécifique selon l'id du club, classé par n° de maillot
    public function getLesJoueursDuClub($id)
    {
        $req="select NumJou, NomJou, PrenomJou from joueur where NumClub=".$id." order by NumJou ASC";
        $res = PdoFFF::$monPdo->query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;

    }

    //Récupère les infos d'un joueur en particulier via son id
    public function getLeJoueur($id){
        $req = "select * from joueur where idJou='".$id."'";
        //echo $req;
        $res = PdoFFF::$monPdo->query($req);
        $lesLignes = $res->fetch();
        return $lesLignes;
    }

    //Ajoute un joueur à la BDD
    public function ajouterJoueur($num, $nom, $prenom, $adresse, $cp, $ville, $tel, $mail, $datenaiss, $numcat, $numclub){
        $req = "insert into `joueur`(`NumJou`, `NomJou`, `PrenomJou`, `AdresseJou`, `CPJou`, `VilleJou`, `TelJou`, `MailJou`, `Date_NaissJou`, `imgJou`, `NumCat`, `NumClub`) values(".$num.", '".$nom."', '".$prenom."', '".$adresse."', ".$cp.", '".$ville."', ".$tel.", '".$mail."', '".$datenaiss."', 'images/phJ.png', ".$numcat.", ".$numclub.")";
        $res = PdoFFF::$monPdo->query($req);
        $lesLignes = $res->fetch();
        return $lesLignes;
    }

    //Récupère les infos du joueur nouvellement créé
    public function getLeNouveauJoueur($nom, $prenom){
        $req = "select * from joueur where NomJou='".$nom."' and PrenomJou='".$prenom."'";
        //echo $req;
        $res = PdoFFF::$monPdo->query($req);
        $lesLignes = $res->fetch();
        return $lesLignes;
    }

    //Récupère le nom de la catégorie du joueur nouvellement créé
    public function getLeNomCatNvJou($nom,$prenom){
        $req= "select NomCat from categorie where Numcat=(select NumCat from joueur where NomJou='".$nom."' and PrenomJou='".$prenom."')";
        $res = PdoFFF::$monPdo->query($req);
        $lesLignes = $res->fetch();
        return $lesLignes;
    }

    //Récupère le nom du club du joueur nouvellement créé
    public function getLeNomClubNvJou($nom,$prenom){
        $req= "select NomClub from club where NumClub=(select NumClub from joueur where NomJou='".$nom."' and PrenomJou='".$prenom."')";
        $res = PdoFFF::$monPdo->query($req);
        $lesLignes = $res->fetch();
        return $lesLignes;
    }

    //Récupère toutes les infos sur les catégories
    public function getLesCateg(){
        $req = "select * from categorie";
        $res = PdoFFF::$monPdo->query($req);
        $lesLignes = $res->fetchall();
        return $lesLignes;
    }

    //Supprime le joueur de la bdd
    public function deleteLeJoueur($id){
        $req = "delete from joueur where idJou='".$id."'";
        //echo $req;
        $res = PdoFFF::$monPdo->exec($req);
    }

    //Modifie les informations du joueur
    public function modifJoueur($id, $nom, $prenom, $datenaiss, $adresse, $cp, $ville, $tel, $mail, $numclub, $numjou, $numcat){
        $req = "update joueur set NumJou=".$numjou.", NomJou='".$nom."', PrenomJou='".$prenom."', AdresseJou='".$adresse."', CPJou=".$cp.", VilleJou='".$ville."', TelJou=".$tel.", MailJou='".$mail."', Date_NaissJou='".$datenaiss."', NumCat=".$numcat.", NumClub=".$numclub." where idJou=".$id;
        $res = PdoFFF::$monPdo->query($req);
        //echo $req;
    }

    //Récupère l'historique des inscriptions du joueur en fonction de son id
    public function getHistoriqueJoueur($id){
        $req= "select NomJou, PrenomJou, NomClub, DateDebutIns, DateFinIns from joueur, club, inscription where club.NumClub=inscription.NumClub and inscription.idJou=Joueur.idJou and joueur.idJou=".$id;
        $res = PdoFFF::$monPdo->query($req);
        $lesLignes = $res->fetchall();
        return $lesLignes;
    }






    //Relatif aux admins
    //Trouve les infos sur l'admin qui s'est connecté
    public function findById($id){
        $req = "select *
                from admin
                where idAdmin='".$id."'";
        if($rs = pdoFFF::$monPdo->query($req)){
            $ligne = $rs->fetch();
            return $ligne;
        }else{
            return false;
        }

    }

    //Fonction pour s'authentifier
    public function testLogAdmin($l, $p)
    {
        $req="select count(*) from admin where loginAdmin= '".$l."' and mdpAdmin = '".$p."'";
        //echo var_dump($req);
        $res = PdoFFF::$monPdo->query($req);
        $leResu = $res->fetch();
        //echo var_dump($leResu);
        return $leResu;
    }

    //Récupère le nom de l'administrateur qui s'est connecté (parce que c'est joli)
    public function getNomAdmin($l){
        $req="select * from admin where loginAdmin='".$l."'";
        $res = PdoFFF::$monPdo->query($req);
        $leResu = $res->fetch();
        return $leResu;
    }
}
?>